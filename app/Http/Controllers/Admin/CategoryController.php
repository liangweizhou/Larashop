<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\Admin\StoreCategory;
use App\Http\Requests\Admin\UpdateCategory;

class CategoryController extends Controller
{
    /**
     * Category模型
     *
     * @var Category
     */
    protected $model;

    /**
     * 构造函数，注入Category模型
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * 品类列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->model
            ->select('id', 'parent_id', 'name', 'level', 'created_at', 'updated_at')
            ->where([
                ['level', '>', 0]
            ])
            ->get();

        return view('admin.category.index')->with(['categories' => $categories]);
    }

    /**
     * 品类详情
     *
     * @param $id int 品类ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category = $this->model
            ->select('id', 'parent_id', 'name', 'level', 'spu_conf', 'sku_conf', 'created_at', 'updated_at')
            ->find($id);

        // 获取父品类名称
        $parent = $category->parent()
            ->select('id', 'parent_id', 'name', 'level')
            ->first();

        return view('admin.category.show')->with(['category' => $category, 'parent' => $parent]);
    }

    /**
     * 显示创建品类表单
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // 获取所有品类，用于选取父品类
        $categories = $this->model
            ->select('id', 'parent_id', 'name')
            ->get();
        return view('admin.category.create')->with(['categories' => $categories]);
    }

    /**
     * 创建品类
     *
     * @param StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCategory $request)
    {
        $data = $request->only(['parent_id', 'name', 'spu_conf', 'sku_conf']);

        $parentId = intval($data['parent_id']);
        $data['parent_ids'] = [];
        while ($parentId > 0) {
            $parent = $this->model
                ->select('id', 'parent_id')
                ->find($parentId);
            $data['parent_ids'][] = $parentId;
            $parentId = $parent['parent_id'];
        }

        $data['level'] = count($data['parent_ids']) + 1;
        // 将表单json字符串转换成json对象
        $data['parent_ids'] = json_encode($data['parent_ids']);
        // 表单传递过来的是字符串，需要首先转换成php数组，然后再encode后存储到数据库json类型字段中去
        $data['spu_conf'] = json_encode(json_decode($data['spu_conf'], true));
        $data['sku_conf'] = json_encode(json_decode($data['sku_conf'], true));

        $this->model->create($data);

        return redirect(route('admin.category.index'));
    }

    /**
     * 显示编辑品类表单
     *
     * @param $id int 品类ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->model
            ->select('id', 'parent_id', 'name', 'level', 'spu_conf', 'sku_conf')
            ->find($id);

        // 获取父品类名称
        $parent = $category->parent()
            ->select('id', 'parent_id', 'name', 'level')
            ->first();

        return view('admin.category.edit')->with(['category' => $category, 'parent' => $parent]);
    }

    /**
     * 更新品类
     *
     * @param UpdateCategory $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCategory $request, $id)
    {
        $data = $data = $request->only(['name', 'spu_conf', 'sku_conf']);
        $data['spu_conf'] = json_encode(json_decode($data['spu_conf'], true));
        $data['sku_conf'] = json_encode(json_decode($data['sku_conf'], true));
        $this->model
            ->find($id)
            ->update($data);

        return redirect(route('admin.category.show', ['id' => $id]));
    }

    /**
     * 删除品类
     *
     * @param $id int 品类ID
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->model
            ->find($id)
            ->delete();

        return redirect(route('admin.category.index'));
    }
}
