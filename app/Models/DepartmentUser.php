<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentUser extends Model
{
    use HasFactory;
    protected $table = 'department_users';

    protected $fillable = [
        'department_id',
        'user_id',
        'position',
    ];
}
