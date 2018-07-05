@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Add Categories')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')


{!! Form::open(array('url' => 'admin/category', 'method' => 'post')) !!}

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
			<h1 class="page-header"><small>Thêm mới danh mục</small></h1>
		</div>
	</div>

	<div class="row">
		<div class="panel-body">
	  		{{ csrf_field() }}
		    <div class="form-group row">
	      		{!! Form::label('', 'Tên danh mục', ['class'=>'control-label col-md-2']) !!}
	      		<div class="col-md-9">
	      			{!! Form::text('txtCateName','', ['class' => 'form-control', 'required'=>'required']) !!}
	      		</div>
	  		</div>
	  		<div class="col-md-offset-2">
	  		{!! Form::submit('Thêm danh mục', ['class' => 'btn btn-primary']) !!}

	  		</div>
		</div>
	</div>

	{!! Form::close() !!}

@endsection
