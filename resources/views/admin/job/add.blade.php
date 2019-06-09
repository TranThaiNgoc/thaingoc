@extends('admin.layout.index')
@section('title','Loại sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tuyển dụng
                    <small>Thêm</small>
                </h1>
            </div>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-lg-6" style="padding-bottom:120px">
                	@csrf
                    <div class="form-group">
                    	<label>Chức danh</label>
                        <input type="text" value="{{ old('title') }}" name="title" placeholder="Tuyển dụng nhân viên cơ khí,..." class="form-control">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea placeholder="Mô tả việc làm" value="{{ old('description') }}" id="ckeditor" class="form-control ckeditor" name="description">{!! old('description') !!}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Quyền lợi được hưởng</label>
                        <textarea placeholder="Quyền lợi được hưởng" id="ckeditor" class="form-control ckeditor" name="right">{!! old('right') !!}</textarea>
                        <span class="text-danger">{{ $errors->first('right') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" name="number" value="{{ old('number') }}" class="form-control" placeholder="Nhập số lượng">
                        <span class="text-danger">{{ $errors->first('number') }}</span>
                    </div>
                    <div class="form-group">
                    	<label>Kinh nghiệm</label>
                        <select class="form-control" name="experience">
                            @foreach(config('master_admin.kinhnghiem') as $key => $value)
                            <option value="{{ $key }}" {{ (old('experience') == $key) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('experience') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Bằng cấp</label>
                        <select class="form-control" name="degree">
                            @foreach(config('master_admin.bangcap') as $key => $value)
                            <option value="{{ $key }}" {{ (old('degree') == $key) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('degree') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select class="form-control" name="sex">
                            @foreach(config('master_admin.gioitinh') as $key => $value)
                            <option value="{{ $key }}" {{ (old('sex') == $key) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('sex') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Hạn nộp hồ sơ</label>
                        <div class="form-group">
                            <input type="date" value="{{ old('deadline_day') }}" name="deadline_day" max="3000-12-31" min="1000-01-01" class="form-control form-control-ps" value="1950-03-31">
                        </div>
                        <span class="text-danger">{{ $errors->first('deadline_day') }}</span>
                    </div>
                </div>
                <div class="col-lg-6" style="padding-bottom:120px">
                    <div class="form-group">
                        <label>Người liên hệ</label>
                        <input type="text" name="contact" value="{{ old('contact') }}" class="form-control" placeholder="Người liên hệ">
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Yêu cầu công việc</label>
                        <textarea name="job_requirements" id="ckeditor" class="w-100 form-control ckeditor" rows="4">{{ old('job_requirements') }}</textarea>
                        <span class="text-danger">{{ $errors->first('job_requirements') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Yêu cầu hồ sơ</label>
                        <textarea name="request_profile" id="editor1" class="w-100 form-control ckeditor" rows="6">- Đơn xin việc.
                        - Sơ yếu lý lịch.
                        - Hộ khẩu, chứng minh nhân dân và giấy khám sức khỏe.
                        - Các bằng cấp có liên quan.</textarea>
                        <span class="text-danger">{{ $errors->first('request_profile') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="number" value="{{ old('phone') }}" name="phone" class="form-control" placeholder="Số điện thoại liên hệ">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Mức lương</label>
                        <select class="form-control" name="money">
                            @foreach(config('master_admin.mucluong') as $key => $value)
                            <option value="{{ $key }}" {{ (old('money') == $key) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('money') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Ngành nghề</label>
                        <select class="form-control" name="career">
                            @foreach($career as $key => $value)
                            <option value="{{ $value->slug }}" {{ (old('career') == $key) ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('career') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Vị trí tuyển dụng</label>
                        <input type="text" value="{{ old('vacancies') }}" name="vacancies" class="form-control" placeholder="Vị trí tuyển dụng" value="">
                        <span class="text-danger">{{ $errors->first('vacancies') }}</span>
                    </div>
                <button type="submit" class="btn btn-primary">Thêm tuyển dụng</button>
                </div>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop