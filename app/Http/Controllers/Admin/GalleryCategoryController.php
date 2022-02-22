<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use App\Http\Requests\GalleryCategoryRequest;
use Auth, DB, Mail, Validator, File, DataTables;

class GalleryCategoryController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $data = GalleryCategory::select('id', 'title')
                                ->orderBy('id', 'desc')
                                ->get();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            return ' <div class="btn-group">
                                            <a href="'.route('admin.galleries-category.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;
                                            <a href="'.route('admin.galleries-category.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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

                        ->editColumn('status', function($data) {
                            if($data->status == 'active')
                                return '<span class="badge badge-pill badge-success">Active</span>';
                            else if($data->status == 'inactive')
                                return '<span class="badge badge-pill badge-warning">Inactive</span>';
                            else
                                return '-';
                        })

                        ->rawColumns(['action', 'status'])
                        ->make(true);
            }

            return view('admin.gallery-category.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            return view('admin.gallery-category.create');
        }
    /** create */

    /** insert */
        public function insert(GalleryCategoryRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $crud = [
                    'title' => ucfirst($request->title),
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => auth()->user()->id,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $last_id = GalleryCategory::insertGetId($crud);

                if($last_id){
                    return redirect()->route('admin.galleries-category')->with('success', 'Record inserted successfully');
                }else{
                    return redirect()->back()->with('error', 'Faild to insert record')->withInput();
                }
            }else{
                return redirect()->route('admin.galleries-category')->with('error', 'Something went wrong');
            }
        }
    /** insert */

    /** view */
        public function view(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.galleries-category')->with('error', 'Something went wrong');

            $id = base64_decode($id);

            $data = GalleryCategory::select('id', 'title')->where(['id' => $id])->first();
            
            if($data)
                return view('admin.gallery-category.view')->with(['data' => $data]);
            else
                return redirect()->route('admin.galleries-category')->with('error', 'No data found');
        }
    /** view */

    /** edit */
        public function edit(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.galleries-category')->with('error', 'Something went wrong');

            $id = base64_decode($id);

            $data = GalleryCategory::select('id', 'title')->where(['id' => $id])->first();
            
            if($data)
                return view('admin.gallery-category.edit')->with(['data' => $data]);
            else
                return redirect()->route('admin.galleries-category')->with('error', 'No data found');
        }
    /** edit */ 

    /** update */
        public function update(GalleryCategoryRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $id = $request->id;
                $exst_record = GalleryCategory::where(['id' => $id])->first();

                $crud = [
                    'title' => ucfirst($request->title),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $update = GalleryCategory::where(['id' => $id])->update($crud);

                if($update){
                    return redirect()->route('admin.galleries-category')->with('success', 'Record updated successfully');
                }else{
                    return redirect()->back()->with('error', 'Faild to updated record')->withInput();
                }
            }else{
                return redirect()->back()->with('error', 'Something went wrong')->withInput();
            }
        }
    /** update */ 

    /** change-status */
        public function change_status(Request $request){
            if(!$request->ajax()){ exit('No direct script access allowed'); }

            if(!empty($request->all())){
                $id = base64_decode($request->id);
                $status = $request->status;

                $data = GalleryCategory::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete'){
                        $update = GalleryCategory::where(['id' => $id])->delete();
                    }else{
                        $update = GalleryCategory::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
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
