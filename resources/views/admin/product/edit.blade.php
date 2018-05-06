@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">修改品类</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.product.update', ['id' => $product['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">商品名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $product['name'] }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('spu') ? ' has-error' : '' }}">
                                <label for="spu_conf" class="col-md-4 control-label">SPU</label>

                                <div class="col-md-6">
                                    <textarea id="spu" class="form-control" name="spu_conf" rows="10">{{ $product['spu'] }}</textarea>

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
                                    <textarea id="description" class="form-control" name="description" rows="10">{{ $product['description'] }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        保存
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
