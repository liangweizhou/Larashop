@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">序号</th>
                        <th scope="col">姓名</th>
                        <th scope="col">邮箱</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count($admins); $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $admins[$i]['name'] }}</td>
                            <td>{{ $admins[$i]['email'] }}</td>
                            <td>
                                <a href="{{route('admin.show', ['id' => $admins[$i]['id']])}}">详情</a>
                                <a href="{{route('admin.edit', ['id' => $admins[$i]['id']])}}">修改</a>
                            </td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
