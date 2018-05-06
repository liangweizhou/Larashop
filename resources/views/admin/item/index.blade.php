@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">单品</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">序号</th>
                                <th scope="col">封面图片</th>
                                <th scope="col" style="width: 100px">名称</th>
                                <th scope="col">单价</th>
                                <th scope="col">总库存</th>
                                <th scope="col">剩余库存</th>
                                <th scope="col">创建时间</th>
                                <th scope="col">修改时间</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < count($items); $i++)
                                <tr>
                                    <th scope="col">{{ $i }}</th>
                                    <td scope="col"><img src="{{ $items[$i]['cover_img'] }}" width="50" height="50"></td>
                                    <td scope="col" style="overflow: hidden">{{ $items[$i]['name'] }}</td>
                                    <td scope="col">{{ $items[$i]['price'] }}</td>
                                    <td scope="col">{{ $items[$i]['total_amount'] }}</td>
                                    <td scope="col">{{ $items[$i]['remaining_amount'] }}</td>
                                    <td scope="col">{{ $items[$i]['created_at'] }}</td>
                                    <td scope="col">{{ $items[$i]['updated_at'] }}</td>
                                    <td scope="col">
                                      <td><a href="{{route('admin.item.show', ['id' => $items[$i]['id']])}}">详情</a></td>
                                      <td><a href="{{route('admin.item.edit', ['id' => $items[$i]['id']])}}">修改</a></td>
                                    </td>
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
