<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    /**
     * @var Item
     */
    protected $model;

    /**
     * 构造函数，注入Item模型
     *
     * @param Item $model
     */
    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    /**
     * 显示搜索页，品类下单品列表页
     *
     * @param $catid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($catid)
    {
        $catid = intval($catid);
        // 获取category信息
        $category = Category::select('id', 'parent_id', 'parent_ids', 'name', 'level', 'spu_conf', 'sku_conf')
            ->find($catid);

        // 获取$catid分类下的单品
        $items = $this->model
            ->select('id', 'name', 'cover_img', 'price', 'total_amount', 'remaining_amount')
            ->whereRaw('JSON_CONTAINS(category_ids,  \'[' . $catid. ']\')')
            ->paginate(15)
            ->toArray();

        return view('item.search')->with(['category' => $category, 'items' => $items]);
    }

    /**
     * 单品搜索
     *
     * 可以使用$query->toSql()打印Query Builder生成的SQL语句
     *
     * @param Request $request
     * @param $catid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, $catid)
    {
        $catid = intval($catid);
        // 获取category信息
        $category = Category::select('id', 'parent_id', 'parent_ids', 'name', 'level', 'spu_conf', 'sku_conf')
            ->find($catid);

        $confs = [
            'spu' => json_decode($category['spu_conf'], true),
            'sku' => json_decode($category['sku_conf'], true)
        ];

        $query = $this->model
            ->select('id', 'name', 'cover_img', 'price', 'total_amount', 'remaining_amount');
        // 保存搜索条件
        $search = [];

        foreach ($confs as $colName => $conf)
        {
            foreach ($conf as $confKey => $confDetail)
            {
                // 表单字段名称，如conf.spu.brand
                $formFieldName = 'conf.' . $colName . '.' . $confKey;

                if ($formFieldVal = $request->input($formFieldName, null))
                {
                    if ($confDetail['type'] == 'enum' and is_array($request->input($formFieldName)) and count($request->input($formFieldName)) > 0)
                    {
                        $search[$colName . '.' . $confKey] = $formFieldVal;
                        // 对于enum类型，使用生成子句，该子句内部为OR连接，并与其他子句AND连接
                        $query = $query->where(function ($query) use($colName, $formFieldVal, $confKey) {
                            foreach ($formFieldVal as $val) {
                                $stmt = 'JSON_CONTAINS(' . $colName . ',  \'"' . $val . '"\', \'$.'. $confKey. '\')';
                                $query = $query->orWhereRaw($stmt);
                            }
                        });
                    } else if ($confDetail['type'] == 'intrange') {
                        if (array_key_exists('min', $formFieldVal) and ($formFieldVal['min']) and array_key_exists('min', $confDetail))
                        {
                            $min = intval($formFieldVal['min']) >= intval($confDetail['min']) ? intval($formFieldVal['min']) : intval($confDetail['min']);
                            $query = $query->whereRaw($colName . '->\'$.' . $confKey . '\'>=' . $min);
                            $search[$colName . '.' . $confKey . '.min'] = $min;
                        }

                        if (array_key_exists('max', $formFieldVal) and ($formFieldVal['max']) and array_key_exists('max', $confDetail))
                        {
                            $max = intval($formFieldVal['max']) <= intval($confDetail['max']) ? intval($formFieldVal['max']) : intval($confDetail['max']);
                            $query = $query->whereRaw($colName . '->\'$.' . $confKey . '\'<=' . $max);
                            $search[$colName . '.' . $confKey . '.max'] = $max;
                        }
                    } else if (($confDetail['type'] == 'floatrange')) {
                        if (array_key_exists('min', $formFieldVal) and ($formFieldVal['min']) and array_key_exists('min', $confDetail))
                        {
                            $min = floatval($formFieldVal['min']) >= floatval($confDetail['min']) ? floatval($formFieldVal['min']) : floatval($confDetail['min']);
                            $query = $query->whereRaw($colName . '->\'$.' . $confKey . '\'' . '>=' . $min);
                            $search[$colName . '.' . $confKey . '.min'] = $min;
                        }

                        if (array_key_exists('max', $formFieldVal) and ($formFieldVal['max']) and array_key_exists('max', $confDetail))
                        {
                            $max = floatval($formFieldVal['max']) <= floatval($confDetail['max']) ? floatval($formFieldVal['max']) : floatval($confDetail['max']);
                            $query = $query->whereRaw($colName . '->\'$.' . $confKey . '\'' . '<=' . $max);
                            $search[$colName . '.' . $confKey . '.max'] = $max;
                        }
                    }
                }
            }
        }

        $items = $query->paginate(15)
            ->toArray();

        return view('item.search')->with(['category' => $category, 'items' => $items, 'search' => $search]);
    }
}
