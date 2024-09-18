<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            BankSeeder::class,
            WardSeeder::class,
            CustomerSourceSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
