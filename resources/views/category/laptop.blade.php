@extends('layouts.cate-layout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="beta-products-details">
        <p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
    </div>
</div>

@foreach($new_product as $new)
    <a href="{!!url('laptop/'.$new->id)!!}"  >
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="thumbnail">
                
                <div class="img-box">
                    <img class="" style="height: 170px; width: 80%; display: block; margin: 0 auto;" src="{!!url('./uploads/'.$new->images)!!}" alt="{!!$new->name!!}">
                </div>

   				<hr>
                    <div class="col-md-offset-1">
                    	<h3>{!!$new->name!!}</h3>
                    	<h4 style="color: #F00;>">{!!number_format($new->price)!!}₫</h4>  
                    </div>  
				<hr>

                <div class="btnbuy">
                    <a href="{!!url('cart/addcart/'.$new->id)!!}" class="btn btn-default btnct">Thêm vào giỏ </a>
                </div>

            </div>
        </div>
    </a>
@endforeach

<div class="col-md-12">
    {!!$new_product->render();!!}
</div>


 
 
@endsection
 
