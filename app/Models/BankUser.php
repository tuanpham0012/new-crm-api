<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankUser extends BaseModel
{
    protected $table = 'bank_user';
    protected $fillable = [
        'user_id',
        'bank_id',
        'bank_number',
        'bank_username',
    ];
}
