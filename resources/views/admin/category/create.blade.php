@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">添加品类</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.category.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                <label for="parent_id" class="col-md-4 control-label">上级品类</label>

                                <div class="col-md-6">
                                    <select id="parent_id" name="parent_id" class="custom-select">
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('parent_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">品类名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('spu_conf') ? ' has-error' : '' }}">
                                <label for="spu_conf" class="col-md-4 control-label">SPU配置</label>

                                <div class="col-md-6">
                                    <textarea id="spu_conf" class="form-control" name="spu_conf" rows="10"></textarea>

                                    @if ($errors->has('spu_conf'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('spu_conf') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sku_conf') ? ' has-error' : '' }}">
                                <label for="sku_conf" class="col-md-4 control-label">SKU配置</label>

                                <div class="col-md-6">
                                    <textarea id="sku_conf" class="form-control" name="sku_conf" rows="10"></textarea>

                                    @if ($errors->has('sku_conf'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sku_conf') }}</strong>
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
