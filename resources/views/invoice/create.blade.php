@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">添加发票信息</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('invoice.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('org_name') ? ' has-error' : '' }}">
                                <label for="org_name" class="col-md-4 control-label">发票公司</label>

                                <div class="col-md-6">
                                    <input id="org_name" type="text" class="form-control" name="org_name" value="{{ old('org_name') }}" required autofocus>

                                    @if ($errors->has('org_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('org_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tax_id') ? ' has-error' : '' }}">
                                <label for="tax_id" class="col-md-4 control-label">税号</label>

                                <div class="col-md-6">
                                    <input id="tax_id" type="tel" class="form-control" name="tax_id" value="{{ old('tax_id') }}" required>

                                    @if ($errors->has('tax_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tax_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('org_addr') ? ' has-error' : '' }}">
                                <label for="org_addr" class="col-md-4 control-label">地址</label>

                                <div class="col-md-6">
                                    <input id="org_addr" type="text" class="form-control" name="org_addr" value="{{ old('org_addr') }}" required>

                                    @if ($errors->has('org_addr'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('org_addr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('org_tel') ? ' has-error' : '' }}">
                                <label for="org_tel" class="col-md-4 control-label">电话</label>

                                <div class="col-md-6">
                                    <input id="org_tel" type="text" class="form-control" name="org_tel" value="{{ old('org_tel') }}" required>

                                    @if ($errors->has('org_tel'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('org_tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('org_bank') ? ' has-error' : '' }}">
                                <label for="org_bank" class="col-md-4 control-label">开户银行</label>

                                <div class="col-md-6">
                                    <input id="org_bank" type="text" class="form-control" name="org_bank" value="{{ old('org_bank') }}" required>

                                    @if ($errors->has('org_bank'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('org_bank') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('org_account') ? ' has-error' : '' }}">
                                <label for="org_account" class="col-md-4 control-label">账号</label>

                                <div class="col-md-6">
                                    <input id="org_account" type="text" class="form-control" name="org_account" value="{{ old('org_account') }}" required>

                                    @if ($errors->has('org_account'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('org_account') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        新建发票信息
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
