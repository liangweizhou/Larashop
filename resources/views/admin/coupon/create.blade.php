@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">添加优惠券</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.coupon.store') }}">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">券名</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--券的类型--}}
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">券类型</label>

                                <div class="col-md-6">
                                  <span>现金券</span>  <input id="cash" type="checkbox" class="" name="cash" value="cash" >
                                  <span>打折券</span> <input id="discount" type="checkbox" class="" name="discount" value="discount" >

                                    {{--@if ($errors->has('name'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>

                            {{--购物券的值--}}
                            <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                <label for="value" class="col-md-4 control-label">券值</label>

                                <div class="col-md-6">
                                    <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" required autofocus>

                                    @if ($errors->has('value'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--购物券的总量--}}
                            <div class="form-group{{ $errors->has('total_amount') ? ' has-error' : '' }}">
                                <label for="total_amount" class="col-md-4 control-label">总量</label>

                                <div class="col-md-6">
                                    <input id="total_amount" type="text" class="form-control" name="total_amount" value="{{ old('total_amount') }}" required autofocus>

                                    @if ($errors->has('total_amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('total_amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--购物券的剩余量--}}
                            <div class="form-group{{ $errors->has('remaining_amount') ? ' has-error' : '' }}">
                                <label for="remaining_amount" class="col-md-4 control-label">剩余的量</label>

                                <div class="col-md-6">
                                    <input id="remaining_amount" type="text" class="form-control" name="remaining_amount" value="{{ old('remaining_amount') }}" required autofocus>

                                    @if ($errors->has('remaining_amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('remaining_amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                    {{--购物券所属的类别--}}
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-4 control-label">类型</label>

                                <div class="col-md-6">
                                    <input id="category_id" type="text" class="form-control" name="category_id" value="{{ old('category_id') }}" required autofocus>

                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--满足领取券的等级--}}
                            <div class="form-group{{ $errors->has('user_level') ? ' has-error' : '' }}">
                                <label for="value" class="col-md-4 control-label">满足等级</label>

                                <div class="col-md-6">
                                    <input id="user_level" type="text" class="form-control" name=user_level" value="{{ old('user_level') }}" required autofocus>

                                    @if ($errors->has('user_level'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--购物券的过期时间--}}
                            <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                <label for="value" class="col-md-4 control-label">券值</label>

                                <div class="col-md-6">
                                    <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" required autofocus>

                                    @if ($errors->has('value'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
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