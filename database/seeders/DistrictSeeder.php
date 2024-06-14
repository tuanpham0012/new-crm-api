<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('districts')->insert([
             [
              "name" => "Ba Đình",
              "city_id" => 1
            ],
             [
              "name" => "Ba Vì",
              "city_id" => 1
            ],
             [
              "name" => "Bắc Từ Liêm",
              "city_id" => 1
            ],
             [
              "name" => "Cầu Giấy",
              "city_id" => 1
            ],
             [
              "name" => "Chương Mỹ",
              "city_id" => 1
            ],
             [
              "name" => "Đan Phượng",
              "city_id" => 1
            ],
             [
              "name" => "Đông Anh",
              "city_id" => 1
            ],
             [
              "name" => "Đống Đa",
              "city_id" => 1
            ],
             [
              "name" => "Gia Lâm",
              "city_id" => 1
            ],
             [
              "name" => "Hà Đông",
              "city_id" => 1
            ],
             [
              "name" => "Hai Bà Trưng",
              "city_id" => 1
            ],
             [
              "name" => "Hoài Đức",
              "city_id" => 1
            ],
             [
              "name" => "Hoàn Kiếm",
              "city_id" => 1
            ],
             [
              "name" => "Hoàng Mai",
              "city_id" => 1
            ],
             [
              "name" => "Long Biên",
              "city_id" => 1
            ],
             [
              "name" => "Mê Linh",
              "city_id" => 1
            ],
             [
              "name" => "Mỹ Đức",
              "city_id" => 1
            ],
             [
              "name" => "Nam Từ Liêm",
              "city_id" => 1
            ],
             [
              "name" => "Phú Xuyên",
              "city_id" => 1
            ],
             [
              "name" => "Phúc Thọ",
              "city_id" => 1
            ],
             [
              "name" => "Quốc Oai",
              "city_id" => 1
            ],
             [
              "name" => "Sóc Sơn",
              "city_id" => 1
            ],
             [
              "name" => "Sơn Tây",
              "city_id" => 1
            ],
             [
              "name" => "Tây Hồ",
              "city_id" => 1
            ],
             [
              "name" => "Thạch Thất",
              "city_id" => 1
            ],
             [
              "name" => "Thanh Oai",
              "city_id" => 1
            ],
             [
              "name" => "Thanh Trì",
              "city_id" => 1
            ],
             [
              "name" => "Thanh Xuân",
              "city_id" => 1
            ],
             [
              "name" => "Thường Tín",
              "city_id" => 1
            ],
             [
              "name" => "Ứng Hòa",
              "city_id" => 1
            ],
             [
              "name" => "Bình Chánh",
              "city_id" => 2
            ],
             [
              "name" => "Bình Tân",
              "city_id" => 2
            ],
             [
              "name" => "Bình Thạnh",
              "city_id" => 2
            ],
             [
              "name" => "Cần Giờ",
              "city_id" => 2
            ],
             [
              "name" => "Củ Chi",
              "city_id" => 2
            ],
             [
              "name" => "Gò Vấp",
              "city_id" => 2
            ],
             [
              "name" => "Hóc Môn",
              "city_id" => 2
            ],
             [
              "name" => "Nhà Bè",
              "city_id" => 2
            ],
             [
              "name" => "Phú Nhuận",
              "city_id" => 2
            ],
             [
              "name" => "Quận 1",
              "city_id" => 2
            ],
             [
              "name" => "Quận 10",
              "city_id" => 2
            ],
             [
              "name" => "Quận 11",
              "city_id" => 2
            ],
             [
              "name" => "Quận 12",
              "city_id" => 2
            ],
             [
              "name" => "Quận 2",
              "city_id" => 2
            ],
             [
              "name" => "Quận 3",
              "city_id" => 2
            ],
             [
              "name" => "Quận 4",
              "city_id" => 2
            ],
             [
              "name" => "Quận 5",
              "city_id" => 2
            ],
             [
              "name" => "Quận 6",
              "city_id" => 2
            ],
             [
              "name" => "Quận 7",
              "city_id" => 2
            ],
             [
              "name" => "Quận 8",
              "city_id" => 2
            ],
             [
              "name" => "Quận 9",
              "city_id" => 2
            ],
             [
              "name" => "Tân Bình",
              "city_id" => 2
            ],
             [
              "name" => "Tân Phú",
              "city_id" => 2
            ],
             [
              "name" => "Thủ Đức",
              "city_id" => 2
            ],
             [
              "name" => "Ba Đồn",
              "city_id" => 3
            ],
             [
              "name" => "Bố Trạch",
              "city_id" => 3
            ],
             [
              "name" => "Đồng Hới",
              "city_id" => 3
            ],
             [
              "name" => "Lệ Thủy",
              "city_id" => 3
            ],
             [
              "name" => "Minh Hóa",
              "city_id" => 3
            ],
             [
              "name" => "Quảng Ninh",
              "city_id" => 3
            ],
             [
              "name" => "Quảng Trạch",
              "city_id" => 3
            ],
             [
              "name" => "Tuyên Hóa",
              "city_id" => 3
            ],
             [
              "name" => "Bắc Trà My",
              "city_id" => 4
            ],
             [
              "name" => "Duy Xuyên",
              "city_id" => 4
            ],
             [
              "name" => "Đại Lộc",
              "city_id" => 4
            ],
             [
              "name" => "Điện Bàn",
              "city_id" => 4
            ],
             [
              "name" => "Đông Giang",
              "city_id" => 4
            ],
             [
              "name" => "Hiệp Đức",
              "city_id" => 4
            ],
             [
              "name" => "Hội An",
              "city_id" => 4
            ],
             [
              "name" => "Nam Giang",
              "city_id" => 4
            ],
             [
              "name" => "Nam Trà My",
              "city_id" => 4
            ],
             [
              "name" => "Nông Sơn",
              "city_id" => 4
            ],
             [
              "name" => "Núi Thành",
              "city_id" => 4
            ],
             [
              "name" => "Phú Ninh",
              "city_id" => 4
            ],
             [
              "name" => "Phước Sơn",
              "city_id" => 4
            ],
             [
              "name" => "Quế Sơn",
              "city_id" => 4
            ],
             [
              "name" => "Tam Kỳ",
              "city_id" => 4
            ],
             [
              "name" => "Tây Giang",
              "city_id" => 4
            ],
             [
              "name" => "Thăng Bình",
              "city_id" => 4
            ],
             [
              "name" => "Tiên Phước",
              "city_id" => 4
            ],
             [
              "name" => "Ba Chẽ",
              "city_id" => 5
            ],
             [
              "name" => "Bình Liêu",
              "city_id" => 5
            ],
             [
              "name" => "Cẩm Phả",
              "city_id" => 5
            ],
             [
              "name" => "Cô Tô",
              "city_id" => 5
            ],
             [
              "name" => "Đầm Hà",
              "city_id" => 5
            ],
             [
              "name" => "Đông Triều",
              "city_id" => 5
            ],
             [
              "name" => "Hạ Long",
              "city_id" => 5
            ],
             [
              "name" => "Hải Hà",
              "city_id" => 5
            ],
             [
              "name" => "Hoành Bồ",
              "city_id" => 5
            ],
             [
              "name" => "Móng Cái",
              "city_id" => 5
            ],
             [
              "name" => "Quảng Yên",
              "city_id" => 5
            ],
             [
              "name" => "Tiên Yên",
              "city_id" => 5
            ],
             [
              "name" => "Uông Bí",
              "city_id" => 5
            ],
             [
              "name" => "Vân Đồn",
              "city_id" => 5
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 6
            ],
             [
              "name" => "Cù Lao Dung",
              "city_id" => 6
            ],
             [
              "name" => "Kế Sách",
              "city_id" => 6
            ],
             [
              "name" => "Long Phú",
              "city_id" => 6
            ],
             [
              "name" => "Mỹ Tú",
              "city_id" => 6
            ],
             [
              "name" => "Mỹ Xuyên",
              "city_id" => 6
            ],
             [
              "name" => "Ngã Năm",
              "city_id" => 6
            ],
             [
              "name" => "Sóc Trăng",
              "city_id" => 6
            ],
             [
              "name" => "Thạnh Trị",
              "city_id" => 6
            ],
             [
              "name" => "Trần Đề",
              "city_id" => 6
            ],
             [
              "name" => "Vĩnh Châu",
              "city_id" => 6
            ],
             [
              "name" => "Bắc Yên",
              "city_id" => 7
            ],
             [
              "name" => "Mai Sơn",
              "city_id" => 7
            ],
             [
              "name" => "Mộc Châu",
              "city_id" => 7
            ],
             [
              "name" => "Mường La",
              "city_id" => 7
            ],
             [
              "name" => "Phù Yên",
              "city_id" => 7
            ],
             [
              "name" => "Quỳnh Nhai",
              "city_id" => 7
            ],
             [
              "name" => "Sơn La",
              "city_id" => 7
            ],
             [
              "name" => "Sông Mã",
              "city_id" => 7
            ],
             [
              "name" => "Sốp Cộp",
              "city_id" => 7
            ],
             [
              "name" => "Thuận Châu",
              "city_id" => 7
            ],
             [
              "name" => "Vân Hồ",
              "city_id" => 7
            ],
             [
              "name" => "Yên Châu",
              "city_id" => 7
            ],
             [
              "name" => "Đông Hưng",
              "city_id" => 8
            ],
             [
              "name" => "Hưng Hà",
              "city_id" => 8
            ],
             [
              "name" => "Kiến Xương",
              "city_id" => 8
            ],
             [
              "name" => "Quỳnh Phụ",
              "city_id" => 8
            ],
             [
              "name" => "Thái Bình",
              "city_id" => 8
            ],
             [
              "name" => "Thái Thuỵ",
              "city_id" => 8
            ],
             [
              "name" => "Tiền Hải",
              "city_id" => 8
            ],
             [
              "name" => "Vũ Thư",
              "city_id" => 8
            ],
             [
              "name" => "A Lưới",
              "city_id" => 9
            ],
             [
              "name" => "Huế",
              "city_id" => 9
            ],
             [
              "name" => "Hương Thủy",
              "city_id" => 9
            ],
             [
              "name" => "Hương Trà",
              "city_id" => 9
            ],
             [
              "name" => "Nam Đông",
              "city_id" => 9
            ],
             [
              "name" => "Phong Điền",
              "city_id" => 9
            ],
             [
              "name" => "Phú Lộc",
              "city_id" => 9
            ],
             [
              "name" => "Phú Vang",
              "city_id" => 9
            ],
             [
              "name" => "Quảng Điền",
              "city_id" => 9
            ],
             [
              "name" => "Càng Long",
              "city_id" => 10
            ],
             [
              "name" => "Cầu Kè",
              "city_id" => 10
            ],
             [
              "name" => "Cầu Ngang",
              "city_id" => 10
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 10
            ],
             [
              "name" => "Duyên Hải",
              "city_id" => 10
            ],
             [
              "name" => "Tiểu Cần",
              "city_id" => 10
            ],
             [
              "name" => "Trà Cú",
              "city_id" => 10
            ],
             [
              "name" => "Trà Vinh",
              "city_id" => 10
            ],
             [
              "name" => "Chiêm Hóa",
              "city_id" => 11
            ],
             [
              "name" => "Hàm Yên",
              "city_id" => 11
            ],
             [
              "name" => "Lâm Bình",
              "city_id" => 11
            ],
             [
              "name" => "Na Hang",
              "city_id" => 11
            ],
             [
              "name" => "Sơn Dương",
              "city_id" => 11
            ],
             [
              "name" => "Tuyên Quang",
              "city_id" => 11
            ],
             [
              "name" => "Yên Sơn",
              "city_id" => 11
            ],
             [
              "name" => "Bình Minh",
              "city_id" => 12
            ],
             [
              "name" => "Bình Tân",
              "city_id" => 12
            ],
             [
              "name" => "Long Hồ",
              "city_id" => 12
            ],
             [
              "name" => "Mang Thít",
              "city_id" => 12
            ],
             [
              "name" => "Tam Bình",
              "city_id" => 12
            ],
             [
              "name" => "Trà Ôn",
              "city_id" => 12
            ],
             [
              "name" => "Vĩnh Long",
              "city_id" => 12
            ],
             [
              "name" => "Vũng Liêm",
              "city_id" => 12
            ],
             [
              "name" => "Bình Xuyên",
              "city_id" => 13
            ],
             [
              "name" => "Lập Thạch",
              "city_id" => 13
            ],
             [
              "name" => "Phúc Yên",
              "city_id" => 13
            ],
             [
              "name" => "Sông Lô",
              "city_id" => 13
            ],
             [
              "name" => "Tam Dương",
              "city_id" => 13
            ],
             [
              "name" => "Tam Đảo",
              "city_id" => 13
            ],
             [
              "name" => "Vĩnh Tường",
              "city_id" => 13
            ],
             [
              "name" => "Vĩnh Yên",
              "city_id" => 13
            ],
             [
              "name" => "Yên Lạc",
              "city_id" => 13
            ],
             [
              "name" => "Điện Biên",
              "city_id" => 14
            ],
             [
              "name" => "Điện Biên Đông",
              "city_id" => 14
            ],
             [
              "name" => "Điện Biên Phủ",
              "city_id" => 14
            ],
             [
              "name" => "Mường Ảng",
              "city_id" => 14
            ],
             [
              "name" => "Mường Chà",
              "city_id" => 14
            ],
             [
              "name" => "Mường Lay",
              "city_id" => 14
            ],
             [
              "name" => "Mường Nhé",
              "city_id" => 14
            ],
             [
              "name" => "Nậm Pồ",
              "city_id" => 14
            ],
             [
              "name" => "Tủa Chùa",
              "city_id" => 14
            ],
             [
              "name" => "Tuần Giáo",
              "city_id" => 14
            ],
             [
              "name" => "Buôn Đôn",
              "city_id" => 15
            ],
             [
              "name" => "Buôn Hồ",
              "city_id" => 15
            ],
             [
              "name" => "Buôn Ma Thuột",
              "city_id" => 15
            ],
             [
              "name" => "Cư Kuin",
              "city_id" => 15
            ],
             [
              "name" => "Cư M\"gar",
              "city_id" => 15
            ],
             [
              "name" => "Ea H\"Leo",
              "city_id" => 15
            ],
             [
              "name" => "Ea Kar",
              "city_id" => 15
            ],
             [
              "name" => "Ea Súp",
              "city_id" => 15
            ],
             [
              "name" => "Krông Ana",
              "city_id" => 15
            ],
             [
              "name" => "Krông Bông",
              "city_id" => 15
            ],
             [
              "name" => "Krông Buk",
              "city_id" => 15
            ],
             [
              "name" => "Krông Năng",
              "city_id" => 15
            ],
             [
              "name" => "Krông Pắc",
              "city_id" => 15
            ],
             [
              "name" => "Lăk",
              "city_id" => 15
            ],
             [
              "name" => "M\"Đrăk",
              "city_id" => 15
            ],
             [
              "name" => "Cư Jút",
              "city_id" => 16
            ],
             [
              "name" => "Dăk GLong",
              "city_id" => 16
            ],
             [
              "name" => "Dăk Mil",
              "city_id" => 16
            ],
             [
              "name" => "Dăk R\"Lấp",
              "city_id" => 16
            ],
             [
              "name" => "Dăk Song",
              "city_id" => 16
            ],
             [
              "name" => "Gia Nghĩa",
              "city_id" => 16
            ],
             [
              "name" => "Krông Nô",
              "city_id" => 16
            ],
             [
              "name" => "Tuy Đức",
              "city_id" => 16
            ],
             [
              "name" => "Cao Lãnh",
              "city_id" => 17
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 17
            ],
             [
              "name" => "Hồng Ngự",
              "city_id" => 17
            ],
             [
              "name" => "Huyện Cao Lãnh",
              "city_id" => 17
            ],
             [
              "name" => "Huyện Hồng Ngự",
              "city_id" => 17
            ],
             [
              "name" => "Lai Vung",
              "city_id" => 17
            ],
             [
              "name" => "Lấp Vò",
              "city_id" => 17
            ],
             [
              "name" => "Sa Đéc",
              "city_id" => 17
            ],
             [
              "name" => "Tam Nông",
              "city_id" => 17
            ],
             [
              "name" => "Tân Hồng",
              "city_id" => 17
            ],
             [
              "name" => "Thanh Bình",
              "city_id" => 17
            ],
             [
              "name" => "Tháp Mười",
              "city_id" => 17
            ],
             [
              "name" => "Cẩm Xuyên",
              "city_id" => 18
            ],
             [
              "name" => "Can Lộc",
              "city_id" => 18
            ],
             [
              "name" => "Đức Thọ",
              "city_id" => 18
            ],
             [
              "name" => "Hà Tĩnh",
              "city_id" => 18
            ],
             [
              "name" => "Hồng Lĩnh",
              "city_id" => 18
            ],
             [
              "name" => "Hương Khê",
              "city_id" => 18
            ],
             [
              "name" => "Hương Sơn",
              "city_id" => 18
            ],
             [
              "name" => "Kỳ Anh",
              "city_id" => 18
            ],
             [
              "name" => "Lộc Hà",
              "city_id" => 18
            ],
             [
              "name" => "Nghi Xuân",
              "city_id" => 18
            ],
             [
              "name" => "Thạch Hà",
              "city_id" => 18
            ],
             [
              "name" => "Vũ Quang",
              "city_id" => 18
            ],
             [
              "name" => "An Dương",
              "city_id" => 19
            ],
             [
              "name" => "An Lão",
              "city_id" => 19
            ],
             [
              "name" => "Bạch Long Vĩ",
              "city_id" => 19
            ],
             [
              "name" => "Cát Hải",
              "city_id" => 19
            ],
             [
              "name" => "Dương Kinh",
              "city_id" => 19
            ],
             [
              "name" => "Đồ Sơn",
              "city_id" => 19
            ],
             [
              "name" => "Hải An",
              "city_id" => 19
            ],
             [
              "name" => "Hồng Bàng",
              "city_id" => 19
            ],
             [
              "name" => "Kiến An",
              "city_id" => 19
            ],
             [
              "name" => "Kiến Thụy",
              "city_id" => 19
            ],
             [
              "name" => "Lê Chân",
              "city_id" => 19
            ],
             [
              "name" => "Ngô Quyền",
              "city_id" => 19
            ],
             [
              "name" => "Thủy Nguyên",
              "city_id" => 19
            ],
             [
              "name" => "Tiên Lãng",
              "city_id" => 19
            ],
             [
              "name" => "Vĩnh Bảo",
              "city_id" => 19
            ],
             [
              "name" => "Cam Lâm",
              "city_id" => 20
            ],
             [
              "name" => "Cam Ranh",
              "city_id" => 20
            ],
             [
              "name" => "Diên Khánh",
              "city_id" => 20
            ],
             [
              "name" => "Khánh Sơn",
              "city_id" => 20
            ],
             [
              "name" => "Khánh Vĩnh",
              "city_id" => 20
            ],
             [
              "name" => "Nha Trang",
              "city_id" => 20
            ],
             [
              "name" => "Ninh Hòa",
              "city_id" => 20
            ],
             [
              "name" => "Trường Sa",
              "city_id" => 20
            ],
             [
              "name" => "Vạn Ninh",
              "city_id" => 20
            ],
             [
              "name" => "Bến Lức",
              "city_id" => 21
            ],
             [
              "name" => "Cần Đước",
              "city_id" => 21
            ],
             [
              "name" => "Cần Giuộc",
              "city_id" => 21
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 21
            ],
             [
              "name" => "Đức Hòa",
              "city_id" => 21
            ],
             [
              "name" => "Đức Huệ",
              "city_id" => 21
            ],
             [
              "name" => "Kiến Tường",
              "city_id" => 21
            ],
             [
              "name" => "Mộc Hóa",
              "city_id" => 21
            ],
             [
              "name" => "Tân An",
              "city_id" => 21
            ],
             [
              "name" => "Tân Hưng",
              "city_id" => 21
            ],
             [
              "name" => "Tân Thạnh",
              "city_id" => 21
            ],
             [
              "name" => "Tân Trụ",
              "city_id" => 21
            ],
             [
              "name" => "Thạnh Hóa",
              "city_id" => 21
            ],
             [
              "name" => "Thủ Thừa",
              "city_id" => 21
            ],
             [
              "name" => "Vĩnh Hưng",
              "city_id" => 21
            ],
             [
              "name" => "Bắc Sơn",
              "city_id" => 22
            ],
             [
              "name" => "Bình Gia",
              "city_id" => 22
            ],
             [
              "name" => "Cao Lộc",
              "city_id" => 22
            ],
             [
              "name" => "Chi Lăng",
              "city_id" => 22
            ],
             [
              "name" => "Đình Lập",
              "city_id" => 22
            ],
             [
              "name" => "Hữu Lũng",
              "city_id" => 22
            ],
             [
              "name" => "Lạng Sơn",
              "city_id" => 22
            ],
             [
              "name" => "Lộc Bình",
              "city_id" => 22
            ],
             [
              "name" => "Tràng Định",
              "city_id" => 22
            ],
             [
              "name" => "Văn Lãng",
              "city_id" => 22
            ],
             [
              "name" => "Văn Quan",
              "city_id" => 22
            ],
             [
              "name" => "Bác Ái",
              "city_id" => 23
            ],
             [
              "name" => "Ninh Hải",
              "city_id" => 23
            ],
             [
              "name" => "Ninh Phước",
              "city_id" => 23
            ],
             [
              "name" => "Ninh Sơn",
              "city_id" => 23
            ],
             [
              "name" => "Phan Rang - Tháp Chàm",
              "city_id" => 23
            ],
             [
              "name" => "Thuận Bắc",
              "city_id" => 23
            ],
             [
              "name" => "Thuận Nam",
              "city_id" => 23
            ],
             [
              "name" => "Ba Tơ",
              "city_id" => 24
            ],
             [
              "name" => "Bình Sơn",
              "city_id" => 24
            ],
             [
              "name" => "Đức Phổ",
              "city_id" => 24
            ],
             [
              "name" => "Lý Sơn",
              "city_id" => 24
            ],
             [
              "name" => "Minh Long",
              "city_id" => 24
            ],
             [
              "name" => "Mộ Đức",
              "city_id" => 24
            ],
             [
              "name" => "Nghĩa Hành",
              "city_id" => 24
            ],
             [
              "name" => "Quảng Ngãi",
              "city_id" => 24
            ],
             [
              "name" => "Sơn Hà",
              "city_id" => 24
            ],
             [
              "name" => "Sơn Tây",
              "city_id" => 24
            ],
             [
              "name" => "Sơn Tịnh",
              "city_id" => 24
            ],
             [
              "name" => "Tây Trà",
              "city_id" => 24
            ],
             [
              "name" => "Trà Bồng",
              "city_id" => 24
            ],
             [
              "name" => "Tư Nghĩa",
              "city_id" => 24
            ],
             [
              "name" => "Cái Bè",
              "city_id" => 25
            ],
             [
              "name" => "Cai Lậy",
              "city_id" => 25
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 25
            ],
             [
              "name" => "Chợ Gạo",
              "city_id" => 25
            ],
             [
              "name" => "Gò Công",
              "city_id" => 25
            ],
             [
              "name" => "Gò Công Đông",
              "city_id" => 25
            ],
             [
              "name" => "Gò Công Tây",
              "city_id" => 25
            ],
             [
              "name" => "Huyện Cai Lậy",
              "city_id" => 25
            ],
             [
              "name" => "Mỹ Tho",
              "city_id" => 25
            ],
             [
              "name" => "Tân Phú Đông",
              "city_id" => 25
            ],
             [
              "name" => "Tân Phước",
              "city_id" => 25
            ],
             [
              "name" => "Cẩm Lệ",
              "city_id" => 26
            ],
             [
              "name" => "Hải Châu",
              "city_id" => 26
            ],
             [
              "name" => "Hòa Vang",
              "city_id" => 26
            ],
             [
              "name" => "Hoàng Sa",
              "city_id" => 26
            ],
             [
              "name" => "Liên Chiểu",
              "city_id" => 26
            ],
             [
              "name" => "Ngũ Hành Sơn",
              "city_id" => 26
            ],
             [
              "name" => "Sơn Trà",
              "city_id" => 26
            ],
             [
              "name" => "Thanh Khê",
              "city_id" => 26
            ],
             [
              "name" => "Bàu Bàng",
              "city_id" => 27
            ],
             [
              "name" => "Bến Cát",
              "city_id" => 27
            ],
             [
              "name" => "Dầu Tiếng",
              "city_id" => 27
            ],
             [
              "name" => "Dĩ An",
              "city_id" => 27
            ],
             [
              "name" => "Phú Giáo",
              "city_id" => 27
            ],
             [
              "name" => "Tân Uyên",
              "city_id" => 27
            ],
             [
              "name" => "Thủ Dầu Một",
              "city_id" => 27
            ],
             [
              "name" => "Thuận An",
              "city_id" => 27
            ],
             [
              "name" => "Biên Hòa",
              "city_id" => 28
            ],
             [
              "name" => "Cẩm Mỹ",
              "city_id" => 28
            ],
             [
              "name" => "Định Quán",
              "city_id" => 28
            ],
             [
              "name" => "Long Khánh",
              "city_id" => 28
            ],
             [
              "name" => "Long Thành",
              "city_id" => 28
            ],
             [
              "name" => "Nhơn Trạch",
              "city_id" => 28
            ],
             [
              "name" => "Tân Phú",
              "city_id" => 28
            ],
             [
              "name" => "Thống Nhất",
              "city_id" => 28
            ],
             [
              "name" => "Trảng Bom",
              "city_id" => 28
            ],
             [
              "name" => "Vĩnh Cửu",
              "city_id" => 28
            ],
             [
              "name" => "Xuân Lộc",
              "city_id" => 28
            ],
             [
              "name" => "Bà Rịa",
              "city_id" => 29
            ],
             [
              "name" => "Châu Đức",
              "city_id" => 29
            ],
             [
              "name" => "Côn Đảo",
              "city_id" => 29
            ],
             [
              "name" => "Đất Đỏ",
              "city_id" => 29
            ],
             [
              "name" => "Long Điền",
              "city_id" => 29
            ],
             [
              "name" => "Tân Thành",
              "city_id" => 29
            ],
             [
              "name" => "Vũng Tàu",
              "city_id" => 29
            ],
             [
              "name" => "Xuyên Mộc",
              "city_id" => 29
            ],
             [
              "name" => " Thới Lai",
              "city_id" => 30
            ],
             [
              "name" => "Bình Thủy",
              "city_id" => 30
            ],
             [
              "name" => "Cái Răng",
              "city_id" => 30
            ],
             [
              "name" => "Cờ Đỏ",
              "city_id" => 30
            ],
             [
              "name" => "Ninh Kiều",
              "city_id" => 30
            ],
             [
              "name" => "Ô Môn",
              "city_id" => 30
            ],
             [
              "name" => "Phong Điền",
              "city_id" => 30
            ],
             [
              "name" => "Thốt Nốt",
              "city_id" => 30
            ],
             [
              "name" => "Vĩnh Thạnh",
              "city_id" => 30
            ],
             [
              "name" => "Bắc Bình",
              "city_id" => 31
            ],
             [
              "name" => "Đảo Phú Quý",
              "city_id" => 31
            ],
             [
              "name" => "Đức Linh",
              "city_id" => 31
            ],
             [
              "name" => "Hàm Tân",
              "city_id" => 31
            ],
             [
              "name" => "Hàm Thuận Bắc",
              "city_id" => 31
            ],
             [
              "name" => "Hàm Thuận Nam",
              "city_id" => 31
            ],
             [
              "name" => "La Gi",
              "city_id" => 31
            ],
             [
              "name" => "Phan Thiết",
              "city_id" => 31
            ],
             [
              "name" => "Tánh Linh",
              "city_id" => 31
            ],
             [
              "name" => "Tuy Phong",
              "city_id" => 31
            ],
             [
              "name" => "Bảo Lâm",
              "city_id" => 32
            ],
             [
              "name" => "Bảo Lộc",
              "city_id" => 32
            ],
             [
              "name" => "Cát Tiên",
              "city_id" => 32
            ],
             [
              "name" => "Di Linh",
              "city_id" => 32
            ],
             [
              "name" => "Đạ Huoai",
              "city_id" => 32
            ],
             [
              "name" => "Đà Lạt",
              "city_id" => 32
            ],
             [
              "name" => "Đạ Tẻh",
              "city_id" => 32
            ],
             [
              "name" => "Đam Rông",
              "city_id" => 32
            ],
             [
              "name" => "Đơn Dương",
              "city_id" => 32
            ],
             [
              "name" => "Đức Trọng",
              "city_id" => 32
            ],
             [
              "name" => "Lạc Dương",
              "city_id" => 32
            ],
             [
              "name" => "Lâm Hà",
              "city_id" => 32
            ],
             [
              "name" => "An Biên",
              "city_id" => 33
            ],
             [
              "name" => "An Minh",
              "city_id" => 33
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 33
            ],
             [
              "name" => "Giang Thành",
              "city_id" => 33
            ],
             [
              "name" => "Giồng Riềng",
              "city_id" => 33
            ],
             [
              "name" => "Gò Quao",
              "city_id" => 33
            ],
             [
              "name" => "Hà Tiên",
              "city_id" => 33
            ],
             [
              "name" => "Hòn Đất",
              "city_id" => 33
            ],
             [
              "name" => "Kiên Hải",
              "city_id" => 33
            ],
             [
              "name" => "Kiên Lương",
              "city_id" => 33
            ],
             [
              "name" => "Phú Quốc",
              "city_id" => 33
            ],
             [
              "name" => "Rạch Giá",
              "city_id" => 33
            ],
             [
              "name" => "Tân Hiệp",
              "city_id" => 33
            ],
             [
              "name" => "U minh Thượng",
              "city_id" => 33
            ],
             [
              "name" => "Vĩnh Thuận",
              "city_id" => 33
            ],
             [
              "name" => "Bắc Ninh",
              "city_id" => 34
            ],
             [
              "name" => "Gia Bình",
              "city_id" => 34
            ],
             [
              "name" => "Lương Tài",
              "city_id" => 34
            ],
             [
              "name" => "Quế Võ",
              "city_id" => 34
            ],
             [
              "name" => "Thuận Thành",
              "city_id" => 34
            ],
             [
              "name" => "Tiên Du",
              "city_id" => 34
            ],
             [
              "name" => "Từ Sơn",
              "city_id" => 34
            ],
             [
              "name" => "Yên Phong",
              "city_id" => 34
            ],
             [
              "name" => "Bá Thước",
              "city_id" => 35
            ],
             [
              "name" => "Bỉm Sơn",
              "city_id" => 35
            ],
             [
              "name" => "Cẩm Thủy",
              "city_id" => 35
            ],
             [
              "name" => "Đông Sơn",
              "city_id" => 35
            ],
             [
              "name" => "Hà Trung",
              "city_id" => 35
            ],
             [
              "name" => "Hậu Lộc",
              "city_id" => 35
            ],
             [
              "name" => "Hoằng Hóa",
              "city_id" => 35
            ],
             [
              "name" => "Lang Chánh",
              "city_id" => 35
            ],
             [
              "name" => "Mường Lát",
              "city_id" => 35
            ],
             [
              "name" => "Nga Sơn",
              "city_id" => 35
            ],
             [
              "name" => "Ngọc Lặc",
              "city_id" => 35
            ],
             [
              "name" => "Như Thanh",
              "city_id" => 35
            ],
             [
              "name" => "Như Xuân",
              "city_id" => 35
            ],
             [
              "name" => "Nông Cống",
              "city_id" => 35
            ],
             [
              "name" => "Quan Hóa",
              "city_id" => 35
            ],
             [
              "name" => "Quan Sơn",
              "city_id" => 35
            ],
             [
              "name" => "Quảng Xương",
              "city_id" => 35
            ],
             [
              "name" => "Sầm Sơn",
              "city_id" => 35
            ],
             [
              "name" => "Thạch Thành",
              "city_id" => 35
            ],
             [
              "name" => "Thanh Hóa",
              "city_id" => 35
            ],
             [
              "name" => "Thiệu Hóa",
              "city_id" => 35
            ],
             [
              "name" => "Thọ Xuân",
              "city_id" => 35
            ],
             [
              "name" => "Thường Xuân",
              "city_id" => 35
            ],
             [
              "name" => "Tĩnh Gia",
              "city_id" => 35
            ],
             [
              "name" => "Triệu Sơn",
              "city_id" => 35
            ],
             [
              "name" => "Vĩnh Lộc",
              "city_id" => 35
            ],
             [
              "name" => "Yên Định",
              "city_id" => 35
            ],
             [
              "name" => "Anh Sơn",
              "city_id" => 36
            ],
             [
              "name" => "Con Cuông",
              "city_id" => 36
            ],
             [
              "name" => "Cửa Lò",
              "city_id" => 36
            ],
             [
              "name" => "Diễn Châu",
              "city_id" => 36
            ],
             [
              "name" => "Đô Lương",
              "city_id" => 36
            ],
             [
              "name" => "Hoàng Mai",
              "city_id" => 36
            ],
             [
              "name" => "Hưng Nguyên",
              "city_id" => 36
            ],
             [
              "name" => "Kỳ Sơn",
              "city_id" => 36
            ],
             [
              "name" => "Nam Đàn",
              "city_id" => 36
            ],
             [
              "name" => "Nghi Lộc",
              "city_id" => 36
            ],
             [
              "name" => "Nghĩa Đàn",
              "city_id" => 36
            ],
             [
              "name" => "Quế Phong",
              "city_id" => 36
            ],
             [
              "name" => "Quỳ Châu",
              "city_id" => 36
            ],
             [
              "name" => "Quỳ Hợp",
              "city_id" => 36
            ],
             [
              "name" => "Quỳnh Lưu",
              "city_id" => 36
            ],
             [
              "name" => "Tân Kỳ",
              "city_id" => 36
            ],
             [
              "name" => "Thái Hòa",
              "city_id" => 36
            ],
             [
              "name" => "Thanh Chương",
              "city_id" => 36
            ],
             [
              "name" => "Tương Dương",
              "city_id" => 36
            ],
             [
              "name" => "Vinh",
              "city_id" => 36
            ],
             [
              "name" => "Yên Thành",
              "city_id" => 36
            ],
             [
              "name" => "Nam Sách",
              "city_id" => 37
            ],
             [
              "name" => "Ninh Giang",
              "city_id" => 37
            ],
             [
              "name" => "Thanh Hà",
              "city_id" => 37
            ],
             [
              "name" => "Thanh Miện",
              "city_id" => 37
            ],
             [
              "name" => "Tứ Kỳ",
              "city_id" => 37
            ],
             [
              "name" => "Bình Giang",
              "city_id" => 37
            ],
             [
              "name" => "Cẩm Giàng",
              "city_id" => 37
            ],
             [
              "name" => "Chí Linh",
              "city_id" => 37
            ],
             [
              "name" => "Gia Lộc",
              "city_id" => 37
            ],
             [
              "name" => "Hải Dương",
              "city_id" => 37
            ],
             [
              "name" => "Kim Thành",
              "city_id" => 37
            ],
             [
              "name" => "Kinh Môn",
              "city_id" => 37
            ],
             [
              "name" => "An Khê",
              "city_id" => 38
            ],
             [
              "name" => "AYun Pa",
              "city_id" => 38
            ],
             [
              "name" => "Chư Păh",
              "city_id" => 38
            ],
             [
              "name" => "Chư Pưh",
              "city_id" => 38
            ],
             [
              "name" => "Chư Sê",
              "city_id" => 38
            ],
             [
              "name" => "ChưPRông",
              "city_id" => 38
            ],
             [
              "name" => "Đăk Đoa",
              "city_id" => 38
            ],
             [
              "name" => "Đăk Pơ",
              "city_id" => 38
            ],
             [
              "name" => "Đức Cơ",
              "city_id" => 38
            ],
             [
              "name" => "Ia Grai",
              "city_id" => 38
            ],
             [
              "name" => "Ia Pa",
              "city_id" => 38
            ],
             [
              "name" => "KBang",
              "city_id" => 38
            ],
             [
              "name" => "Kông Chro",
              "city_id" => 38
            ],
             [
              "name" => "Krông Pa",
              "city_id" => 38
            ],
             [
              "name" => "Mang Yang",
              "city_id" => 38
            ],
             [
              "name" => "Phú Thiện",
              "city_id" => 38
            ],
             [
              "name" => "Plei Ku",
              "city_id" => 38
            ],
             [
              "name" => "Bình Long",
              "city_id" => 39
            ],
             [
              "name" => "Bù Đăng",
              "city_id" => 39
            ],
             [
              "name" => "Bù Đốp",
              "city_id" => 39
            ],
             [
              "name" => "Bù Gia Mập",
              "city_id" => 39
            ],
             [
              "name" => "Chơn Thành",
              "city_id" => 39
            ],
             [
              "name" => "Đồng Phú",
              "city_id" => 39
            ],
             [
              "name" => "Đồng Xoài",
              "city_id" => 39
            ],
             [
              "name" => "Hớn Quản",
              "city_id" => 39
            ],
             [
              "name" => "Lộc Ninh",
              "city_id" => 39
            ],
             [
              "name" => "Phú Riềng",
              "city_id" => 39
            ],
             [
              "name" => "Phước Long",
              "city_id" => 39
            ],
             [
              "name" => "Ân Thi",
              "city_id" => 40
            ],
             [
              "name" => "Hưng Yên",
              "city_id" => 40
            ],
             [
              "name" => "Khoái Châu",
              "city_id" => 40
            ],
             [
              "name" => "Kim Động",
              "city_id" => 40
            ],
             [
              "name" => "Mỹ Hào",
              "city_id" => 40
            ],
             [
              "name" => "Phù Cừ",
              "city_id" => 40
            ],
             [
              "name" => "Tiên Lữ",
              "city_id" => 40
            ],
             [
              "name" => "Văn Giang",
              "city_id" => 40
            ],
             [
              "name" => "Văn Lâm",
              "city_id" => 40
            ],
             [
              "name" => "Yên Mỹ",
              "city_id" => 40
            ],
             [
              "name" => "An Lão",
              "city_id" => 41
            ],
             [
              "name" => "An Nhơn",
              "city_id" => 41
            ],
             [
              "name" => "Hoài Ân",
              "city_id" => 41
            ],
             [
              "name" => "Hoài Nhơn",
              "city_id" => 41
            ],
             [
              "name" => "Phù Cát",
              "city_id" => 41
            ],
             [
              "name" => "Phù Mỹ",
              "city_id" => 41
            ],
             [
              "name" => "Quy Nhơn",
              "city_id" => 41
            ],
             [
              "name" => "Tây Sơn",
              "city_id" => 41
            ],
             [
              "name" => "Tuy Phước",
              "city_id" => 41
            ],
             [
              "name" => "Vân Canh",
              "city_id" => 41
            ],
             [
              "name" => "Vĩnh Thạnh",
              "city_id" => 41
            ],
             [
              "name" => "Bắc Giang",
              "city_id" => 42
            ],
             [
              "name" => "Hiệp Hòa",
              "city_id" => 42
            ],
             [
              "name" => "Lạng Giang",
              "city_id" => 42
            ],
             [
              "name" => "Lục Nam",
              "city_id" => 42
            ],
             [
              "name" => "Lục Ngạn",
              "city_id" => 42
            ],
             [
              "name" => "Sơn Động",
              "city_id" => 42
            ],
             [
              "name" => "Tân Yên",
              "city_id" => 42
            ],
             [
              "name" => "Việt Yên",
              "city_id" => 42
            ],
             [
              "name" => "Yên Dũng",
              "city_id" => 42
            ],
             [
              "name" => "Yên Thế",
              "city_id" => 42
            ],
             [
              "name" => "Cao Phong",
              "city_id" => 43
            ],
             [
              "name" => "Đà Bắc",
              "city_id" => 43
            ],
             [
              "name" => "Hòa Bình",
              "city_id" => 43
            ],
             [
              "name" => "Kim Bôi",
              "city_id" => 43
            ],
             [
              "name" => "Kỳ Sơn",
              "city_id" => 43
            ],
             [
              "name" => "Lạc Sơn",
              "city_id" => 43
            ],
             [
              "name" => "Lạc Thủy",
              "city_id" => 43
            ],
             [
              "name" => "Lương Sơn",
              "city_id" => 43
            ],
             [
              "name" => "Mai Châu",
              "city_id" => 43
            ],
             [
              "name" => "Tân Lạc",
              "city_id" => 43
            ],
             [
              "name" => "Yên Thủy",
              "city_id" => 43
            ],
             [
              "name" => "An Phú",
              "city_id" => 44
            ],
             [
              "name" => "Châu Đốc",
              "city_id" => 44
            ],
             [
              "name" => "Châu Phú",
              "city_id" => 44
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 44
            ],
             [
              "name" => "Chợ Mới",
              "city_id" => 44
            ],
             [
              "name" => "Long Xuyên",
              "city_id" => 44
            ],
             [
              "name" => "Phú Tân",
              "city_id" => 44
            ],
             [
              "name" => "Tân Châu",
              "city_id" => 44
            ],
             [
              "name" => "Thoại Sơn",
              "city_id" => 44
            ],
             [
              "name" => "Tịnh Biên",
              "city_id" => 44
            ],
             [
              "name" => "Tri Tôn",
              "city_id" => 44
            ],
             [
              "name" => "Bến Cầu",
              "city_id" => 45
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 45
            ],
             [
              "name" => "Dương Minh Châu",
              "city_id" => 45
            ],
             [
              "name" => "Gò Dầu",
              "city_id" => 45
            ],
             [
              "name" => "Hòa Thành",
              "city_id" => 45
            ],
             [
              "name" => "Tân Biên",
              "city_id" => 45
            ],
             [
              "name" => "Tân Châu",
              "city_id" => 45
            ],
             [
              "name" => "Tây Ninh",
              "city_id" => 45
            ],
             [
              "name" => "Trảng Bàng",
              "city_id" => 45
            ],
             [
              "name" => "Đại Từ",
              "city_id" => 46
            ],
             [
              "name" => "Định Hóa",
              "city_id" => 46
            ],
             [
              "name" => "Đồng Hỷ",
              "city_id" => 46
            ],
             [
              "name" => "Phổ Yên",
              "city_id" => 46
            ],
             [
              "name" => "Phú Bình",
              "city_id" => 46
            ],
             [
              "name" => "Phú Lương",
              "city_id" => 46
            ],
             [
              "name" => "Sông Công",
              "city_id" => 46
            ],
             [
              "name" => "Thái Nguyên",
              "city_id" => 46
            ],
             [
              "name" => "Võ Nhai",
              "city_id" => 46
            ],
             [
              "name" => "Bắc Hà",
              "city_id" => 47
            ],
             [
              "name" => "Bảo Thắng",
              "city_id" => 47
            ],
             [
              "name" => "Bảo Yên",
              "city_id" => 47
            ],
             [
              "name" => "Bát Xát",
              "city_id" => 47
            ],
             [
              "name" => "Lào Cai",
              "city_id" => 47
            ],
             [
              "name" => "Mường Khương",
              "city_id" => 47
            ],
             [
              "name" => "Sa Pa",
              "city_id" => 47
            ],
             [
              "name" => "Văn Bàn",
              "city_id" => 47
            ],
             [
              "name" => "Xi Ma Cai",
              "city_id" => 47
            ],
             [
              "name" => "Giao Thủy",
              "city_id" => 48
            ],
             [
              "name" => "Hải Hậu",
              "city_id" => 48
            ],
             [
              "name" => "Mỹ Lộc",
              "city_id" => 48
            ],
             [
              "name" => "Nam Định",
              "city_id" => 48
            ],
             [
              "name" => "Nam Trực",
              "city_id" => 48
            ],
             [
              "name" => "Nghĩa Hưng",
              "city_id" => 48
            ],
             [
              "name" => "Trực Ninh",
              "city_id" => 48
            ],
             [
              "name" => "Vụ Bản",
              "city_id" => 48
            ],
             [
              "name" => "Xuân Trường",
              "city_id" => 48
            ],
             [
              "name" => "Ý Yên",
              "city_id" => 48
            ],
             [
              "name" => "Ba Tri",
              "city_id" => 49
            ],
             [
              "name" => "Bến Tre",
              "city_id" => 49
            ],
             [
              "name" => "Bình Đại",
              "city_id" => 49
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 49
            ],
             [
              "name" => "Chợ Lách",
              "city_id" => 49
            ],
             [
              "name" => "Giồng Trôm",
              "city_id" => 49
            ],
             [
              "name" => "Mỏ Cày Bắc",
              "city_id" => 49
            ],
             [
              "name" => "Mỏ Cày Nam",
              "city_id" => 49
            ],
             [
              "name" => "Thạnh Phú",
              "city_id" => 49
            ],
             [
              "name" => "Cà Mau",
              "city_id" => 50
            ],
             [
              "name" => "Cái Nước",
              "city_id" => 50
            ],
             [
              "name" => "Đầm Dơi",
              "city_id" => 50
            ],
             [
              "name" => "Năm Căn",
              "city_id" => 50
            ],
             [
              "name" => "Ngọc Hiển",
              "city_id" => 50
            ],
             [
              "name" => "Phú Tân",
              "city_id" => 50
            ],
             [
              "name" => "Thới Bình",
              "city_id" => 50
            ],
             [
              "name" => "Trần Văn Thời",
              "city_id" => 50
            ],
             [
              "name" => "U Minh",
              "city_id" => 50
            ],
             [
              "name" => "Gia Viễn",
              "city_id" => 51
            ],
             [
              "name" => "Hoa Lư",
              "city_id" => 51
            ],
             [
              "name" => "Kim Sơn",
              "city_id" => 51
            ],
             [
              "name" => "Nho Quan",
              "city_id" => 51
            ],
             [
              "name" => "Ninh Bình",
              "city_id" => 51
            ],
             [
              "name" => "Tam Điệp",
              "city_id" => 51
            ],
             [
              "name" => "Yên Khánh",
              "city_id" => 51
            ],
             [
              "name" => "Yên Mô",
              "city_id" => 51
            ],
             [
              "name" => "Cẩm Khê",
              "city_id" => 52
            ],
             [
              "name" => "Đoan Hùng",
              "city_id" => 52
            ],
             [
              "name" => "Hạ Hòa",
              "city_id" => 52
            ],
             [
              "name" => "Lâm Thao",
              "city_id" => 52
            ],
             [
              "name" => "Phù Ninh",
              "city_id" => 52
            ],
             [
              "name" => "Phú Thọ",
              "city_id" => 52
            ],
             [
              "name" => "Tam Nông",
              "city_id" => 52
            ],
             [
              "name" => "Tân Sơn",
              "city_id" => 52
            ],
             [
              "name" => "Thanh Ba",
              "city_id" => 52
            ],
             [
              "name" => "Thanh Sơn",
              "city_id" => 52
            ],
             [
              "name" => "Thanh Thủy",
              "city_id" => 52
            ],
             [
              "name" => "Việt Trì",
              "city_id" => 52
            ],
             [
              "name" => "Yên Lập",
              "city_id" => 52
            ],
             [
              "name" => "Đông Hòa",
              "city_id" => 53
            ],
             [
              "name" => "Đồng Xuân",
              "city_id" => 53
            ],
             [
              "name" => "Phú Hòa",
              "city_id" => 53
            ],
             [
              "name" => "Sơn Hòa",
              "city_id" => 53
            ],
             [
              "name" => "Sông Cầu",
              "city_id" => 53
            ],
             [
              "name" => "Sông Hinh",
              "city_id" => 53
            ],
             [
              "name" => "Tây Hòa",
              "city_id" => 53
            ],
             [
              "name" => "Tuy An",
              "city_id" => 53
            ],
             [
              "name" => "Tuy Hòa",
              "city_id" => 53
            ],
             [
              "name" => "Bình Lục",
              "city_id" => 54
            ],
             [
              "name" => "Duy Tiên",
              "city_id" => 54
            ],
             [
              "name" => "Kim Bảng",
              "city_id" => 54
            ],
             [
              "name" => "Lý Nhân",
              "city_id" => 54
            ],
             [
              "name" => "Phủ Lý",
              "city_id" => 54
            ],
             [
              "name" => "Thanh Liêm",
              "city_id" => 54
            ],
             [
              "name" => "Đăk Glei",
              "city_id" => 55
            ],
             [
              "name" => "Đăk Hà",
              "city_id" => 55
            ],
             [
              "name" => "Kon Plông",
              "city_id" => 55
            ],
             [
              "name" => "Kon Rẫy",
              "city_id" => 55
            ],
             [
              "name" => "KonTum",
              "city_id" => 55
            ],
             [
              "name" => "Ngọc Hồi",
              "city_id" => 55
            ],
             [
              "name" => "Sa Thầy",
              "city_id" => 55
            ],
             [
              "name" => "Tu Mơ Rông",
              "city_id" => 55
            ],
             [
              "name" => "Đăk Tô",
              "city_id" => 55
            ],
             [
              "name" => "Ia H\"Drai",
              "city_id" => 55
            ],
             [
              "name" => "Cam Lộ",
              "city_id" => 56
            ],
             [
              "name" => "Đa Krông",
              "city_id" => 56
            ],
             [
              "name" => "Đảo Cồn cỏ",
              "city_id" => 56
            ],
             [
              "name" => "Đông Hà",
              "city_id" => 56
            ],
             [
              "name" => "Gio Linh",
              "city_id" => 56
            ],
             [
              "name" => "Hải Lăng",
              "city_id" => 56
            ],
             [
              "name" => "Hướng Hóa",
              "city_id" => 56
            ],
             [
              "name" => "Quảng Trị",
              "city_id" => 56
            ],
             [
              "name" => "Triệu Phong",
              "city_id" => 56
            ],
             [
              "name" => "Vĩnh Linh",
              "city_id" => 56
            ],
             [
              "name" => "Châu Thành",
              "city_id" => 57
            ],
             [
              "name" => "Châu Thành A",
              "city_id" => 57
            ],
             [
              "name" => "Long Mỹ",
              "city_id" => 57
            ],
             [
              "name" => "Ngã Bảy",
              "city_id" => 57
            ],
             [
              "name" => "Phụng Hiệp",
              "city_id" => 57
            ],
             [
              "name" => "Vị Thanh",
              "city_id" => 57
            ],
             [
              "name" => "Vị Thủy",
              "city_id" => 57
            ],
             [
              "name" => "Bạc Liêu",
              "city_id" => 58
            ],
             [
              "name" => "Đông Hải",
              "city_id" => 58
            ],
             [
              "name" => "Giá Rai",
              "city_id" => 58
            ],
             [
              "name" => "Hòa Bình",
              "city_id" => 58
            ],
             [
              "name" => "Hồng Dân",
              "city_id" => 58
            ],
             [
              "name" => "Phước Long",
              "city_id" => 58
            ],
             [
              "name" => "Vĩnh Lợi",
              "city_id" => 58
            ],
             [
              "name" => "Lục Yên",
              "city_id" => 59
            ],
             [
              "name" => "Mù Cang Chải",
              "city_id" => 59
            ],
             [
              "name" => "Nghĩa Lộ",
              "city_id" => 59
            ],
             [
              "name" => "Trạm Tấu",
              "city_id" => 59
            ],
             [
              "name" => "Trấn Yên",
              "city_id" => 59
            ],
             [
              "name" => "Văn Chấn",
              "city_id" => 59
            ],
             [
              "name" => "Văn Yên",
              "city_id" => 59
            ],
             [
              "name" => "Yên Bái",
              "city_id" => 59
            ],
             [
              "name" => "Yên Bình",
              "city_id" => 59
            ],
             [
              "name" => "Lai Châu",
              "city_id" => 60
            ],
             [
              "name" => "Mường Tè",
              "city_id" => 60
            ],
             [
              "name" => "Nậm Nhùn",
              "city_id" => 60
            ],
             [
              "name" => "Phong Thổ",
              "city_id" => 60
            ],
             [
              "name" => "Sìn Hồ",
              "city_id" => 60
            ],
             [
              "name" => "Tam Đường",
              "city_id" => 60
            ],
             [
              "name" => "Tân Uyên",
              "city_id" => 60
            ],
             [
              "name" => "Than Uyên",
              "city_id" => 60
            ],
             [
              "name" => "Bắc Mê",
              "city_id" => 61
            ],
             [
              "name" => "Bắc Quang",
              "city_id" => 61
            ],
             [
              "name" => "Đồng Văn",
              "city_id" => 61
            ],
             [
              "name" => "Hà Giang",
              "city_id" => 61
            ],
             [
              "name" => "Hoàng Su Phì",
              "city_id" => 61
            ],
             [
              "name" => "Mèo Vạc",
              "city_id" => 61
            ],
             [
              "name" => "Quản Bạ",
              "city_id" => 61
            ],
             [
              "name" => "Quang Bình",
              "city_id" => 61
            ],
             [
              "name" => "Vị Xuyên",
              "city_id" => 61
            ],
             [
              "name" => "Xín Mần",
              "city_id" => 61
            ],
             [
              "name" => "Yên Minh",
              "city_id" => 61
            ],
             [
              "name" => "Ba Bể",
              "city_id" => 62
            ],
             [
              "name" => "Bắc Kạn",
              "city_id" => 62
            ],
             [
              "name" => "Bạch Thông",
              "city_id" => 62
            ],
             [
              "name" => "Chợ Đồn",
              "city_id" => 62
            ],
             [
              "name" => "Chợ Mới",
              "city_id" => 62
            ],
             [
              "name" => "Na Rì",
              "city_id" => 62
            ],
             [
              "name" => "Ngân Sơn",
              "city_id" => 62
            ],
             [
              "name" => "Pác Nặm",
              "city_id" => 62
            ],
             [
              "name" => "Bảo Lạc",
              "city_id" => 63
            ],
             [
              "name" => "Bảo Lâm",
              "city_id" => 63
            ],
             [
              "name" => "Cao Bằng",
              "city_id" => 63
            ],
             [
              "name" => "Hạ Lang",
              "city_id" => 63
            ],
             [
              "name" => "Hà Quảng",
              "city_id" => 63
            ],
             [
              "name" => "Hòa An",
              "city_id" => 63
            ],
             [
              "name" => "Nguyên Bình",
              "city_id" => 63
            ],
             [
              "name" => "Phục Hòa",
              "city_id" => 63
            ],
             [
              "name" => "Quảng Uyên",
              "city_id" => 63
            ],
             [
              "name" => "Thạch An",
              "city_id" => 63
            ],
             [
              "name" => "Thông Nông",
              "city_id" => 63
            ],
             [
              "name" => "Trà Lĩnh",
              "city_id" => 63
            ],
             [
              "name" => "Trùng Khánh",
              "city_id" => 63
            ]
        ]);
    }
}
