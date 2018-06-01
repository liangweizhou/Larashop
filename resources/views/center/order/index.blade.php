@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">订单列表</div>

                    <div class="panel-body">
                        @foreach ($orders as $order)
                            <table class="table table-striped">
                                <caption>订单号：{{ $order['id'] }}，总额：{{ $order['total_amount'] }}</caption>
                                <thead>
                                <tr>
                                    <th scope="col">封面图片</th>
                                    <th scope="col">名称</th>
                                    <th scope="col">单价</th>
                                    <th scope="col">数量</th>
                                    <th scope="col">小计</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (json_decode($order['items'], true) as $item)
                                    <tr>
                                        <th scope="col"><img src="{{ $item['cover_img'] }}" width="50" height="50"></th>
                                        <th scope="col">{{ $item['name'] }}</th>
                                        <th scope="col">{{ $item['price'] }}</th>
                                        <th scope="col">{{ $item['amount'] }}</th>
                                        <th scope="col">{{ $item['price'] * $item['amount']}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
