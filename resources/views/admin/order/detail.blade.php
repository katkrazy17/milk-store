@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Order Detail')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
	<br>

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

	<div class="row">
		<div class="col-lg-12">
			{!! Form::model($oder, array('route' => array('order.update', $oder->id), 'method' => 'put')) !!}


						<h4>Chi tiết sản phẩm trong đơn đặt hàng</h4>



							<table class="table table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Hình ảnh</th>
										<th>Tên sản phẩm</th>
										<th> Số lượng </th>
										<th>Giá bán</th>
										<th>Trạng thái</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										 <tr>
											 <td>{!!$row->id!!}</td>
											 <td> <img src="{!!url('uploads/products/'.$row->images)!!}" alt="quan ao" width="50" height="40"></td>
											 <td>{!!$row->name!!}</td>
											 <td>{!!$row->qty!!}</td>
											 <td>{!!$row->price!!}</td>
											 <td>
											 	@if($row->status ==1)
													<span class="status2">Còn hàng</span>
												@else
													<span class="status1"> Tạm hết</span>
												@endif
											 </td>
										</tr>
									@endforeach
								</tbody>
							</table>

						<p>
							- <strong>Khách hàng</strong>: {!!$oder->user->name!!}
							- <strong>Địa chỉ:</strong> {!!$oder->user->address!!}
							- <strong>Điện thoại:</strong> {!!$oder->user->phone!!}
						</p>

				<button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>
		{!! Form::close() !!}
		</div>
	</div>

@endsection
