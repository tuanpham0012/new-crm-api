<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;

    const CONTACT_TYPE = [
        'email' => 'email',
        'phone' => 'phone',
        'message' => 'message',
    ];

    const CONTACT_TYPE_LABLE = [
        'email' => 'Email',
        'phone' => 'Điện thoại',
        'message' => 'Messager',
    ];

    const TYPE = [
        'company_phone' => 'company_phone',
        'mobile_phone' => 'mobile_phone',
        'fax' => 'fax',
        'home_phone' => 'home_phone',
        'work_email' => 'work_email',
        'personal_email' => 'personal_email',
        'facebook' => 'facebook',
        'telegram' => 'telegram',
        'skype' => 'skype',
        'zalo' => 'zalo',
        'other' => 'other',
    ];

    const TYPE_LABLE = [
        'company_phone' => 'Công ty',
        'mobile_phone' => 'Di động',
        'fax' => 'Fax',
        'home_phone' => 'Nhà',
        'work_email' => 'Công việc',
        'personal_email' => 'Cá nhân',
        'facebook' => 'Facebook',
        'telegram' => 'Telegram',
        'skype' => 'Skype',
        'zalo' => 'Zalo',
        'other' => 'Khác',
    ];

    protected $table = 'customer_contacts';
    protected $fillable = [
        'customer_id',
        'value',
        'type',
        'type2'
    ];
}
