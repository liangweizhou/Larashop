@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">单品搜索</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('item.search', ['catid' => $category['id']]) }}">
                            {{ csrf_field() }}

                            @foreach (json_decode($category['spu_conf'], true) as $key => $conf)
                                <div class="form-group">
                                    <label for="conf[spu][{{ $key }}]" class="col-md-4 control-label">{{ $conf['name'] }}</label>

                                    <div class="col-md-6">
                                        @if (($conf['type']  == 'enum'))
                                            <div class="form-check form-check-inline">
                                                @foreach ($conf['options'] as $option)
                                                    <input class="form-check-input" type="checkbox" name="conf[spu][{{ $key }}][]" id="conf[spu][{{ $key }}][]" value="{{ $option }}"
                                                            {{ (isset($search) and array_key_exists('spu.' . $key, $search) and in_array($option, $search['spu.' . $key])) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="conf[spu][{{ $key }}][]">{{ $option }}</label>
                                                @endforeach
                                            </div>
                                        @elseif (($conf['type']  == 'intrange') or ($conf['type']  == 'floatrange'))
                                            <div class="form-row">
                                                <input type="text" class="form-control" placeholder="最小值"
                                                       name="conf[spu][{{ $key }}][min]" id="conf[spu][{{ $key }}][min]" value="{{ isset($search) ? array_get($search, 'spu.' . $key . '.min', '') : '' }}">
                                                -
                                                <input type="text" class="form-control" placeholder="最大值"
                                                       name="conf[spu][{{ $key }}][max]" id="conf[spu][{{ $key }}][max]" value="{{ isset($search) ? array_get($search, 'spu.' . $key . '.max', '') : '' }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            @foreach (json_decode($category['sku_conf'], true) as $key => $conf)
                                <div class="form-group">
                                    <label for="conf[sku][{{ $key }}]" class="col-md-4 control-label">{{ $conf['name'] }}</label>

                                    <div class="col-md-6">
                                        @if (($conf['type']  == 'enum'))
                                            <div class="form-check form-check-inline">
                                                @foreach ($conf['options'] as $option)
                                                    <input class="form-check-input" type="checkbox"
                                                           name="conf[sku][{{ $key }}][]" id="conf[sku][{{ $key }}][]" value="{{ $option }}"
                                                            {{ (isset($search) and array_key_exists('sku.' . $key, $search) and in_array($option, $search['sku.' . $key])) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="conf[sku][{{ $key }}][]">{{ $option }}</label>
                                                @endforeach
                                            </div>
                                        @elseif (($conf['type']  == 'intrange') or ($conf['type']  == 'floatrange'))
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="最小值"
                                                           name="conf[sku][{{ $key }}][min]" id="conf[sku][{{ $key }}][min]" value="{{ isset($search) ? array_get($search, 'sku.' . $key . '.min', '') : '' }}">
                                                </div>
                                                -
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="最大值"
                                                           name="conf[sku][{{ $key }}][max]" id="conf[sku][{{ $key }}][max]" value="{{ isset($search) ? array_get($search, 'sku.' . $key . '.max', '') : '' }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        搜索
                                    </button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">序号</th>
                                <th scope="col">封面图片</th>
                                <th scope="col">名称</th>
                                <th scope="col">单价</th>
                                <th scope="col">总库存</th>
                                <th scope="col">剩余库存</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < count($items['data']); $i++)
                                <tr>
                                    <th scope="col">{{ $i }}</th>
                                    <th scope="col"><img src="{{ $items['data'][$i]['cover_img'] }}" width="50" height="50"></th>
                                    <th scope="col">{{ $items['data'][$i]['name'] }}</th>
                                    <th scope="col">{{ $items['data'][$i]['price'] }}</th>
                                    <th scope="col">{{ $items['data'][$i]['total_amount'] }}</th>
                                    <th scope="col">{{ $items['data'][$i]['remaining_amount'] }}</th>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
