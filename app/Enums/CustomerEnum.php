<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CustomerEnum extends Enum
{
    // const NEW_CUSTOMER = 'Khách hàng thêm mới';
    // const CONSULTING_CUSTOMER = 'Khách hàng thêm mới';
    // const CUSTOMER_NEW = 'Khách hàng thêm mới';
    // const CUSTOMER_NEW = 'Khách hàng thêm mới';
    // const CUSTOMER_NEW = 'Khách hàng thêm mới';
    // const CUSTOMER_NEW = 'Khách hàng thêm mới';
    // const CUSTOMER_NEW = 'Khách hàng thêm mới';
    const CUSTOMER_TYPE = [
        'Khách hàng thêm mới',
        'Khách hàng đang tư vấn',
        'Khách hàng hẹn lịch',
        'Khách hàng liên hệ lại',
        'Khách hàng chốt',
        'Khách hàng Bán',
        'Khách hàng Mua',
        'Khách hàng Đầu tư',
    ];
}
