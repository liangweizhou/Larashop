@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">序号</th>
                        <th scope="col">单品信息</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count($favourites); $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $favourites[$i]['items.name'] }}</td>
                            <td>{{ $favourites[$i]['items.spu'] }}</td>
                            <td>{{ $favourites[$i]['items.sku'] }}</td>
                            <td>{{ $favourites[$i]['items.price'] }}</td>
                            <td><a href="{{ $favourites[$i]['items.cover_image'] }}">图片</a></td>

                            <td>
                                <a href="{{route('favourite.index', ['id' => $favourites[$i]['id']])}}">移出收藏</a>
                            </td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
