<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job;
use DB;

class JobController extends Controller
{
    public function getlist() {
        $job = job::all();
    	return view('admin.job.list', compact('job'));
    }

    public function getadd() {
        $career = DB::table('career')->get();
    	return view('admin.job.add', compact('career'));
    }

    public function postadd(Request $request) {
        if(!array_key_exists($request->experience,config('master_admin.kinhnghiem'))) {
            abort('404');
        }
        if(!array_key_exists($request->degree,config('master_admin.bangcap'))) {
            abort('404');
        }
        if(!array_key_exists($request->sex,config('master_admin.gioitinh'))) {
            abort('404');
        }
        if(!array_key_exists($request->money,config('master_admin.mucluong'))) {
            abort('404');
        }
        $career_ = DB::table('career')->pluck('slug')->toArray();
        if(!in_array($request->career, $career_)) {
            abrot('404');
        }
        
        $this->validate($request, 
            [
                'title' => 'required|name|min:3|max:255',
                'description' => 'required',
                'right' => 'required',
                'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'experience' => 'required',
                'degree' => 'required',
                'sex' => 'required',
                'deadline_day' => 'required',
                'contact' => 'required|name',
                'job_requirements' => 'required',
                'request_profile' => 'required',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:11',
                'money' => 'required',
                'career' => 'required',
                'vacancies' => 'required',
            ],
            [
                'title.required' => 'Tên chức danh không được để trống.',
                'title.name' => 'Tên chức danh không hợp lệ.',
                'title.min' => 'Tên chức danh có độ dài tối đa từ 3 đến 255 ký tự',
                'title.max' => 'Tên chức danh có độ dài tối đa từ 3 đến 255 ký tự',
                'description.required' => 'Mô tả công việc không được để trống.',
                'right.required' => 'Quyền lợi được hưởng không được để trống.',
                'number.required' => 'Số lượng không được để trống.',
                'number.regex' => 'Số lượng không hợp lệ.',
                'experience.required' => 'Kinh nghiệm không được để trống.',
                'degree.required' => 'bằng cấp không được để trống.',
                'sex.required' => 'Giới tính không được để trống.',
                'deadline_day.required' => 'Ngày hết hạn không được để trống.',
                'contact.required' => 'Tên người liên hệ không được để trống.',
                'contact.name' => 'Tên người liên hệ không hợp lệ.',
                'job_requirements.required' => 'Yêu cầu công việc không được để trống.',
                'request_profile.required' => 'Yêu cầu hồ sơ không được để trống',
                'phone.required' => 'Số điện thoại không được để trống.',
                'phone.regex' => 'Số điện thoại không hợp lệ.',
                'phone.min' => 'Số điện thoại có độ dài tối đa từ 9 đến 11 số.',
                'phone.max' => 'Số điện thoại có độ dài tối đa từ 9 đến 11 số.',
                'money.required' => 'Mức lương không được để trống.',
                'career.required' => 'Ngành nghề không được để trống.',
                'vacancies.required' => 'Vị trí tuyển dụng không được để trống.',
            ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'right' => $request->right,
            'number' => $request->number,
            'experience' => $request->experience,
            'degree' => $request->degree,
            'sex' => $request->sex,
            'deadline' => $request->deadline_day,
            'contact' => $request->contact,
            'job_requirements' => $request->job_requirements,
            'request_profile' => $request->request_profile,
            'phone' => $request->phone,
            'money' => $request->money,
            'career' => $request->career,
            'vacancies' => $request->vacancies,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('job')->insert($data);

        return redirect()->back()->with('thongbao', 'Thêm tuyển dụng thành công.');
    }

    public function getedit($id) {
        $job = job::find($id);
        if(is_null($job)) {
            abort('404');
        }
        $career = DB::table('career')->get();
        return view('admin.job.edit', compact('job', 'career'));
    }

    public function postedit(Request $request, $id) {
        $job = DB::table('job')->where('id', $id);
        if(is_null($job->first())) {
            abort('404');
        }
        if(!array_key_exists($request->experience,config('master_admin.kinhnghiem'))) {
            abort('404');
        }
        if(!array_key_exists($request->degree,config('master_admin.bangcap'))) {
            abort('404');
        }
        if(!array_key_exists($request->sex,config('master_admin.gioitinh'))) {
            abort('404');
        }
        if(!array_key_exists($request->money,config('master_admin.mucluong'))) {
            abort('404');
        }
        $career_ = DB::table('career')->pluck('slug')->toArray();
        if(!in_array($request->career, $career_)) {
            abrot('404');
        }
        
        $this->validate($request, 
            [
                'title' => 'required|name|min:3|max:255',
                'description' => 'required',
                'right' => 'required',
                'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'experience' => 'required',
                'degree' => 'required',
                'sex' => 'required',
                'deadline_day' => 'required',
                'contact' => 'required|name',
                'job_requirements' => 'required',
                'request_profile' => 'required',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:11',
                'money' => 'required',
                'career' => 'required',
                'vacancies' => 'required',
            ],
            [
                'title.required' => 'Tên chức danh không được để trống.',
                'title.name' => 'Tên chức danh không hợp lệ.',
                'title.min' => 'Tên chức danh có độ dài tối đa từ 3 đến 255 ký tự',
                'title.max' => 'Tên chức danh có độ dài tối đa từ 3 đến 255 ký tự',
                'description.required' => 'Mô tả công việc không được để trống.',
                'right.required' => 'Quyền lợi được hưởng không được để trống.',
                'number.required' => 'Số lượng không được để trống.',
                'number.regex' => 'Số lượng không hợp lệ.',
                'experience.required' => 'Kinh nghiệm không được để trống.',
                'degree.required' => 'bằng cấp không được để trống.',
                'sex.required' => 'Giới tính không được để trống.',
                'deadline_day.required' => 'Ngày hết hạn không được để trống.',
                'contact.required' => 'Tên người liên hệ không được để trống.',
                'contact.name' => 'Tên người liên hệ không hợp lệ.',
                'job_requirements.required' => 'Yêu cầu công việc không được để trống.',
                'request_profile.required' => 'Yêu cầu hồ sơ không được để trống',
                'phone.required' => 'Số điện thoại không được để trống.',
                'phone.regex' => 'Số điện thoại không hợp lệ.',
                'phone.min' => 'Số điện thoại có độ dài tối đa từ 9 đến 11 số.',
                'phone.max' => 'Số điện thoại có độ dài tối đa từ 9 đến 11 số.',
                'money.required' => 'Mức lương không được để trống.',
                'career.required' => 'Ngành nghề không được để trống.',
                'vacancies.required' => 'Vị trí tuyển dụng không được để trống.',
            ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'right' => $request->right,
            'number' => $request->number,
            'experience' => $request->experience,
            'degree' => $request->degree,
            'sex' => $request->sex,
            'deadline' => $request->deadline_day,
            'contact' => $request->contact,
            'job_requirements' => $request->job_requirements,
            'request_profile' => $request->request_profile,
            'phone' => $request->phone,
            'money' => $request->money,
            'career' => $request->career,
            'vacancies' => $request->vacancies,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $job->update($data);

        return redirect()->back()->with('thongbao', 'Sửa tuyển dụng thành công.');
    }

    public function getdelete($id) {
        $job = job::find($id);
        if(is_null($job)) {
            abrot('404');
        }
        $job->delete();

        return redirect()->back()->with('thongbao', 'Xóa tuyển dụng thành công.');
    }
}
