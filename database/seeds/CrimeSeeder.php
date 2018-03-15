<?php
use App\CsvSeeder;
use Illuminate\Database\Seeder;

class CrimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path   = database_path('crime.csv');
        $seeder = new CsvSeeder($path, 'crimes');

        $seeder
            ->noHeader()
            ->setColumns(['id', 'nationality', 'link', 'name', 'dob', 'crime_indication', 'source'])
            // ->setBatch(200)
            ->setProgressOutput($this->command->getOutput(), 25)
            ->beforeEach(function ($data) {
                if (empty($data['dob'])) {
                    $data['dob'] = null;
                }
                return $data;
            })
            ->seed();
    }
}
