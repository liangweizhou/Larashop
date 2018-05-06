@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">商品详情</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                <label for="category_name" class="col-md-4 control-label">品类</label>

                                <div class="col-md-6">
                                    <input id="category_name" type="text" class="form-control-plaintext" value="{{ $category['name'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">商品名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $product['name'] }}" readonly>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('spu') ? ' has-error' : '' }}">
                                <label for="spu" class="col-md-4 control-label">SPU</label>

                                <div class="col-md-6">
                                    <textarea id="spu" class="form-control" name="spu" rows="10" readonly>{{ $product['spu'] }}</textarea>

                                    @if ($errors->has('spu'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('spu') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">详情</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" rows="10" readonly>{{ $product['description'] }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
