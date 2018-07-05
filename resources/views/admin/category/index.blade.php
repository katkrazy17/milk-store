@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Categories')
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
						<div class="col-md-8">
							<label style="font-size: 17px;">Danh sách doanh mục</label>
						</div>
						<div class="col-md-1">
							<a href="{!!URL::to('admin/category/create')!!}" class="btn btn-primary">Thêm mới doanh mục</a>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên danh mục</th>
									<th>Chức năng</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($category as $cate)
									<tr>
										<td>{{$loop->iteration }}</td>
										<td>{{ $cate['name'] }}</td>
										<td>
					                    	{!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $cate->id] ]) !!}
					                    			<a href="{{ route('category.edit', $cate->id) }}" class="btn btn-primary">Edit</a>
					                    			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					                    	{!! Form::close() !!}
					                    </td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $category->links()}}
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
