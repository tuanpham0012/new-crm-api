<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(
            [
                'uuid' => Str::uuid(),
                'code' => 'ROOT',
                'name' => 'Root'
            ]
        );
    }
}
