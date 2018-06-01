<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'item_id', 'amount'];
    protected $table = 'carts';
    protected $primaryKey = 'id';
}
