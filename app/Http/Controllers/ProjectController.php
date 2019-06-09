<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\project;
use Storage;

class ProjectController extends Controller
{
    public function getlist() {
    	$project = project::all();
    	return view('admin.project.list', compact('project'));
    }

    public function getadd() {
    	return view('admin.project.add');
    }

    public function postadd(Request $request) {
    	$this->validate($request,
    		[
    			'name' => 'required|min:4|max:1024',
    			'content' => 'required',
    			'image1' => 'required|image',
    			'image2' => 'image',
    			'image3' => 'image',
    			'image4' => 'image',
    		],
    		[
    			'name.required' => 'Tên dự án không được để trống.',
    			'name.min' => 'Tên dự án có độ dài từ 6 đến 1024 ký tự.',
    			'name.max' => 'Tên dự án có độ dài từ 6 đến 1024 ký tự.',
    			'content.required' => 'Nội dung dự án không được để trống.',
    			'image1.required' => 'Hình ảnh dự án không được để trống',
    			'image1.image' => 'Hình ảnh dự án không hợp lệ.',
    			'image2.image' => 'Hình ảnh dự án không hợp lệ.',
    			'image3.image' => 'Hình ảnh dự án không hợp lệ.',
    			'image4.image' => 'Hình ảnh dự án không hợp lệ.',
    		]);
    	$data = [
    		'name' => $request->name,
    		'content' => $request->content,
    		'created_at' => date('Y-m-d H:m:s'),
    	];
    	if($request->hasFile('image1'))
        {
            $file = $request->file('image1');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image1'] = $image;
        }
        // dd($data);
        if($request->hasFile('image2'))
        {
            $file = $request->file('image2');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image2'] = $image;
        }
        if($request->hasFile('image3'))
        {
            $file = $request->file('image3');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image3'] = $image;
        }
        if($request->hasFile('image4'))
        {
            $file = $request->file('image4');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image4'] = $image;
        }
        DB::table('project')->insert($data);

        return redirect()->back()->with('thongbao', 'Thêm dự án thành công.');
    }

    public function getedit($id) {
    	$project = project::find($id);
    	if(is_null($project)) {
    		abort('404');
    	}
    	return view('admin.project.edit', compact('project'));
    }

    public function postedit(Request $request, $id) {
    	$project = project::find($id);
    	if(is_null($project)) {
    		abort('404');
    	}
    	$this->validate($request,
    		[
    			'name' => 'required|name|min:4|max:1024',
    			'content' => 'required',
    			'image1' => 'image',
    			'image2' => 'image',
    			'image3' => 'image',
    			'image4' => 'image',
    		],
    		[
    			'name.required' => 'Tên dự án không được để trống.',
    			'name.name' => 'Tên dự án không hợp lệ.',
    			'name.min' => 'Tên dự án có độ dài từ 6 đến 1024 ký tự.',
    			'name.max' => 'Tên dự án có độ dài từ 6 đến 1024 ký tự.',
    			'content.required' => 'Nội dung dự án không được để trống.',
    			'image1.image' => 'Hình ảnh dự án không hợp lệ.',
    			'image2.image' => 'Hình ảnh dự án không hợp lệ.',
    			'image3.image' => 'Hình ảnh dự án không hợp lệ.',
    			'image4.image' => 'Hình ảnh dự án không hợp lệ.',
    		]);
    	$data = [
    		'name' => $request->name,
    		'content' => $request->content,
    		'created_at' => date('Y-m-d H:m:s'),
    	];
    	$project = DB::table('project')->where('id',$id)->select('image1', 'image2', 'image3', 'image4')->first();
    	if($request->hasFile('image1'))
        {
            $file = $request->file('image1');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image1'] = $image;
            if(!is_null($project->image1)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $project->image1);
            	Storage::delete($image_delete);
            }
        }
        if($request->hasFile('image2'))
        {
            $file = $request->file('image2');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image2'] = $image;
            if(!is_null($project->image2)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $project->image2);
            	Storage::delete($image_delete);
            }
        }
        if($request->hasFile('image3'))
        {
            $file = $request->file('image3');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image3'] = $image;
            if(!is_null($project->image3)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $project->image3);
            	Storage::delete($image_delete);
            }
        }
        if($request->hasFile('image4'))
        {
            $file = $request->file('image4');
            $new_name_image = rand(1,999999) . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/uploads', $file, $new_name_image
            );
            $image = env('APP_URL').Storage::url($path);
            $data['image4'] = $image;
            if(!is_null($project->image4)) {
            	$image_delete = str_replace(env('APP_URL').'/storage', 'public', $project->image4);
            	Storage::delete($image_delete);
            }
        }
        DB::table('project')->where('id',$id)->update($data);
    	return redirect()->back()->with('thongbao', 'Sửa dự án thành công.');
    }

    public function getdelete($id) {
    	$project = project::find($id);
    	if(is_null($project)) {
    		abort('404');
    	}
    	$project->delete();

    	return redirect()->back()->with('thongbao', 'Xóa dự án thành công.');
    }
}
