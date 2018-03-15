<?php

use App\CsvSeeder;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path   = database_path('newsscraping.csv');
        $seeder = new CsvSeeder($path, 'news');

        $seeder
            ->noHeader()
            ->setColumns(['id', 'keyword', 'text'])
            // ->setBatch(200)
            // ->setProgressOutput($this->command->getOutput(), 25)
            ->beforeEach(function ($data) {
                return $data;
            })
            ->seed();
    }
}
