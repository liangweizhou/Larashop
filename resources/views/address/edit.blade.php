@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">修改地址</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('address.update', ['id' => $address['id']]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group{{ $errors->has('consignee_name') ? ' has-error' : '' }}">
                                <label for="consignee_name" class="col-md-4 control-label">收件人姓名</label>

                                <div class="col-md-6">
                                    <input id="consignee_name" value={{ $address['consignee_name'] }} type="text" class="form-control" name="consignee_name" value="{{ old('consignee_name') }}" required autofocus>

                                    @if ($errors->has('consignee_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consignee_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('consignee_mobile') ? ' has-error' : '' }}">
                                <label for="consignee_mobile" class="col-md-4 control-label">收件人手机</label>

                                <div class="col-md-6">
                                    <input id="consignee_mobile" value={{ $address['consignee_mobile'] }} type="tel" class="form-control" name="consignee_mobile" value="{{ old('consignee_mobile') }}" required>

                                    @if ($errors->has('consignee_mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consignee_mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                <label for="province" class="col-md-4 control-label">省</label>

                                <div class="col-md-6">
                                    <input id="province" value={{ $address['province'] }} type="text" class="form-control" name="province" value="{{ old('provincee') }}" required>

                                    @if ($errors->has('province'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">市</label>

                                <div class="col-md-6">
                                    <input id="city" value={{ $address['city'] }} type="text" class="form-control" name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                <label for="district" class="col-md-4 control-label">区县</label>

                                <div class="col-md-6">
                                    <input id="district" value={{ $address['district'] }} type="text" class="form-control" name="district" value="{{ old('district') }}" required>

                                    @if ($errors->has('district'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                <label for="detail" class="col-md-4 control-label">详细地址</label>

                                <div class="col-md-6">
                                    <input id="detail" value={{ $address['detail'] }} type="text" class="form-control" name="detail" value="{{ old('detail') }}" required>

                                    @if ($errors->has('detail'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                                <label for="tag" class="col-md-4 control-label">标签</label>

                                <div class="col-md-6">
                                    <input id="tag" value={{ $address['tag'] }} type="text" class="form-control" name="tag" value="{{ old('tag') }}" required>

                                    @if ($errors->has('tag'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        新建地址
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
