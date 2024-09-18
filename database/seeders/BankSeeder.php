<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banks')->insert([
            [
                "name" => "Ngân hàng NN&PT Nông thôn Việt Nam",
                "def_name" => "AGRIBANK",
            ],
            [
                "name" => "Ngân hàng Ngoại Thương Việt Nam",
                "def_name" => "VIETCOMBANK",
            ],
            [
                "name" => "Ngân hàng Kỹ Thương",
                "def_name" => "TECHCOMBANK",
            ],
            [
                "name" => "Ngân hàng Công Thương Việt Nam",
                "def_name" => "VIETINBANK",
            ],
            [
                "name" => "Ngân hàng Đầu tư và Phát triển",
                "def_name" => "BIDV",
            ],
            [
                "name" => "Ngân hàng Sài Gòn Thường Tín",
                "def_name" => "SACOMBANK",
            ],
            [
                "name" => "	Ngân hàng Á Châu",
                "def_name" => "ACB",
            ],
            [
                "name" => "Ngân hàng Tiên Phong",
                "def_name" => "TPBANK",
            ],
            [
                "name" => "Ngân hàng Hàng Hải Việt Nam",
                "def_name" => "MSB",
            ],
            [
                "name" => "Ngân hàng Việt Nam Thịnh Vượng",
                "def_name" => "VPBANK",
            ],
            [
                "name" => "Ngân hàng Quốc dân",
                "def_name" => "NCB",
            ],
            [
                "name" => "Phát triển nhà Thành phố Hồ Chí Minh",
                "def_name" => "HDBANK",
            ],
            [
                "name" => "Ngân hàng Quân đội",
                "def_name" => "MBBANK",
            ],
            [
                "name" => "Ngân hàng Phương Đông",
                "def_name" => "OCB",
            ],
            [
                "name" => "Ngân hàng Quốc tế Việt Nam",
                "def_name" => "VIB",
            ],
            [
                "name" => "Ngân hàng Đại chúng Việt Nam",
                "def_name" => "PVCOMBANK",
            ],
        ]);
    }
}
