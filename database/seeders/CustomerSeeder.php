<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        for ($i=0; $i < 200; $i++) {
            $item = [
                'uuid' => Str::uuid(),
                'code' => $faker->isbn10(),
                'first_name' => $faker->firstNameMale(),
                'last_name' => $faker->lastName(),
                'address' => $faker->address(),
                'gender' => rand(1,2),
                'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'type' => rand(1,2),
                'tax_code' => $faker->isbn10(),
                'customer_source_id' => rand(1,9)

            ];
            array_push($data, $item);
        }
        DB::table('customers')->insert($data);
    }
}
