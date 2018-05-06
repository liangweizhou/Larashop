@extends('layouts.app')
@section('content')
 <div class="container">
     <div class="row">
         {{--商品详情图片的轮播--}}

         <div class="col-xs-8">
             <img src="https://img20.360buyimg.com/mobilecms/s500x400_jfs/t10177/326/1292333258/167702/38059e69/59ded62eN64a9784c.jpg!q90.webp">
         </div>

{{--右侧商品的详情以及操作--}}

         <div class="col-xs-4">
             <div class="">
                 <h><span class="label label-default">item name</span></h>
             </div>
             <div>
                 <p>price</p>
             </div>
             <div>
                 <p>sku</p>
             </div>
             <div>
                 数量增删
             </div>
             <div>
                 <button class="btn-danger">加入购物车</button>
                 <button class="btn-info">加入收藏</button>
             </div>
         </div>
     </div>

 </div>


@endsection