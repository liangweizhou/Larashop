@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">购物车</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('order.create') }}">
                            {{ csrf_field() }}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">选择</th>
                                    <th scope="col">封面图片</th>
                                    <th scope="col">名称</th>
                                    <th scope="col">单价</th>
                                    <th scope="col">数量</th>
                                    <th scope="col">小计</th>
                                    {{--<th scope="col">操作</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <th scope="col">
                                            <input name="item_ids[]" type="checkbox" value="{{ $item['item_id'] }}">
                                        </th>
                                        <th scope="col"><img src="{{ $item['cover_img'] }}" width="50" height="50"></th>
                                        <th scope="col">{{ $item['name'] }}</th>
                                        <th scope="col">{{ $item['price'] }}</th>
                                        <th scope="col">{{ $item['amount'] }}</th>
                                        <th scope="col">{{ $item['price'] * $item['amount']}}</th>
                                        {{--<th scope="col"><a href="{{route('cart.destroy', ['id' => $item['item_id']])}}">移出</a></th>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">去结算</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
