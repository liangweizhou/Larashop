@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">购物券</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">序号</th>
                                <th scope="col">券名</th>
                                <th scope="col">类型</th>
                                <th scope="col">券值</th>
                                <th scope="col">总量</th>
                                <th scope="col">剩余量</th>
                                <th scope="col">券的商品类型</th>
                                <th scope="col">用户等级</th>
                                <th scope="col">过期时间</th>
                                <th scope="col">创建时间</th>
                                <th scope="col">修改时间</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < count($coupons); $i++)
                                <tr>
                                    <th scope="col">{{ $i }}</th>
                                    <th scope="col">{{ $coupons[$i]['name'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['type'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['value'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['total_amount'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['remaining_amount'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['category_id'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['user_level'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['expire_at'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['created_at'] }}</th>
                                    <th scope="col">{{ $coupons[$i]['updated_at'] }}</th>
                                    <th scope="col"><span><a></a></span></th>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection