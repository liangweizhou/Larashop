<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Http\Requests\StoreCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class CartController extends Controller
{
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    /**
     * 显示登录用户的购物车详情
     *
     * @return $this
     */
    public function index()
    {
        $items = $this->model
            ->join('items', 'carts.item_id', '=', 'items.id')
            ->select('carts.id', 'carts.item_id', 'items.name', 'items.price', 'carts.amount', 'items.cover_img')
            ->where([
                ['user_id', Auth::id()]
            ])
            ->get();

        // 变成以id => item形式存储
        $arr = [];
        foreach ($items as $item)
        {
            $arr[$item['id']] = $item;
        }

        return view('center.cart.index')->with(['items' => $arr]);
    }

    /**
     *  加入购物车
     *
     * @param StoreCart $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCart $request)
    {
        $data = $request->only(['item_id', 'amount']);
        $data['item_id'] = intval($data['item_id']);
        $data['user_id'] = Auth::id();
        $data['amount'] = intval($data['amount']) > 0? intval($data['amount']) : 1;

        // 尝试创建一条新的购物车记录，如果唯一键（user_id-item_id）重复，则更新该item的amount
        try {
            $this->model->create($data);
        } catch (QueryException $e) {
            // 唯一键重复
            if ($e->getCode() == 23000) {
                $this->model
                    ->where([
                        ['user_id', $data['user_id']],
                        ['item_id', $data['item_id']]
                    ])
                    ->increment('amount', $data['amount']);
            }
        }

        return redirect(route('cart.index'));
    }

//    public function destroy(){
//
//    }
}
