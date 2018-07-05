@extends('admin.layouts.admin')
@section('title','Product Index')

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
						<label style="font-size: 17px">Danh sách sản phẩm</label>
					</div>
					<div class="col-md-2">
						<a href="{!!URL::to('admin/product/create')!!}" class="btn btn-primary">Thêm mới sản phẩm</a>
					</div>
				</div>

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Hình ảnh</th>
							<th>Tên sản phẩm</th>
							<th>Nhãn hiệu</th>
							<th>Giá bán</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					 	@foreach ($product as $pro)

						<tr>
							<td>{{$loop->iteration }}</td>
							<td> <img src="{!!url('uploads/'.$pro->images)!!}" alt="{!!$pro['images']!!}" width="50" height="40"></td>
							<td>{!!$pro->name!!}</td>
							<td>{!!$pro->category->name!!}</td>
							<td>{!!number_format($pro->price)!!} đ</td>
							<td>
		                    	{!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $pro->id] ]) !!}
		                    			<a href="{{ route('product.edit', $pro->id) }}" class="btn btn-primary btn-sm">Edit</a>
		                    			{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
		                    	{!! Form::close() !!}
		                    </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="col-md-12">
				 {!!$product->render();!!}
			</div>
		</div>
	</div>

@endsection
