<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $casts = ['category_ids' => 'json','spu' => 'json'];
}
