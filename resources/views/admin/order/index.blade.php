@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Order Index')
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

			<div class="panel-body">
					<div class="form-group row">
						<div class="col-md-9">
							<label style="font-size: 17px">Danh sách đơn hàng</label>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên khách hàng</th>
									<th>Địa chỉ</th>
									<th>Điện thoại</th>
									<th>Email</th>
									<th>Ngày đặt</th>
									<th>Thành tiền</th>
									<th>Trạng thái</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($oder as $od)
									<tr>
										<td>{{$loop->iteration }}</td>
										<td>{!!$od->user->name!!}</td>
										<td>{!!$od->user->address!!}</td>
										<td>{!!$od->user->phone!!}</td>
										<td>{!!$od->user->email!!}</td>
										<td>{!!$od->created_at!!}</td>
										<td>{!!$od->total!!} Vnd</td>
										<td>
											@if($od->status ==0)
												<span class="status1">Chưa xác nhận</span>
											@else
												<span class="status2"> Đã xác nhận</span>
											@endif
										</td>
										<td>
					                    	{!! Form::open(['method' => 'DELETE', 'route' => ['order.destroy', $od->id] ]) !!}
					                    			<a href="{{ route('order.edit', $od->id) }}" class="btn btn-primary btn-sm">Chi tiết</a>
					                    			{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
					                    	{!! Form::close() !!}




					                    </td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
			</div>

			<div class="col-md-12">
				 {!!$oder->render();!!}
			</div>
		</div>
	</div>

@endsection
