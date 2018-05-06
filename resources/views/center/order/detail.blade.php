@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <span>：{{ $orders['items'] }}</span><br/>
                <span>：{{ $orders['invoice'] }}</span><br/>
                <span>：{{ $orders['address'] }}</span><br/>
                <span>：{{ $orders['payment'] }}</span><br/>
                <span>：{{ $orders['total_account'] }}</span><br/>
                <span>：{{ $orders['discount'] }}</span><br/>
                <span>：{{ $orders['freight'] }}</span><br/>
            </div>
        </div>
    </div>
@endsection