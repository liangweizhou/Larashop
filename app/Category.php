<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 数据表名
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['parent_id', 'parent_ids', 'name', 'level', 'spu_conf', 'sku_conf'];

    /**
     * 品类下的商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

    /**
     * 父品类
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    /**
     * 子品类
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
}
