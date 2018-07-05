@extends('layouts.cate-layout')
@section('content')
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
 

<div class="container">
	<div class="form-group">
 	<div class="row">
		<div class="col-lg-12">

			<div class="panel-body">
				<div class="form-group row">
					<div class="col-md-9">
						<label style="font-size: 17px;">Thông tin khách hàng</label>
					</div>
				</div>
		
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>										
								<th>Họ tên</th>										
								<th>Email</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
							</tr>
						</thead>
						<tbody>
							@foreach($user as $us)
								<tr>
									<td>{{$us['name']}}</td>
									<td>{{$us['email']}}</td>
									<td>{{$us['phone']}}</td>
									<td>{{$us['address']}}</td>
								</tr>
								<a href="{{ route('user.edit', $us->id) }}" class="btn btn-primary btn-sm pull-right">Cập nhật thông tin</a>
							@endforeach 
						</tbody>
					</table>
				 
				</div>
			</div>
	
		</div>
	</div>
</div>


<div class="form-group">
 	<div class="row">
		<div class="col-lg-12">

			<div class="panel-body">
				<div class="form-group row">
					<div class="col-md-9">
						<label style="font-size: 17px;">Thông tin mua hàng</label>
					</div>
				</div>
			
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>										
								<th> STT</th>										
								<th> Mã đơn hàng</th>										
								<th> Ngày đặt hàng</th>										
								<th> Tổng tiền</th>		
							</tr>
						</thead>
						<tbody>
							<?php  $stt=0;?>
								@foreach($oder as $od)
									<?php $stt++;?>
									<tr>
										<td>{!!$stt!!}</td>
										<td>{!!$od->id!!}</td>
										<td>{!!$od->created_at!!}</td>
										<td>{!!number_format($od->total)!!} Vnđ</td>
									</tr>
								@endforeach	
						</tbody>
					</table>
				 
				</div>
			</div>

		</div>
	</div>
</div>
</div>

@endsection
