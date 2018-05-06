@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">序号</th>
                        <th scope="col">公司名</th>
                        <th scope="col">税号</th>
                        <th scope="col">地址</th>
                        <th scope="col">电话</th>
                        <th scope="col">开户银行</th>
                        <th scope="col">开户账号</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count($invoice); $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $invoice[$i]['org_name'] }}</td>
                            <td>{{ $invoice[$i]['tax_id'] }}</td>
                            <td>{{ $invoice[$i]['org_addr'] }}</td>
                            <td>{{ $invoice[$i]['org_tel'] }}</td>
                            <td>{{ $invoice[$i]['org_bank'] }}</td>
                            <td>{{ $invoice[$i]['org_account'] }}</td>
                            <td>
                                <a href="{{route('invoice.show', ['id' => $invoice[$i]['id']])}}">详情</a>
                                <a href="{{route('invoice.edit', ['id' => $invoice[$i]['id']])}}">修改</a>
                            </td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
