<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected  $fillable = ['id', 'name', 'type', 'value', 'total_amount',
        'remaining_amount', 'category_id', 'user_level', 'expire_at'];
}
