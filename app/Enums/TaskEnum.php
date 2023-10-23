<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TaskEnum extends Enum
{
    const TASK_TYPE = [
        'Gọi điện',
        'Hẹn gặp',
        'Gửi mail',
        'Gửi SMS',
        'Hợp đồng',
        'Tư vấn',
        'Hỗ trợ',
        'Khác',
    ];
}
