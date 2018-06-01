@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">填写并核对订单信息</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('order.store') }}">
                            {{ csrf_field() }}

                            <table class="table table-striped">
                                <caption>商品列表</caption>
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
                                @foreach ($items as $item)
                                    <tr>
                                        <input name="item_ids[]" type="hidden" value="{{ $item['item_id'] }}">
                                        <th scope="col"><img src="{{ $item['cover_img'] }}" width="50" height="50"></th>
                                        <th scope="col">{{ $item['name'] }}</th>
                                        <th scope="col">{{ $item['price'] }}</th>
                                        <th scope="col">{{ $item['amount'] }}</th>
                                        <th scope="col">{{ $item['price'] * $item['amount']}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table class="table table-striped">
                                <caption>地址列表</caption>
                                <thead>
                                <tr>
                                    <th scope="col">选择</th>
                                    <th scope="col">标签</th>
                                    <th scope="col">收件人</th>
                                    <th scope="col">收件人手机</th>
                                    <th scope="col">地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($addresses as $address)
                                    <tr>
                                        <th scope="col">
                                            <input name="address_id" type="radio" value="{{ $address['id'] }}" {{ $address['is_default'] ? 'checked' : '' }}>
                                        </th>
                                        <th scope="col">{{ $address['tag'] }}</th>
                                        <th scope="col">{{ $address['consignee_name'] }}</th>
                                        <th scope="col">{{ $address['consignee_mobile'] }}</th>
                                        <th scope="col">{{ $address['province'] . ' ' . $address['city'] . ' ' . $address['district'] . ' ' . $address['detail'] }}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table class="table table-striped">
                                <caption>发票列表</caption>
                                <thead>
                                <tr>
                                    <th scope="col">选择</th>
                                    <th scope="col">单位名称</th>
                                    <th scope="col">税号</th>
                                    <th scope="col">单位地址</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <th scope="col">
                                            <input name="invoice_id" type="radio" value="{{ $invoice['id'] }}">
                                        </th>
                                        <th scope="col">{{ $invoice['org_name'] }}</th>
                                        <th scope="col">{{ $invoice['tax_id'] }}</th>
                                        <th scope="col">{{ $invoice['org_addr'] }}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-8">
                                    总额：{{ $totalPay }}
                                    <button type="submit" class="btn btn-primary">
                                        提交订单并余额付款
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
