<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
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
                'name' => $faker->name(),
                'email' => $faker->freeEmail() . rand(1111111,9999999999),
                'phone' => $faker->e164PhoneNumber(),
                'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'address' => $faker->address(),
                'gender' => rand(1,2),
                'password' => bcrypt('Admin123@'),
                'avatar' => User::IMAGES[array_rand(User::IMAGES)]
            ];
            array_push($data, $item);
        }
        DB::table('users')->insert($data);
    }
}
