@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Add Product')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
{!! Form::open(array('url' => 'admin/product', 'method' => 'post','files'=>true,'enctype'=>'multipart/form-data')) !!}

	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm mới sản phẩm: </small></h1>
			</div>
	</div>

	<div class="row">
		<div class="panel-body">

      		<div class="form-group row">
	      		{!! Form::label('input-id', 'Chọn thư mục', ['class'=>'control-label col-md-2']) !!}
	      		<div class="col-md-10">
	      			{!! Form::select('category',$category,'',['class'=>'form-control category', 'required'=>'required']) !!}
	      		</div>
      		</div>

      		<div class="form-group row">
      			{!! Form::label('input-id', 'Tên sản phẩm', ['class'=>'control-label col-md-2']) !!}
      			<div class="col-md-10">
      				{!! Form::text('txtname', '', ['class'=>'form-control','required'=>'required']) !!}
      			</div>
      		</div>

      		<div class="form-group row">
      			{!! Form::label('input-id', 'Gồm có', ['class'=>'control-label col-md-2']) !!}
      			<div class="col-md-10">
      				{!! Form::text('txtpacket', '', ['class'=>'form-control', 'required'=>'required']) !!}
      			</div>
      		</div>

      		<div class="form-group row">
      			{!! Form::label('input-id', 'Khuyến mãi', ['class'=>'control-label col-md-2']) !!}
				<div class="col-md-10">
      				{!! Form::text('txtpromo', '', ['class'=>'form-control','required'=>'required']) !!}
				</div>
      		</div>

      		<div class="form-group row">
	      		{!! Form::label('input-id', 'Hình ảnh', ['class'=>'control-label col-md-2']) !!}
  				<div class="col-md-3">
  					{!! Form::file('txtimg', array('class' => 'form-control','required'=>'required')) !!}
  				</div>
	      		{!! Form::label('input-id', 'Giá bán', ['class'=>'control-label col-md-1']) !!}
				<div class="col-md-3">
	      			{!! Form::text('txtprice', '', ['class'=>'form-control','required'=>'required']) !!}
				</div>
      		</div>

			{!! Form::submit('Thêm sản phẩm', ['class'=>'btn btn-primary']) !!}
			<br>	<br>
		</div>
	</div>

{!! Form::close() !!}
@endsection
