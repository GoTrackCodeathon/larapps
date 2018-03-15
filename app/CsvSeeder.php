<?php

namespace App;

use Closure;
use Exception;
use SplFileInfo;
use Carbon\Carbon;
use SplFileObject;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\OutputInterface;

/**
* CSV Seeder
*/
class CsvSeeder
{
    protected $filepath;
    protected $table;
    protected $batch = 1;
    protected $chunk = [];
    protected $skip  = [];
    protected $delimiter = ',';
    protected $columns;
    protected $header     = true;
    protected $timestamps = true;
    protected $softDelete = false;
    protected $beforeEach;
    protected $cmdOutput;
    protected $progressBar;
    protected $line;

    public function __construct($filepath, $table)
    {
        $this->filepath = $filepath;
        $this->table    = $table;
        $this->file     = $this->file($filepath);

        $this->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
    }

    protected function file($name)
    {
        $file = new SplFileInfo($name);

        if ($file->getExtension() != 'csv') {
            throw new Exception('File not a csv file');
        }

        if (!$file->isReadable()) {
            throw new Exception('File not readable');
        }

        return $file->openFile('r');
    }

    public function seed()
    {
        DB::disableQueryLog();

        if ($this->header) {
            $this->setColumns($this->file->fgetcsv($this->delimiter));
        }

        while (!$this->file->eof()) {
            $data = $this->file->fgetcsv($this->delimiter);

            if (empty($data)) {
                continue;
            }

            array_push($this->chunk, $this->prepare($data));

            if ($this->progressBar) {
                $this->progressAdvance();
            }

            if (sizeof($this->chunk) == $this->batch) {
                $this->insert($this->chunk);
                $this->chunk = [];
            }
        }

        if (!empty($this->chunk)) {
            $this->insert($this->chunk);
        }

        if ($this->progressBar) {
            $this->progressFinish();
        }
    }

    public function startProgressBar()
    {
        $this->progressBar = $this->cmdOutput->createProgressBar($this->line);

        $this->progressBar->start();
    }

    public function progressAdvance($step = 1)
    {
        $this->getProgressBar()->advance($step);
    }

    public function progressFinish()
    {
        $this->getProgressBar()->finish();
        $this->cmdOutput->newLine(2);
        $this->progressBar = null;
    }

    public function getProgressBar()
    {
        return $this->progressBar;
    }

    protected function prepare($data)
    {
        $prepared_data = array_combine($this->columns, $data);

        if ($this->timestamps) {
            $prepared_data['created_at'] = Carbon::now();
            $prepared_data['updated_at'] = Carbon::now();
        }

        if ($this->softDelete) {
            $prepared_data['deleted_at'] = null;
        }

        if ($this->beforeEach instanceof Closure) {
            $prepared_data = call_user_func($this->beforeEach, $prepared_data);
        }

        return $prepared_data;
    }

    protected function insert($data)
    {
        try {
            DB::table($this->table)->insert($data);
        } catch (Exception $e) {
            dump($data);

            throw $e;
        }
    }

    public function setDelimiter($value)
    {
        $this->delimiter = $value;

        return $this;
    }

    public function setBatch($value)
    {
        $this->batch = $value;

        return $this;
    }

    public function skip($value)
    {
        $this->skip = $value;

        return $this;
    }

    public function setFlags($value)
    {
        $this->file->setFlags($value);

        return $this;
    }

    public function setColumns($value)
    {
        $this->columns = $value;

        return $this;
    }

    public function noHeader($value = true)
    {
        return $this->setheader(!$value);
    }

    public function setheader($value)
    {
        $this->header = $value;

        return $this;
    }

    public function noTimestamps($value = true)
    {
        return $this->setTimestamps(!$value);
    }

    public function setTimestamps($value)
    {
        $this->timestamps = !!$value;

        return $this;
    }

    public function useSoftDelete($value = true)
    {
        return $this->setSoftDelete($value);
    }

    public function setSoftDelete($value)
    {
        $this->softDelete = $value;

        return $this;
    }

    public function beforeEach(Closure $function)
    {
        $this->beforeEach = $function;

        return $this;
    }

    public function setProgressOutput(OutputInterface $value, $maxLine)
    {
        $this->cmdOutput = $value;
        $this->line      = $maxLine;

        $this->startProgressBar();

        return $this;
    }
}
