<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('customer_sources')->insert(
            [
                [
                    'name' => 'Khách hàng Hiện có',
                ],
                [
                    'name' => 'Cuộc gọi',
                ],
                [
                    'name' => 'E-mail',
                ],
                [
                    'name' => 'Website',
                ],
                [
                    'name' => 'Quảng cáo',
                ],
                [
                    'name' => 'Theo Khuyến nghị',
                ],
                [
                    'name' => 'Hiển thị/Trưng bày',
                ],
                [
                    'name' => 'Gọi lại',
                ],
                [
                    'name' => 'Cửa hàng Trực tuyến',
                ],
                [
                    'name' => 'Khác',
                ]
            ]
        );
    }
}
