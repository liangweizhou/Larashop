<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Product;
use App\Http\Requests\Admin\StoreItem;
use App\Http\Requests\Admin\UpdateItem;

class ItemController extends Controller
{
    /**
     * @var Item
     */
    protected $model;

    /**
     * 构造函数，注入Product模型
     *
     * ProductController constructor.
     * @param Item $model
     */
    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    /**
     * 单品列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->model
            ->select('id', 'name', 'product_id', 'category_id', 'price',
                'total_amount', 'remaining_amount', 'cover_img', 'created_at', 'updated_at')
            ->get();

        return view('admin.item.index')->with(['items' => $items]);
    }

    /**
     * 单品详情
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $id = intval($id);
        $item = $this->model
            ->select('id', 'name', 'product_id', 'category_id', 'spu', 'sku', 'price',
                'total_amount', 'remaining_amount', 'cover_img')
            ->find($id);

        $product = $item->product()
            ->select('id', 'name')
            ->first();

        return view('admin.item.show')->with(['item' => $item, 'product' => $product]);
    }

    /**
     * 显示创建单品表单
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // 获取所有商品
        $products = Product::select('id', 'name')->get();

        return view('admin.item.create')->with(['products' => $products]);
    }

    /**
     * 创建单品
     *
     * @param StoreItem $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreItem $request)
    {
        $data = $request->only(['name', 'product_id', 'spu', 'sku', 'price', 'total_amount',
            'remaining_amount', 'cover_img', 'imgs']);

        // 获取商品信息
        $product = Product::select('id', 'category_id', 'category_ids')
            ->find($data['product_id']);

        $data['category_id'] = $product['category_id'];
        $data['category_ids'] = $product['category_ids'];
        $data['spu'] = json_encode(json_decode($data['spu'], true));
        $data['sku'] = json_encode(json_decode($data['sku'], true));
        $data['imgs'] = json_encode($data['imgs']);

        $this->model->create($data);

        return redirect(route('admin.item.index'));
    }

    /**
     * 显示编辑单品信息表单
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id = intval($id);
        $item = $this->model
            ->select('id', 'name', 'product_id', 'spu', 'sku', 'price', 'total_amount',
                'remaining_amount', 'cover_img', 'imgs')
            ->find($id);

        $product = $item->product()
            ->select('id', 'name')
            ->first();

        return view('admin.item.edit')->with(['item' => $item, 'product' => $product]);
    }

    /**
     * 更新单品信息
     *
     * @param UpdateItem $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateItem $request, $id)
    {
        $id = intval($id);
        $data = $request->only(['name', 'spu', 'sku', 'price', 'total_amount', 'remaining_amount', 'cover_img', 'imgs']);
        $data['spu'] = json_encode(json_decode($data['spu'], true));
        $data['sku'] = json_encode(json_decode($data['sku'], true));

        $this->model
            ->find($id)
            ->update($data);

        return redirect(route('admin.item.show', ['id' => $id]));
    }

    /**
     * 删除单品
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $id = intval($id);

        $this->model
            ->find($id)
            ->delete();

        return redirect(route('admin.item.index'));
    }
}
