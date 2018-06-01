@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">地址详情</div>

                    <div class="panel-body">
                        <span>标签：{{ $address['tag'] }}</span><br/>
                        <span>收货人姓名：{{ $address['consignee_name'] }}</span><br/>
                        <span>收货人电话：{{ $address['consignee_mobile'] }}</span><br/>
                        <span>省：{{ $address['province'] }}</span><br/>
                        <span>市：{{ $address['city'] }}</span><br/>
                        <span>区：{{ $address['district'] }}</span><br/>
                        <span>详情：{{ $address['detail'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection