<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * 数据表名
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * 主键名
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 可集体赋值字段
     *
     * @var array
     */
    protected $fillable = ['name', 'category_id', 'category_ids', 'spu', 'description'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'product_id');
    }
}
