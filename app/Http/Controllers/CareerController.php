<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CareerController extends Controller
{
    public function getlist() {
    	$career = DB::table('career')->get();
    	return view('admin.career.list', compact('career'));
    }

    public function getadd() {
    	return view('admin.career.add');
    }

    public function postadd(Request $request) {
    	$this->validate($request, 
    		[
    			'name' => 'required|min:2|max:100'
    		],
    		[
    			'name.required' => 'Tên ngành nghề không được để trống.',
    			'name.min' => 'Tên ngành nghề có độ dài tối đa từ 2 đến 100 ký tự.',
    			'name.max' => 'Tên ngành nghề có độ dài tối đa từ 2 đến 100 ký tự.',
    		]);
    	$data = [
    		'name' => $request->name,
    		'slug' => str_slug(trim($request->name)),
    		'created_at' => date('Y-m-d H:m:s'),
    	];
    	DB::table('career')->insert($data);
    	return redirect()->back()->with('thongbao', 'Thêm ngành nghề thành công.');
    }

    public function getedit($id) {
    	$career = DB::table('career')->where('id', $id)->first();
    	if(is_null($career))
    	{
    		abort('404');
    	}
    	return view('admin.career.edit', compact('career'));
    }

    public function postedit(Request $request, $id) {
    	$career = DB::table('career')->where('id', $id);
    	if(is_null($career->first())) {
    		abrot('404');
    	}
    	$this->validate($request, 
    		[
    			'name' => 'min:2|max:100'
    		],
    		[
    			'name.min' => 'Tên ngành nghề có độ dài tối đa từ 2 đến 100 ký tự.',
    			'name.max' => 'Tên ngành nghề có độ dài tối đa từ 2 đến 100 ký tự.',
    		]);
    	$data = [
    		'name' => $request->name,
    		'slug' => str_slug(trim($request->name)),
    		'created_at' => date('Y-m-d H:m:s'),
    	];
    	DB::table('career')->where('id', $id)->update($data);

    	return redirect()->back()->with('thongbao', 'Sửa ngành nghề thành công.');
    }

    public function getdelete($id) {
    	$career = DB::table('career')->where('id', $id);
    	if(is_null($career->first())) {
    		abort('404');
    	}
    	$career->delete();

    	return redirect()->back()->with('thongbao', 'Xóa ngành nghề thành công.');
    }
}
