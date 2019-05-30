@extends('admin.layout.index')
@section('title', 'Tin tức')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách đơn hàng
                </h1>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
			@foreach($errors->all() as $err)
				{{$err}}<br>
			@endforeach
			</div>
            @endif
            @if(session('thongbao'))
			<div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('thongbaoloi'))
			<div class="alert alert-danger">
				{{ session('thongbaoloi') }}
			</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th width="10%">Mã đơn hàng</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Phí Ship</th>
                        <th width="10%">Tổng tiền</th>
                        <th width="10%">Tên người mua</th>
                        <th width="10%">Tạo đơn lúc</th>
                        <th width="10%">Sửa</th>
                        <th width="10%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($order as $value)
                    <tr class="odd gradeX" align="center">
                    	<td>{{ $value->id }}</td>
                    	<td>{!! ($value->type == 0) ? '<span class="label label-danger">Chưa thanh toán</span>' : '<span class="label label-primary">Đã thanh toán</span>' !!}</td>
                    	<td>{{ $value->transport }}đ</td>
                    	<td>{{ $value->number }}</td>
                    	<td>{{ $value->name }}</td>
                    	<td>{{ $value->created_at }}</td>
                        <td class="center"><i class="fas fa-edit"></i><a href="{{ route('admin.order.edit', ['id'=>$value->id])}}"> Sửa</a></td>
                        <td class="center"><i class="fas fa-trash-alt"></i> <a href="{{ route('admin.order.delete', ['id'=>$value->id])}}" onclick="return confirm('Bạn muốn xóa đơn hàng này ?')">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop