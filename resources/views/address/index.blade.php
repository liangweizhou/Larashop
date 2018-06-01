@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">序号</th>
                        <th scope="col">标签</th>
                        <th scope="col">收货人姓名</th>
                        <th scope="col">收货人电话</th>
                        <th scope="col">省</th>
                        <th scope="col">市</th>
                        <th scope="col">区</th>
                        <th scope="col">操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count($addresses); $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $addresses[$i]['tag'] }}</td>
                            <td>{{ $addresses[$i]['consignee_name'] }}</td>
                            <td>{{ $addresses[$i]['consign_mobile'] }}</td>
                            <td>{{ $addresses[$i]['province'] }}</td>
                            <td>{{ $addresses[$i]['city'] }}</td>
                            <td>{{ $addresses[$i]['district'] }}</td>

                            <td>
                                <a href="{{route('address.show', ['id' => $addresses[$i]['id']])}}">详情</a>
                                <a href="{{route('address.edit', ['id' => $addresses[$i]['id']])}}">修改</a>
                            </td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection