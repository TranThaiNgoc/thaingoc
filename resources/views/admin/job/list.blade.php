@extends('admin.layout.index')
@section('title','Danh sách job')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách job
                </h1>
            </div>
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên job</th>
                        <th>Thời gian</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($job as $value)
                    <tr class="odd gradeX" align="center">
                    	<td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                        <td class="center"><i class="fas fa-edit"></i><a href="{{ route('admin.job.edit', ['id'=>$value->id])}}"> Sửa</a></td>
                        <td class="center"><i class="fas fa-trash-alt"></i> <a href="{{ route('admin.job.delete', ['id'=>$value->id])}}" onclick="return confirm('Bạn muốn xóa job này ?')">Xóa</a></td>
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