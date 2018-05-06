@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">购物券详情</div>

                    <div class="panel-body">
                        <span>姓名：{{ $coupon['name'] }}</span><br/>
                        <span>类型：{{ $coupon['type'] }}</span><br/>
                        <span>价值：{{ $coupon['value'] }}</span><br/>
                        <span>总量：{{ $coupon['total_amount'] }}</span><br/>
                        <span>库存：{{ $coupon['remaining_amount'] }}</span><br/>
                        <span>所属商品：{{ $coupon['category_id'] }}</span><br/>
                        <span>限制等级：{{ $coupon['user_level'] }}</span><br/>
                        <span>过期时间：{{ $coupon['expire_at'] }}</span><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
