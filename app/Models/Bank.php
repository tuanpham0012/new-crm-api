<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends BaseModel
{
    protected $table = 'banks';
    protected $fillable = [
        'name',
        'def_name',
        'status',
        'note',
    ];
   
}
