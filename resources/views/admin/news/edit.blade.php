@extends('admin.layout.index')
@section('title', 'Tin tức')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa tin tức
                    <small>{{ $news->name }}</small>
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
            <div class="col-lg-10" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group">
                    	<label>Tên bài viết</label>
                    	<input type="text" name="name" value="{{ $news->name }}" class="form-control" placeholder="Nhập tên bài viết">
                    </div>
                    <div class="form-group">
                    	<label>Tóm tắt bài viết</label>
                    	<textarea class="form-control editor" name="summary" id="editor" placeholder="Nhập tóm tắt bài viết" rows="4">{{ $news->summary }}</textarea>
                    </div>
                    <div class="form-group">
                    	<label>Nội dung bài viết</label>
                    	<textarea class="form-control editor" name="content" id="editor1" placeholder="Nhập nội dung bài viết" rows="10">{{ $news->content }}</textarea>
                    </div>
                    <div class="form-group">
                    	<label style="width: 100%">hình ảnh bài viết</label>
                    	<img width="30%" src="{{ $news->image }}">
                    	<input type="file" name="image">
                    </div>
                    <div class="form-group">
                    	<label class="news">Loại bài viết</label>
                    	<select name="type" class="form-control">
                    		@foreach(config('master_admin.loaibaiviet') as $key => $value)
                    			<option {{ $news->type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                			@endforeach
                    	</select>
                    </div>
                    <div class="form-group">
                    	<label style="display: block;">Trạng thái bài viết</label>
                    	@if($news->status == 0)
	                    	<label class="radio-inline"><input type="radio" name="status" value="0" checked>Kích hoạt</label>
	                    	<label class="radio-inline"><input type="radio" name="status" value="1">Không kích hoạt</label>
                    	@else
							<label class="radio-inline"><input type="radio" name="status" value="0">Kích hoạt</label>
	                    	<label class="radio-inline"><input type="radio" name="status" value="1" checked>Không kích hoạt</label>
                    	@endif

                    </div>
					<button type="submit" class="btn btn-primary">Sửa bài viết</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop