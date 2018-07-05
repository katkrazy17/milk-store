@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Edit Product')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
{!! Form::model($product_edit, array('route' => array('product.update', $product_edit->id), 'method' => 'put','files'=>true,'enctype'=>'multipart/form-data')) !!}
	<br>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Cập nhật sản phẩm: </small></h1>
		</div>
	</div>

		<div class="row">
		<div class="panel-body">

      		<div class="form-group row">
	      		{!! Form::label('input-id', 'Chọn thư mục', ['class'=>'control-label col-md-2']) !!}
	      		<div class="col-md-10">
					{!! Form::select('category', $category_edit, $product_edit->category_id, ['class'=>'form-control category']) !!}
				</div>
      		</div>

      		<div class="form-group row">
      			{!! Form::label('input-id', 'Tên sản phẩm', ['class'=>'control-label col-md-2']) !!}
      			<div class="col-md-10">
      				{!! Form::text('txtname', $product_edit->name, ['class'=>'form-control']) !!}
      			</div>
      		</div>

      		<div class="form-group row">
      			{!! Form::label('input-id', 'Gồm có', ['class'=>'control-label col-md-2']) !!}
      			<div class="col-md-10">
      				{!! Form::text('txtpacket', $product_edit->packet, ['class'=>'form-control']) !!}
      			</div>
      		</div>

      		<div class="form-group row">
      			{!! Form::label('input-id', 'Khuyến mãi', ['class'=>'control-label col-md-2']) !!}
				<div class="col-md-10">
      				{!! Form::text('txtpromo', $product_edit->promo, ['class'=>'form-control']) !!}
				</div>
      		</div>

      		<div class="form-group row">
	      		{!! Form::label('input-id', 'Hình ảnh', ['class'=>'control-label col-md-2']) !!}
  				<div class="col-md-3">
  					{!! Form::file('txtimg', array('class' => 'form-control')) !!}
  					{!! Form::label('', 'Ảnh cũ', ['class'=>'control-label']) !!}
			      	<img src="{!!url('uploads/'.$product_edit->images)!!}" alt="{!!$product_edit->images!!}" width="80" height="60">
  				</div>
	      		{!! Form::label('input-id', 'Giá bán', ['class'=>'control-label col-md-1']) !!}
				<div class="col-md-3">
	      			{!! Form::text('txtprice',  $product_edit->price, ['class'=>'form-control']) !!}
				</div>
      		</div>


			{!! Form::submit('Cập nhật', ['class'=>'btn btn-primary']) !!}
			<br><br>
		</div>
	</div>



				</div>
			</div>
		</div>
	</div>

{!! Form::close() !!}
@endsection
