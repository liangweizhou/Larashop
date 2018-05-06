@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">添加单品</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.item.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                <label for="product_id" class="col-md-4 control-label">归属商品</label>

                                <div class="col-md-6">
                                    <select id="product_id" name="product_id" class="custom-select" required autofocus>
                                        <option selected>请选择</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('product_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                    <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}">

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
                                    <input id="total_amount" type="number" class="form-control" name="total_amount" value="{{ old('total_amount') }}">

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
                                    <input id="remaining_amount" type="number" class="form-control" name="remaining_amount" value="{{ old('remaining_amount') }}">

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
                                    <input id="cover_img" type="text" class="form-control" name="cover_img" value="{{ old('cover_img') }}">

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
                                    <input id="imgs" type="text" class="form-control" name="imgs" value="{{ old('imgs') }}">

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
                                    <textarea id="spu" class="form-control" name="spu" rows="10"></textarea>

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
                                    <textarea id="sku" class="form-control" name="sku" rows="10"></textarea>

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
                                        创建
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
