@extends('admin.layout.index')
@section('title', 'sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">sản phẩm
                    <small>Sửa</small>
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
                        <label>Tên thể loại</label>
                        <select name="id_categories" class="form-control" id="categories">
                            @if(count($categories) > 0)
                            @foreach($categories as $key => $value)
                            <option {{ ($product['id_categories'] == $value->id)? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <select name="id_product_type" class="form-control" id="product_type">
                            @if(count($product_type) > 0)
                            @foreach($product_type as $key => $value)
                            <option {{ ($product['id_product_type'] == $value->id)? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" value="{{ $product['name'] }}" class="form-control" placeholder="Nhập tên sản phẩm">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input type="number" name="price" value="{{ $product['price'] }}" class="form-control" placeholder="Nhập giá sản phẩm">
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Nội dung sản phẩm</label>
                        <textarea class="form-control editor" name="content" id="editor1" placeholder="Nhập nội dung sản phẩm" rows="10">{{ $product['content'] }}</textarea>
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Mã giảm giá</label>
                        <input type="text" name="sale" value="{{ $product['sale'] }}" class="form-control" placeholder="Nhập mã giảm giá">
                        <span class="text-danger">{{ $errors->first('sale') }}</span>
                    </div>
                    <div class="form-group">
                        <label style="display: block;">hình ảnh sản phẩm</label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Hình 1</label>
                                    <img src="{{ $product['image1'] }}">
                                    <input type="file" name="image1">
                                    <span class="text-danger">{{ $errors->first('image1') }}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Hình 2</label>
                                    <img src="{{ $product['image2'] }}">
                                    <input type="file" name="image2">
                                    <span class="text-danger">{{ $errors->first('image2') }}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Hình 3</label>
                                    <img src="{{ $product['image3'] }}">
                                    <input type="file" name="image3">
                                    <span class="text-danger">{{ $errors->first('image3') }}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Hình 4</label>
                                    <img src="{{ $product['image4'] }}">
                                    <input type="file" name="image4">
                                    <span class="text-danger">{{ $errors->first('image4') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" name="number" value="{{ $product['number'] }}" class="form-control" placeholder="Nhập số lượng sản phẩm">
                        <span class="text-danger">{{ $errors->first('number') }}</span>
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Trạng thái sản phẩm</label>
                        <label class="radio-inline"><input type="radio" {{ ($product['status'] == 0) ? 'checked' : '' }} name="status" value="0">Không kích hoạt</label>
                        <label class="radio-inline"><input type="radio" {{ ($product['status'] == 1) ? 'checked' : '' }} name="status" value="1">Kích hoạt</label>
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#categories').change(function(){
                var idcategories = $('#categories').val();
                $.get("admin/ajax/product_type/"+idcategories,function(data){
                    $("#product_type").html(data);
                });
            });
        });
    </script>
@stop