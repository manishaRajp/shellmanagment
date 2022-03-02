<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'discount_ammount',
        'discount_parsent',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
   
}
