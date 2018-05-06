<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        // 获取当前登录用户的订单列表
        $orders = $this->model
            ->select('items', 'total_amount')
            ->where('user_id', Auth::id())
            ->get();
        //return response()->json($orders);
        return view('center.order.index')->with(['orders' => $orders]);
    }

    // 获取订单详情
    public function show($id)
    {
        $details = $this->model
                        ->select('user_id', 'total_amount', 'discount', 'freight', 'payment', 'items', 'address', 'invoice')
                        ->where([
                         ['id', $id],
                         ['user_id',  Auth::id()]
                       ])
                        ->first();
        //return response()->json($detail);
        return view('center.order.detail')->with(['details' => $details]);
    }

        //  生成订单，在购物车中点击下单后，会有一个生成订单的页面，里面包含了需要选择的订单信息和对应商品的items信息等
       // 可以选择的信息有  收货地址， 购物券（只能选择此品类相关的优惠券）
        public function create()
    {


    }
}
