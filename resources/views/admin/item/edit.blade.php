@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">修改单品信息</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.item.update', ['id' => $item['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="product_name" class="col-md-4 control-label">归属商品</label>

                                <div class="col-md-6">
                                    <input id="product_name" type="text" class="form-control" value="{{ $product['name'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $item['name'] }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">单价</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control" name="price" value="{{ $item['price'] }}">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('total_amount') ? ' has-error' : '' }}">
                                <label for="total_amount" class="col-md-4 control-label">总库存</label>

                                <div class="col-md-6">
                                    <input id="total_amount" type="number" class="form-control" name="total_amount" value="{{ $item['total_amount'] }}">

                                    @if ($errors->has('total_amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('total_amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('remaining_amount') ? ' has-error' : '' }}">
                                <label for="remaining_amount" class="col-md-4 control-label">剩余库存</label>

                                <div class="col-md-6">
                                    <input id="remaining_amount" type="number" class="form-control" name="remaining_amount" value="{{ $item['remaining_amount'] }}">

                                    @if ($errors->has('remaining_amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('remaining_amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cover_img') ? ' has-error' : '' }}">
                                <label for="cover_img" class="col-md-4 control-label">封面图片</label>

                                <div class="col-md-6">
                                    <input id="cover_img" type="text" class="form-control" name="cover_img" value="{{ $item['cover_img'] }}">

                                    @if ($errors->has('cover_img'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cover_img') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('imgs') ? ' has-error' : '' }}">
                                <label for="imgs" class="col-md-4 control-label">详情图片</label>

                                <div class="col-md-6">
                                    <input id="imgs" type="text" class="form-control" name="imgs" value="{{ $item['imgs'] }}">

                                    @if ($errors->has('imgs'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('imgs') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('spu') ? ' has-error' : '' }}">
                                <label for="spu" class="col-md-4 control-label">SPU</label>

                                <div class="col-md-6">
                                    <textarea id="spu" class="form-control" name="spu" rows="10">{{ $item['spu'] }}</textarea>

                                    @if ($errors->has('spu'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('spu') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                                <label for="sku" class="col-md-4 control-label">SKU</label>

                                <div class="col-md-6">
                                    <textarea id="sku" class="form-control" name="sku" rows="10">{{ $item['sku'] }}</textarea>

                                    @if ($errors->has('spu'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        修改
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
