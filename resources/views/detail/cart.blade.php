@extends('layouts.cate-layout')
@section('content')

<div class="col-xs-12">        
      
    <div class="container-fluid mt-5">
        <div class="form-group row">
            @if (session('ketqua'))
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('ketqua') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@if(Cart::count() !=0)
    <div class="col-xs-12">
        <table class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="col-1">Tên sản phẩm</th>
                    <th style="padding-left: 11%;">SL</th>
                    <th>Action</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::content() as $row)
                <tr> 
                    <td>{!!$row->id!!}</td>
                    <td width="260">{!!$row->name!!}</td>
                    <td class="text-center">                        
                        <a href="{!!url('cart/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a> 
                        <input type="text" class="qty text-center" value=" {!!$row->qty!!}" readonly="readonly"> 
                        <a href="{!!url('cart/update/'.$row->rowId.'/'.$row->qty.'-up')!!}" ><span class="glyphicon glyphicon-plus-sign"></span></a>
                    </td>
                    <td>
                        <a href="{!!url('cart/delete/'.$row->rowId)!!}"><span class="delete glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                    <td>{!! number_format($row->price) !!} Vnd</td>
                    <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="3"><strong>Tổng cộng :</strong> </td>
                    <td>{!!Cart::count()!!}</td>
                    <td class="tongtien" colspan="2">{!!Cart::subtotal()!!} Vnd</td>                   
                </tr>   
            </tbody>
        </table>

        @if(Cart::count() !=0)
            @if (Auth::guest())
                <div class="input-group">
                  <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                    <option value="cod"> Thanh toán khi nhận hàng</option>
                  </select>
                </div>
                <a class="btn btn-large btn-warning pull-right" href="{!!url('/login')!!}" >Tiến hàng thanh toán</a>
                <br> <br> <br>
            @else
              <form action="{!!url('/oder')!!}" >                  
                    <div class="input-group">
                        <label for="paymethod">Chọn phương thức thanh toán</label>
                        <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                          <option value="">Hãy chọn phương thức thanh toán</option> 
                          <option value="cod"> Thanh toán khi nhận hàng</option>
                        </select>
                    </div>
                  <hr>
                  <button type="submit" class="btn btn-danger pull-right">Tiến hành thanh toán</button>
                  <a href="{!!url('/laptop')!!}" type="button" class="btn btn-large btn-primary pull-left">Tiếp tục mua hàng</a>
                </form>   
                    <br> <br> <br>
            @endif
        @endif
    </div>
@else
    <p style="font-size: 20px; text-align: center;">giỏ hàng trống</p>
@endif
</div>
 
@endsection
  