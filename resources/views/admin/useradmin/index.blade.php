
	<!--/.row-->

<!--Xac dinh title cho view thong qua yield('title')-->

<!--xac dinh noi dung cho yield('noidung')-->


 
@extends('admin.layouts.admin')
@section('title','Contact page')
 
@section('noidung') 
	<br>
 
 <div class="form-group">
 	<div class="row">
		<div class="col-lg-12">

			<div class="panel-body">
				<div class="form-group row">
					<div class="col-md-9">
						<label style="font-size: 17px;">Thông tin admin</label>
					</div>
				</div>
		
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>										
								<th>Họ tên</th>										
								<th>Lớp</th>										
								<th>Email</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
							</tr>
						</thead>
						<tbody>
							@foreach($useradmin as $ad)
								<td>{{$ad['name']}}</td>
								<td>{{$ad['lop']}}</td>
								<td>{{$ad['email']}}</td>
								<td>{{$ad['phone']}}</td>
								<td>{{$ad['address']}}</td>
							@endforeach
						</tbody>
					</table>
				 
				</div>
			</div>
	
		</div>
	</div>
</div>

@endsection
 
