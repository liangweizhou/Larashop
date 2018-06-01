<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Http\Requests\Admin\StoreProduct;
use App\Http\Requests\Admin\UpdateProduct;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * 构造函数，注入Product模型
     *
     * ProductController constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * 商品列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->model
            ->select('id', 'name', 'category_id', 'created_at', 'updated_at')
            ->get();

        return view('admin.product.index')->with(['products' => $products]);
    }

    /**
     * 商品详情
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $id = intval($id);
        $product = $this->model
            ->select('id', 'name', 'category_id', 'spu', 'description', 'created_at', 'updated_at')
            ->find($id);
        $category = $product->category()
            ->select('id', 'name')
            ->first();

        return view('admin.product.show')->with(['product' => $product, 'category' => $category]);
    }

    /**
     * 显示创建商品表单
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // 获取所有品类
        $categories = Category::select('id', 'name')
            ->where([
                ['id', '>', 0]
            ])
            ->get();
        return view('admin.product.create')->with(['categories' => $categories]);
    }

    /**
     * 创建商品
     *
     * @param StoreProduct $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProduct $request)
    {
        $data = $request->only(['name', 'category_id', 'spu', 'description']);
        $data['category_id'] = intval($data['category_id']);

        // 获取品类信息
        $category = Category::select('id', 'parent_ids')->find($data['category_id']);

        $data['category_ids'] = json_encode(array_merge([$data['category_id']], json_decode($category['parent_ids'])));
        $data['spu'] = json_encode(json_decode($data['spu'], true));

        $this->model->create($data);

        return redirect(route('admin.product.index'));
    }

    /**
     * 显示编辑商品信息表单
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->model
            ->select('id', 'name', 'category_id', 'spu', 'description')
            ->find($id);
        // 获取品类信息
        $category = Category::select('id', 'name')
            ->find($product['category_id']);

        return view('admin.product.edit')->with(['product' => $product, 'category' => $category]);
    }

    /**
     * 更新商品信息
     *
     * @param UpdateProduct $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateProduct $request, $id)
    {
        $id = intval($id);
        $data = $request->only(['name','category_id',  'spu', 'description']);
//        $data['spu'] = json_encode(json_decode($data['spu'], true));

        $this->model
            ->find($id)
            ->update($data);

        return redirect(route('admin.product.index'));
    }

    /**
     * 删除商品
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

        return redirect(route('admin.product.index'));
    }
}
