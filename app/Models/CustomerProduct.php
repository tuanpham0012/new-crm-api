<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends BaseModel
{

    protected $table = 'customer_product';
    protected $fillable = [
        'customer_id',
        'product_id',
    ];
}
