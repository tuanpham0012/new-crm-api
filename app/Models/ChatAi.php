<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatAi extends Model
{
    use HasFactory;

    const ROLE_USER = 'user';
    const ROLE_MODEL = 'model';
    protected $table = 'chat_ais';
    protected $fillable = [
        'uuid',
        'content',
        'role',
        'type',
        'user_id'
    ];
}
