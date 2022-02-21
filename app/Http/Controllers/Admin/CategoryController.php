<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use DB, File, DataTables;

class CategoryController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $data = Category::orderBy('id', 'desc')->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        return '<div class="btn-group">
                                    <a href="'.route('admin.category.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a> &nbsp;
                                    <a href="'.route('admin.category.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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

                    ->editColumn('status', function($data){
                        if($data->status == 'active'){
                            return '<span class="badge badge-pill badge-success">Active</span>';
                        }elseif($data->status == 'inactive'){
                            return '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }else{
                            return '-';
                        }
                    })
                
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }

            return view('admin.category.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            return view('admin.category.create');
        }
    /** create */

    /** insert */
        public function insert(CategoryRequest $request){
            if($request->ajax()) { return true; }
        
            $input = [
                'name' => ucfirst($request->name),
                'discription' => $request->discription ?? NULL,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];

            $operation = Category::create($input);

            if($operation)            
                return redirect()->route('admin.category')->with('success', 'Record inserted successfully');
            else
                return redirect()->back()->with('error', 'Failed to insert record')->withInput();
        }
    /** insert */

    /** edit */
        public function edit(Request $request, $id = ''){
            if(isset($id) && $id != '' && $id != null)
                $id = base64_decode($id);
            else
                return redirect()->route('admin.category')->with('error', 'Something went wrong');

            $data = Category::select('id', 'name', 'discription')->where(['id' => $id])->first();

            return view('admin.category.edit')->with(['data' => $data]);
        }
    /** edit */

    /** update */
        public function update(CategoryRequest $request){
            if($request->ajax()) { return true; }

            $input = [
                'name' => ucfirst($request->name),
                'discription' => $request->discription,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];

            $operation = Category::where(['id' => $request->id])->update($input);

            if($operation)
                return redirect()->route('admin.category')->with('success', 'Record updated successfully');
            else
                return redirect()->back()->with('error', 'Failed to update record')->withInput();
        }
    /** update */

    /** view */
        public function view(Request $request, $id = ''){
            if(isset($id) && $id != '' && $id != null)
                $id = base64_decode($id);
            else
                return redirect()->route('admin.category')->with('error', 'Something went wrong');

            $data = Category::select('id', 'name', 'discription')->where(['id' => $id])->first();

            return view('admin.category.view')->with(['data' => $data]);
        }
    /** view */

    /** change-status */
        public function change_status(Request $request){
            if(!$request->ajax()){ exit('No direct script access allowed'); }

            if(!empty($request->all())){
                $id = base64_decode($request->id);
                $status = $request->status;

                $data = Category::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete')
                        $update = Category::where(['id' => $id])->delete();
                    else
                        $update = Category::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
                    
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