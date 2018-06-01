@extends('layouts.app')
@section('content')

{{--侧边导航栏--}}
        <div class="row">
            <div class="col-md-2 col-xs-2 col-sm-2">
                <div class="navbar-collapse">
                    <div class="navbar">
                        <h3>导航栏</h3>
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation"><a href="{{route('item.index', ['cateid' =>3 ])}}">手机列表</a></li>
                            <li role="presentation"><a href="#">电脑列表</a></li>
                            <li role="presentation"><a href="#">其他</a></li>
                            <li role="presentation"><a href="#">其他</a></li>
                            <li role="presentation"><a href="#">其他</a></li>
                            <li role="presentation"><a href="#">其他</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img src="https://ss1.baidu.com/9vo3dSag_xI4khGko9WTAnF6hhy/image/h%3D300/sign=8f68ab739c5298221a333fc3e7cb7b3b/77094b36acaf2edd6a87de5d811001e939019314.jpg" alt="...">
                    </a>
                    <div class="caption">
                        <a href="{{route('product.show',['id' => 9])}}"><h4>小米6 黑色</h4></a>

                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img src="https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=1860666957,1130813439&fm=27&gp=0.jpg" alt="...">
                    </a>
                    <div class="caption">
                        <a href="{{route('product.show', ['id' => 10])}}"> <h4>华为荣耀8</h4></a>
                        {{--<p><a href="#" class="btn btn-primary btn-sm" role="button">加入购物车</a> <a href="#" class="btn btn-default btn-sm" role="button">添加收藏</a></p>--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img src="https://img13.360buyimg.com/n7/jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg" alt="...">
                    </a>
                    <div class="caption">
                        <a href="{{route('product.show', ['id' => 6])}}"><h4>小米3 6+64G</h4></a>
                        {{--<p><a href="#" class="btn btn-primary btn-sm" role="button">加入购物车</a> <a href="#" class="btn btn-default btn-sm" role="button">添加收藏</a></p>--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img src="https://img13.360buyimg.com/n7/jfs/t6400/251/1498502133/126650/2ade0e70/5951fa4aN6c972662.jpg" alt="...">
                    </a>
                    <div class="caption">
                        <a href="{{route('product.show', ['id' => 1])}}"><h4>小米4 3+32G</h4></a>
                        {{--<p><a href="#" class="btn btn-primary btn-sm" role="button">加入购物车</a> <a href="#" class="btn btn-default btn-sm" role="button">添加收藏</a></p>--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=236998579,2685233104&fm=27&gp=0.jpg" alt="...">
                    </a>
                    <div class="caption">
                        <a href="{{route('product.show', ['id' => 4])}}"><h4>小米note</h4></a>
                        {{--<p><a href="#" class="btn btn-primary btn-sm" role="button">加入购物车</a> <a href="#" class="btn btn-default btn-sm" role="button">添加收藏</a></p>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img  src="https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=1576882532,3848915526&fm=27&gp=0.jpg" alt="...">
                    </a>
                    <div class="caption">
                        <a href="{{route('product.show', ['id' => 9])}}"><h4>小米6 蓝色</h4></a>
                        {{--<p><a href="#" class="btn btn-primary btn-sm" role="button">加入购物车</a> <a href="#" class="btn btn-default btn-sm" role="button">添加收藏</a></p>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <a>
                        <img src="https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3185980523,2669333283&fm=27&gp=0.jpg" alt="...">
                    </a>
                    <div class="caption">
                       <a href="{{route('product.show', ['id' => 11])}}"><h4>华为mate10</h4></a>
                        {{--<p><a href="#" class="btn btn-primary btn-sm" role="button">加入购物车</a> <a href="#" class="btn btn-default btn-sm" role="button">添加收藏</a></p>--}}
                    </div>
                </div>
            </div>

        </div>


@endsection