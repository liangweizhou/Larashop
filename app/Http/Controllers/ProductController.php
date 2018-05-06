<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * ProductController constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function show($id, $itemid = null)
    {
        $productid = intval($id);
        // 获取商品信息
        $product = $this->model
            ->select('id', 'name', 'category_id', 'category_ids', 'spu', 'description')
            ->find($productid);

        // 品类信息
        $category = $product->category()
            ->select('id', 'name', 'level', 'sku_conf')
            ->first();
        $skuConf = json_decode($category['sku_conf'], true);

        $items = $product->items()
            ->select('id', 'name', 'spu', 'sku', 'price', 'total_amount', 'remaining_amount', 'cover_img', 'imgs')
            ->get();

        // 生成新的sku，新sku中key=>[value, name, display]，其中value全部为字符串，如果原sku是数组，这里进行组合，
        // 其中idx使用新sku按key降序排序，key1:value1;key2:value2...形式作为key，
        // 'price', 'total_amount', 'remaining_amount', 'cover_img', 'imgs'记录到新的sku中
        // 对skuConf中的每个key获取其unique值（即新sku的value值），在product详情页显示时使用radio
        $skus = [];
        $currentItem = [];
        // key排序
        $sortedKeys = [];

        // 前端sku条件筛选选项，对于skuConf中的每一项遍历其所有单品，集合单品所有出现过的值，并且对于数组类型的值进行合并，有单位的值带上单位
        $skuFormConf = [];
        foreach (array_keys($skuConf) as $key)
        {
            $skuFormConf[$key] = [];
        }

        foreach ($items as $item)
        {
            $itemSku = [];
            $sku = json_decode($item['sku'], true);
            foreach ($sku as $key => $value)
            {
                if (is_array($value))
                {
                    sort($value);
                    $value = implode('&', $value);
                }
                $skuFormConf[$key][] = $value;
                $itemSku[$key] = $value;
            }

            ksort($itemSku);
            $arr = [];

            foreach ($itemSku as $k => $v)
            {
                $arr[] = $k . ':' . $v;
            }
            $idx = implode(';', $arr);
            $skus[$idx] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'total_amount' => $item['total_amount'],
                'remaining_amount' => $item['remaining_amount'],
                'cover_img' => $item['cover_img'],
                'imgs' => $item['imgs'],
                'item_sku' => $itemSku
            ];

            if ($itemid == $item['id'])
            {
                $currentItem = [
                    'idx' => $idx,
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'total_amount' => $item['total_amount'],
                    'remaining_amount' => $item['remaining_amount'],
                    'cover_img' => $item['cover_img'],
                    'imgs' => $item['imgs'],
                    'item_sku' => $itemSku
                ];
            }
        }
        $sortedKeys = array_keys($itemSku);

        // 如果不存在当前item，则选择商品的最后一个item，即上面的循环结束后保留在变量$idx里面的值
        if (count($currentItem) <= 0 and count($items) > 0)
        {
            $currentItem = $skus[$idx];
            $currentItem['idx'] = $idx;
        }

        // 去重
        foreach ($skuFormConf as $key => $val)
        {
            $skuFormConf[$key] = array_unique($skuFormConf[$key]);
        }

        return view('product.show')->with(['product' => $product, 'category' => $category, 'skus' => $skus,
            'current' => $currentItem, 'skuForm' => $skuFormConf,
            'skuConf' => $skuConf, 'sortedKeys' => $sortedKeys]);
    }
}
