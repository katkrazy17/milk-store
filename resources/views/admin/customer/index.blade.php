@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Customer Index')
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
							<label style="font-size: 17px">Danh sách khách hàng</label>
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
									<th>Ngày đăng ký</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $us)
									<tr>
										<td>{{$loop->iteration }}</td>
										<td>{{$us['name']}}</td>
										<td>{{$us['address']}}</td>
										<td>{{$us['phone']}}</td>
										<td>{{$us['email']}}</td>
										<td>{{$us['created_at']}}</td>
										<td>
											{!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $us->id] ]) !!}
					                    		{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
					                    	{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

		</div>
	</div>
@endsection
