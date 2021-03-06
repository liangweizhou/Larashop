<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'total_amount', 'discount', 'freight', 'payment', 'items', 'address','invoice'];
}
