<?php

use App\CsvSeeder;
use Illuminate\Database\Seeder;

class FiuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path   = database_path('fiureport.csv');
        $seeder = new CsvSeeder($path, 'fiu_reports');

        $seeder
            ->noHeader()
            ->setColumns(['id', 'acc_number', 'name', 'dob', 'destination_acc', 'crime_indication'])
            // ->setBatch(200)
            ->setProgressOutput($this->command->getOutput(), 25)
            ->beforeEach(function ($data) {
                unset($data['name'], $data['dob']);

                return $data;
            })
            ->seed();
    }
}
