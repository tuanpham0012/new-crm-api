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
        $data = [
            [
                'uuid' => Str::uuid(),
                'code' => 'ROOT',
                'name' => 'Root'
            ],
            [
                'uuid' => Str::uuid(),
                'code' => 'HANHCHINH',
                'name' => 'Hành chính',
                'parent_id' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'code' => 'KETOAN',
                'name' => 'Kế toán',
                'parent_id' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'code' => 'KINHDOANH',
                'name' => 'Kinh doanh',
                'parent_id' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'code' => 'PHATTRIEN',
                'name' => 'Phát triển',
                'parent_id' => 1
            ],
            [
                'uuid' => Str::uuid(),
                'code' => 'NHANSU',
                'name' => 'Nhân sự',
                'parent_id' => 1
            ],
        ];
        foreach($data as $item){
            Department::create($item);
        }

    }
}
