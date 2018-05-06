@extends('layouts.app')

@section('content')
    @extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @for($i = 0; $i < count($orders); $i++)
                    <p>{{ $i + 1 }}</p>
                    <p>{{ $orders[$i]['items'] }}</p>
                    <p>{{ $orders[$i]['total_account'] }}</p>
                    <p>{{ $orders[$i]['discount'] }}</p>
                    <p>{{ $orders[$i]['freight'] }}</p>
                    <p><a href="{{route('order.index', ['id' => $orders[$i]['id']])}}">详情</a></p>
                    <p></p>
                    @endif



            </div>
        </div>
    </div>
@endsection

@endsection