<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Requests\Admin\StoreCoupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    protected $model ;
    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }

    /**
     *  显示购物券列表
     *
     * @return $this
     */
    public function index()
    {
       $coupons = $this->model
                       ->select('name', 'type', 'value', 'total_amount', 'remaining_amount', 'category_id', 'user_level', 'expire_at')
                       ->get();
       return view('admin.coupon.index')->with(['coupons' => $coupons]);
    }


    public function show($id)
    {
      $id = intval($id);
      $coupon = $this->model
                     ->select('id', 'name', 'type', 'value', 'total_amount', 'remaining_amount', 'category_id', 'user_level', 'expire_at', 'created_at', 'updated_at')
                     ->where([
                         ['id', $id]
                     ])
                      ->find($id);
        return view('admin.coupon.show')->with(['coupon' => $coupon]);
    }

    /**
     * 创建优惠券的表单的view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(StoreCoupon $request)
    {
      $coupon = $request->only([ 'name', 'type', 'value', 'total_amount', 'remaining_amount', 'category_id', 'user_level', 'expire_at']);
      $this->model
           ->create($coupon);
        return redirect(route('admin.coupon.index'));
    }


    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }




}
