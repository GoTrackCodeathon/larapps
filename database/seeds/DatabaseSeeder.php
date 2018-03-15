<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BankAccSeeder::class);
        $this->call(CrimeSeeder::class);
        $this->call(FiuSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
