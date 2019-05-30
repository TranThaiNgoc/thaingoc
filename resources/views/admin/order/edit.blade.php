@extends('admin.layout.index')
@section('title', 'Đơn hàng')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
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
                        <label>Mã đơn hàng</label>
                        <input type="text" name="id" value="{{ $order->id }}"  class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="text" name="name" value="{{ $order->name }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="text" name="phone" value="{{ $order->phone }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="text" name="email" value="{{ $order->email }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="text" name="address" value="{{ $order->address }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị chuyển hàng</label>
                        <input type="text" name="application" value="{{ $order->application }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Sản phẩm</label>
                        @foreach(json_decode($order->product) as $value)
                        <span class="text-success">{{ $value }}</span><br>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input type="text" name="application" value="{{ $order->money }}đ" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Tạo đơn lúc</label>
                        <input type="text" name="created_at" value="{{ $order->created_at }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Cập nhật lúc</label>
                        <input type="text" name="updated_at" value="{{ $order->updated_at }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Trạng thái đơn hàng</label>
                        <label class="radio-inline"><input type="radio" {{ ($order->type == 0) ? 'checked' : '' }} name="type" value="0">Chưa thanh toán</label>
                        <label class="radio-inline"><input type="radio" {{ ($order->type == 1) ? 'checked' : '' }} name="type" value="1">Đã thanh toán</label>
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Thanh toán đơn hàng</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop