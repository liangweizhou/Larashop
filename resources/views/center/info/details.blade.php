@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">用户信息详情</div>

                    <div class="panel-body">
                        <span>姓名：{{ $info['name'] }}</span><br/>
                        <span>性别：{{ $info['sex'] }}</span><br/>
                        <span>生日：{{ $info['birth_date'] }}</span><br/>
                        <span>邮箱：{{ $info['email'] }}</span><br/>
                        <span>电话：{{ $info['mobile'] }}</span><br/>
                        <span>头像：<a href="{{ $info['avatar'] }}"></a></span><br/>
                        <span>余额：{{ $info['balance'] }}</span><br/>
                        <span>积分：{{ $info['points'] }}</span><br/>
                        <span>等级：{{ $info['level'] }}</span><br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
