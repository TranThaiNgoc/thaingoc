@extends('admin.layout.index')
@section('title','Sửa loại sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa loại sản phẩm
                    <small>{{ $product_type->name }}</small>
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
            @if(session('thongbaoloi'))
                <div class="alert alert-danger">
                    {{session('thongbaoloi')}}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-6" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group">
                    	<label>Tên thể loại</label>
                        <select name="id_categories" class="form-control">
                        	@foreach($categories as $key => $value)
                            <option {{ $product_type->id_categories == $value->id ? "selected" : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    	<label>Tên loại sản phẩm</label>
                    	<input type="text" name="name" value="{{ $product_type->name }}" class="form-control" placeholder="Nhập tên loại sản phẩm">
                    </div>
					<button type="submit" class="btn btn-primary">Sửa thể loại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop