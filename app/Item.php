<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * 数据表名
     *
     * @var string
     */
    protected $table = 'items';

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
    protected $fillable = ['name', 'product_id', 'category_id', 'category_ids', 'spu', 'sku',
        'price', 'total_amount', 'remaining_amount', 'cover_img', 'imgs'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
