@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">商品详情</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">单品名称</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" value="{{ $current['name'] }}" readonly>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="price" class="col-md-4 control-label">单价</label>
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" value="{{ $current['price'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_amount" class="col-md-4 control-label">总库存</label>
                                <div class="col-md-6">
                                    <input id="total_amount" type="text" class="form-control" value="{{ $current['total_amount'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="remaining_amount" class="col-md-4 control-label">剩余库存</label>
                                <div class="col-md-6">
                                    <input id="remaining_amount" type="text" class="form-control" value="{{ $current['remaining_amount'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">封面图片</label>
                                <div class="col-md-6">
                                    <img id="cover_img" src="{{ $current['cover_img'] }}" width="80" height="80">
                                </div>
                            </div>

                            @foreach ($skuForm as $key => $values)
                                <div class="form-group">
                                    <label for="sku.{{ $key }}" class="col-md-4 control-label">{{ $skuConf[$key]['name'] }}</label>

                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            @foreach ($values as $v)
                                            <input class="form-check-input" type="radio" name="sku.{{ $key }}" value="{{ $v }}"
                                                    {{ (isset($current) and ($v == $current['item_sku'][$key])) ? 'checked' : ''}} onchange="changeSku()">
                                            <label class="form-check-label" for="sku.{{ $key }}">{{ $v }}  {{ array_key_exists('unit', $skuConf[$key]) ? $skuConf[$key]['unit'] : ''}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="product.description" class="col-md-4 control-label">商品详情</label>
                                <div class="col-md-6">
                                    <input id="product.description" type="text" class="form-control" value="{{ $product['description'] }}" readonly>
                                </div>
                            </div>



                            {{--<button type="submit" >加入购物车</button>--}}

                        </form>


                        <script>
                            var sortedSkuKeys = {!! json_encode($sortedKeys) !!};
                            var skus = {!! json_encode($skus) !!};
                            var infoKeys = ['name', 'price', 'total_amount', 'remaining_amount'];
                            function changeSku()
                            {
                                arr = []
                                sortedSkuKeys.forEach(function (key) {
                                    arr.push(key + ':' + $('input:radio[name="sku.' + key + '"]:checked').val());
                                })
                                idx = arr.join(';');
                                if (idx in skus) {
                                    infoKeys.forEach(function (key) {
                                        $('#' + key + '').val(skus[idx][key])
                                    })
                                    $('#cover_img').attr('src', skus[idx]['cover_img'])
                                } else {
                                    infoKeys.forEach(function (key) {
                                        $('#' + key + '').val('该选项组合的商品不存在')
                                    })
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
