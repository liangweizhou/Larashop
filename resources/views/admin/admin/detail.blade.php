@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">管理员详情</div>

                    <div class="panel-body">
                        <span>姓名：{{ $admin['name'] }}</span><br/>
                        <span>邮箱：{{ $admin['email'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
