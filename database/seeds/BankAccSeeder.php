<?php

use App\CsvSeeder;
use Illuminate\Database\Seeder;

class BankAccSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path   = database_path('bank.csv');
        $seeder = new CsvSeeder($path, 'bank_accounts');

        $seeder
            ->noHeader()
            ->setColumns(['id', 'account', 'name', 'dob', 'destination_acc', 'crime_indication'])
            // ->setBatch(200)
            ->setProgressOutput($this->command->getOutput(), 25)
            ->beforeEach(function ($data) {
                $data['dob'] = empty($data['dob']) ? null : $data['dob'];

                unset($data['destination_acc'], $data['crime_indication']);

                return $data;
            })
            ->seed();
    }
}
