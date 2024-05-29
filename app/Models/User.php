<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\TableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Wildside\Userstamps\Userstamps;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Userstamps, TableTrait;
    const GENDER_DEFAULT = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const LIST_GENDER = [
        self::GENDER_DEFAULT,
        self::GENDER_MALE,
        self::GENDER_FEMALE,
    ];
    const LABEL_GENDER = [
        self::GENDER_DEFAULT => 'Khác',
        self::GENDER_MALE => 'Nam',
        self::GENDER_FEMALE => 'Nữ',
    ];

    const STATUS_ACTIVE = 0;
    const STATUS_BLOCKED = 1;
    const LIST_STATUS = [
        self::STATUS_ACTIVE,
        self::STATUS_BLOCKED,
    ];

    const LABEL_STATUS = [
        self::STATUS_ACTIVE => 'Hoạt động',
        self::STATUS_BLOCKED => 'Đã khóa',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'email',
        'phone',
        'birthday',
        'address',
        'nationality_id',
        'gender',
        'status',
        'avatar',
        'last_login',
        'email_verified_at',
        'password',
        'role_id',
        'note',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
