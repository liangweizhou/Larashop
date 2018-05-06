@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">品类</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">序号</th>
                                <th scope="col">层级</th>
                                <th scope="col">名称</th>
                                <th scope="col">创建时间</th>
                                <th scope="col">修改时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < count($categories); $i++)
                                <tr>
                                    <th scope="col">{{ $i }}</th>
                                    <th scope="col">{{ $categories[$i]['level'] }}</th>
                                    <th scope="col">{{ $categories[$i]['name'] }}</th>
                                    <th scope="col">{{ $categories[$i]['created_at'] }}</th>
                                    <th scope="col">{{ $categories[$i]['updated_at'] }}</th>
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
