<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    /**
     *  显示购物车列表
     *
     * @return $this
     */
    public function index()
    {
        $carts = $this->model
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->join('items', 'carts.items_id', '=', 'items.id')
            ->select('items.name', 'items.spu', 'items.sku', 'items.price', 'items.cover_image', 'amount')
            ->where('user_id', Auth::id())
            ->get();

        // 直接获取登录用户对应的id对比后可以返回查询值 index($id)
        //        $carts = $this->model
//            ->join('items', 'carts.items_id', '=', 'items.id')
//            ->select('items.name', 'items.spu', 'items.sku', 'items.price', 'items.cover_image', 'amount')
//            ->where('id', Auth::id())
//            ->get();

        return view('center.cart.index')->with(['carts' => $carts]);
    }

    // 添加购物车, 获取对应的item_id存入购物车表, 从商品详情页中会获取单品的信息
    public function store(Request $request)
    {
        $data = $request->only(['user_id', 'item_id', 'amount']);
        $this->model->create($data);
        return redirect(route('cart.index'));;
    }

    // 修改购物车的信息 ，这里只能更改数量
    public function update(Request $request, $id)
    {
        $data = $request->only(['count']);
        $this->model
            ->where([
                ['id', $id]
            ])
            ->update($data);
        return redirect(route('cart.index', ['id' => $id]));
    }

    // 删除购物车
    public function destroy($id)
    {
        $this->model
            ->destroy($id);
        return redirect(route('cart.index'));
    }
}
