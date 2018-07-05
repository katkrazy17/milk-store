@extends('layouts.cate-layout')
@section('content')
<div class="col-xs-12 col-sm-8">              
        <div class="panel-body">
            <div class="col-xs-12">
                <legend class="text-left">Xác nhận thông tin đơn hàng</legend> 

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>SL</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- nội dung order --}}
                        @foreach(Cart::content() as $row)
                          <tr>
                            <td>{!!$row->id!!}</td>
                            <td>{!!$row->name!!}</td>
                            <td class="text-center">                        
                                <span>{!!$row->qty!!}</span>
                            </td>
                            <td>{!! number_format($row->price) !!} Vnd</td>
                            <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
                          </tr>
                        @endforeach                    
                        <tr>
                            <td colspan="3"><strong>Tổng cộng :</strong> </td>
                            <td>{!!Cart::count()!!}</td>
                            <td class="tongtien" colspan="2">
                                {!!Cart::subtotal();!!} Vnd
                            </td>                      
                        </tr>                    
                    </tbody>
                </table>   

                {{-- hình thức thanh toán khi nhận hàng --}}
                <form action=""  method="POST" role="form">
                    {{ csrf_field() }}
                    <legend class="text-left">Thông tin khách hàng</legend>
                    <div class="form-group">
                          <label for="">
                          - Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
                          - Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
                          - Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
                        </label>
                    </div>               
                    <button type="submit" class="btn btn-primary pull-right"> Đặt hàng</button> 
                </form>

            </div>
        </div>     
</div>
<!-- ===================================================================================/news ============================== -->
@endsection