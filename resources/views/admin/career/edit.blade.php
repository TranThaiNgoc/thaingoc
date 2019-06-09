@extends('admin.layout.index')
@section('title','Sửa ngành nghề')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa ngành nghề
					<small>{!! $career->name !!}</small>
				</h1>
			</div>
			@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
				{{$err}}<br>
				@endforeach
			</div>
			@endif
			<!--hien thi thanh cong-->
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				<form action="" method="POST">
					@csrf
					<div class="form-group">
						<label>Tên ngành nghề</label>
						<input type="text" name="name" value="{{ $career->name }}" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Sửa ngành nghề</button>
				<form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>

@stop