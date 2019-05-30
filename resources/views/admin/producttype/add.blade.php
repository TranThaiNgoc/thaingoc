@extends('admin.layout.index')
@section('title','Loại sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại sản phẩm
                    <small>Thêm</small>
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
                        	@if(count($categories) > 0)
                        	@foreach($categories as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                    	<label>Tên loại sản phẩm</label>
                    	<input type="text" name="name" class="form-control" placeholder="Nhập tên loại sản phẩm">
                    </div>
					<button type="submit" class="btn btn-primary">Thêm thể loại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop