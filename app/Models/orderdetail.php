<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';
    protected $fillable = [
        'id',
        'order_id',
        'product',
        'quentity',
        'price'
    ];


    protected $casts = [
        'order_id' => 'array',
        'product' => 'array'
    ];

}
