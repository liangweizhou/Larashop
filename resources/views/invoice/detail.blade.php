@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发票详情</div>

                    <div class="panel-body">
                        <span>：{{ $invoice['org_name'] }}</span><br/>
                        <span>：{{ $invoice['tax_id'] }}</span><br/>
                        <span>：{{ $invoice['org_addr'] }}</span><br/>
                        <span>：{{ $invoice['org_tel'] }}</span><br/>
                        <span>：{{ $invoice['org_bank'] }}</span><br/>
                        <span>：{{ $invoice['org_account'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection