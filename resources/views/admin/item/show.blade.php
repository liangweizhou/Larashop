@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">单品详情</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="product_name" class="col-md-4 control-label">归属商品</label>
                                <div class="col-md-6">
                                    <input id="product_name" type="text" class="form-control" value="{{ $product['name'] }}" readonly>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">名称</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" value="{{ $item['name'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_amount" class="col-md-4 control-label">总库存</label>
                                <div class="col-md-6">
                                    <input id="total_amount" type="text" class="form-control" value="{{ $item['total_amount'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="remaining_amount" class="col-md-4 control-label">剩余库存</label>
                                <div class="col-md-6">
                                    <input id="remaining_amount" type="text" class="form-control" value="{{ $item['remaining_amount'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">封面图片</label>
                                <div class="col-md-6">
                                    <img src="{{ $item['cover_img'] }}" width="80" height="80">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="spu" class="col-md-4 control-label">SPU</label>
                                <div class="col-md-6">
                                    <textarea id="spu" class="form-control" rows="10" readonly>{{ $item['spu'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sku" class="col-md-4 control-label">SKU</label>
                                <div class="col-md-6">
                                    <textarea id="sku" class="form-control" rows="10" readonly>{{ $item['sku'] }}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
