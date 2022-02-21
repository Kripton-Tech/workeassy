<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Str;
use DB, File, DataTables;

class BlogController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $data = Blog::orderBy('id', 'desc')->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        return '<div class="btn-group">
                                    <a href="'.route('admin.blog.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a> &nbsp;
                                    <a href="'.route('admin.blog.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a> &nbsp;
                                    <a href="javascript:;" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bars"></i>
                                    </a> &nbsp;
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="active" data-id="' . base64_encode($data->id) . '">Active</a></li>
                                        <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="inactive" data-id="' . base64_encode($data->id) . '">Inactive</a></li>
                                        <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="delete" data-id="' . base64_encode($data->id) . '">Delete</a></li>
                                    </ul>
                                </div>';
                    })

                    ->editColumn('status', function ($data) {
                        if ($data->status == 'active') {
                            return '<span class="badge badge-pill badge-success">Active</span>';
                        } else if ($data->status == 'inactive') {
                            return '<span class="badge badge-pill badge-warning">Inactive</span>';
                        } else {
                            return '-';
                        }
                    })
                    
                    ->editColumn('cover_image', function ($data) {
                        if($data->cover_image != '' || $data->cover_image != null){
                            return '<img src="'.URL("/uploads/blogs/".$data->cover_image).'"style="border-radious:50% ;width:50px ;height:50px"></img>';
                        }
                    })

                    ->rawColumns(['action', 'status', 'cover_image'])
                    ->make(true);
            }

            return view('admin.blog.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            $categories = Category::select('id', 'name')->where(['status' => 'active'])->get();

            return view('admin.blog.create', ['categories' => $categories]);
        }
    /** create */

    /** insert */
        public function insert(BLogRequest $request){
            if ($request->ajax()) { return true; }

            $input = [
                'category_id' => $request->category_id,
                'heading' => $request->heading,
                'body' => $request->body,
                'tags' => $request->tags,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];

            if (!empty($request->file('cover_image'))) {
                $file = $request->file('cover_image');
                $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $filenameToStore = time()."_".$filename.'.'.$extension;

                $folder_to_upload = public_path().'/uploads/blogs/';

                if (!\File::exists($folder_to_upload))
                    \File::makeDirectory($folder_to_upload, 0777, true, true);

                $input['cover_image'] = $filenameToStore;
            } else {
                $input['cover_image'] = 'default.jpg';
            }

            $operation = Blog::create($input);

            if($operation){
                if(!empty($request->file('cover_image')))
                    $file->move($folder_to_upload, $filenameToStore);
                
                return redirect()->route('admin.blog')->with('success', 'Record inserted successfully');
            }else{
                return redirect()->back()->with('error', 'Failed to insert record')->withInput();
            }
        }
    /** insert */

    /** edit */
        public function edit(Request $request, $id = ''){
            if(isset($id) && $id != '' && $id != null)
                $id = base64_decode($id);
            else
                return redirect()->route('admin.blog')->with('error', 'Something went wrong');

            $categories = Category::select('id', 'name')->where(['status' => 'active'])->get();

            $path = URL('backend/uploads/blogs').'/';
            $data = Blog::select('id', 'heading', 'category_id', 'body', 'tags',
                                    DB::Raw("CASE
                                        WHEN ".'cover_image'." != '' THEN CONCAT("."'".$path."'".", ".'cover_image'.")
                                        ELSE CONCAT("."'".$path."'".", 'default.png')
                                    END as cover_image")
                                )
                            ->where(['id' => $id])
                            ->first();

            return view('admin.blog.edit')->with(['data' => $data, 'categories' => $categories]);
        }
    /** edit */

    /** update */
        public function update(BlogRequest $request){
            if($request->ajax()) { return true; }

            $exst_rec = Blog::where(['id' => $request->id])->first();

            $input = [
                'category_id' => $request->category_id,
                'heading' => $request->heading,
                'body' => $request->body,
                'tags' => $request->tags,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];

            if (!empty($request->file('cover_image'))) {
                $file = $request->file('cover_image');
                $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $filenameToStore = time()."_".$filename.'.'.$extension;

                $folder_to_upload = public_path().'/uploads/blogs/';

                if(!\File::exists($folder_to_upload))
                    \File::makeDirectory($folder_to_upload, 0777, true, true);

                $input['cover_image'] = $filenameToStore;
            } else {
                $input['cover_image'] = $exst_rec->cover_image;
            }

            $operation = Blog::where(['id' => $request->id])->update($input);

            if($operation){
                if(!empty($request->file('cover_image'))) 
                    $file->move($folder_to_upload, $filenameToStore);

                return redirect()->route('admin.blog')->with('success', 'Record updated successfully');
            }else{
                return redirect()->back()->with('error', 'Failed to update record')->withInput();
            }
        }
    /** update */

    /** view */
        public function view(Request $request, $id = ''){
            if(isset($id) && $id != '' && $id != null)
                $id = base64_decode($id);
            else
                return redirect()->route('admin.blog')->with('error', 'Something went wrong');

            $categories = Category::select('id', 'name')->where(['status' => 'active'])->get();

            $path = URL('/uploads/blogs').'/';
            $data = Blog::select('id', 'category_id', 'heading', 'body', 'tags',
                                    DB::Raw("CASE
                                        WHEN ".'cover_image'." != '' THEN CONCAT("."'".$path."'".", ".'cover_image'.")
                                        ELSE CONCAT("."'".$path."'".", 'default.png')
                                    END as cover_image")
                                )
                            ->where(['id' => $id])
                            ->first();

            return view('admin.blog.view')->with(['data' => $data, 'categories' => $categories]);
        }
    /** view */

    /** change-status */
        public function change_status(Request $request){
            if(!$request->ajax()){ exit('No direct script access allowed'); }

            if(!empty($request->all())){
                $id = base64_decode($request->id);
                $status = $request->status;

                $data = Blog::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete'){
                        $update = Blog::where(['id' => $id])->delete();

                        $path = public_path()."/uploads/blogs/".$data->image;
                        @unlink($path);
                    }else{
                        $update = Blog::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
                    }
                    
                    if($update)
                        return response()->json(['code' => 200]);
                    else
                        return response()->json(['code' => 201]);
                }else{
                    return response()->json(['code' => 201]);
                }
            }else{
                return response()->json(['code' => 201]);
            }
        }
    /** change-status */
}