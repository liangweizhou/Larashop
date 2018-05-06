<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    protected $model;
    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }


    // 显示个人的优惠券列表
    public function index()
    {
    $coupons = $this->model
                    ->join('categories','coupons.category_id', '=', 'categories.id')
                    ->select('type', 'value', 'user_level', 'expire_at')
                    ->where('id',Auth::id())
                    ->get();
        return view('coupon.index')->with(['coupons' => $coupons]);
    }

    public function destroy()
    {

    }
}
