<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Http\Requests\WorkspaceRequest;
use Auth, DB, Mail, Validator, File, DataTables;

class WorkspaceController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $path = URL('/uploads/workspace/').'/';

                $data = Workspace::select('id', 'title', 'sub_title', 
                                        DB::Raw("CONCAT(SUBSTRING(".'description'.", 1, 30), '...') as description"),
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE 'default.png'
                                        END as image"),
                                        DB::Raw("CASE
                                            WHEN ".'cover_image'." != '' THEN CONCAT("."'".$path."'".", ".'cover_image'.")
                                            ELSE 'default.png'
                                        END as cover_image"),
                                        'status'
                                    )
                                ->orderBy('id', 'desc')
                                ->get();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            return ' <div class="btn-group">
                                            <a href="'.route('admin.workspace.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;
                                            <a href="'.route('admin.workspace.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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

                        ->editColumn('image', function($data) {
                            return "<img src=".$data->image." alt='Workspace' class='' width='50'>";
                        })

                        ->editColumn('cover_image', function($data) {
                            return "<img src=".$data->cover_image." alt='Workspace' class='' width='50'>";
                        })

                        ->rawColumns(['action', 'status', 'image', 'cover_image'])
                        ->make(true);
            }

            return view('admin.workspace.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            return view('admin.workspace.create');
        }
    /** create */

    /** insert */
        public function insert(WorkspaceRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $crud = [
                    'title' => ucfirst($request->title),
                    'sub_title' => ucfirst($request->sub_title),
                    'description' => $request->description,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => auth()->user()->id,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $folder_to_upload = public_path().'/uploads/workspace/';
                
                if (!File::exists($folder_to_upload))
                    File::makeDirectory($folder_to_upload, 0777, true, true);

                if(!empty($request->image)){
                    $file = $request->image;
                    $filenameWithExtension = $request->image->getClientOriginalName();
                    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                    $extension = $request->image->getClientOriginalExtension();
                    $filenameToStore = time()."_".$filename.'.'.$extension;

                    $crud["image"] = $filenameToStore;
                }else{
                    $crud["image"] = 'default.png';
                }
                
                if(!empty($request->cover_image)){
                    $cover_file = $request->cover_image;
                    $cover_filenameWithExtension = $request->cover_image->getClientOriginalName();
                    $cover_filename = pathinfo($cover_filenameWithExtension, PATHINFO_FILENAME);
                    $extension = $request->cover_image->getClientOriginalExtension();
                    $cover_filenameToStore = time()."_".$cover_filename.'.'.$extension;

                    $crud["cover_image"] = $cover_filenameToStore;
                }else{
                    $crud["cover_image"] = 'default.png';
                }

                $last_id = Workspace::insertGetId($crud);

                if($last_id){
                    if(!empty($request->image))
                        $file->move($folder_to_upload, $filenameToStore);

                    if(!empty($request->cover_image))
                        $cover_file->move($folder_to_upload, $cover_filenameToStore);
                    
                    return redirect()->route('admin.workspace')->with('success', 'Record inserted successfully');
                }else{
                    return redirect()->back()->with('error', 'Faild to insert record')->withInput();
                }
            }else{
                return redirect()->route('admin.workspace')->with('error', 'Something went wrong');
            }
        }
    /** insert */

    /** view */
        public function view(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.workspace')->with('error', 'Something went wrong');

            $id = base64_decode($id);
            $path = URL('/uploads/workspace/').'/';

            $data = Workspace::select('id', 'title', 'sub_title', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE 'default.png'
                                        END as image"),
                                        DB::Raw("CASE
                                            WHEN ".'cover_image'." != '' THEN CONCAT("."'".$path."'".", ".'cover_image'.")
                                            ELSE 'default.png'
                                        END as cover_image")
                                    )
                                    ->where(['id' => $id])->first();
            
            if($data)
                return view('admin.workspace.view')->with(['data' => $data]);
            else
                return redirect()->route('admin.workspace')->with('error', 'No data found');
        }
    /** view */

    /** edit */
        public function edit(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.workspace')->with('error', 'Something went wrong');

            $id = base64_decode($id);
            $path = URL('/uploads/workspace/').'/';

            $data = Workspace::select('id', 'title', 'sub_title', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE 'default.png'
                                        END as image"),
                                        DB::Raw("CASE
                                            WHEN ".'cover_image'." != '' THEN CONCAT("."'".$path."'".", ".'cover_image'.")
                                            ELSE 'default.png'
                                        END as cover_image")
                                    )
                                    ->where(['id' => $id])->first();
            
            if($data)
                return view('admin.workspace.edit')->with(['data' => $data]);
            else
                return redirect()->route('admin.workspace')->with('error', 'No data found');
        }
    /** edit */ 

    /** update */
        public function update(WorkspaceRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $id = $request->id;
                $exst_record = Workspace::where(['id' => $id])->first();

                $crud = [
                    'title' => ucfirst($request->title),
                    'sub_title' => ucfirst($request->sub_title),
                    'description' => $request->description,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $folder_to_upload = public_path().'/uploads/workspace/';
                
                if (!File::exists($folder_to_upload))
                    File::makeDirectory($folder_to_upload, 0777, true, true);

                if(!empty($request->image)){
                    $file = $request->image;
                    $filenameWithExtension = $request->image->getClientOriginalName();
                    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                    $extension = $request->image->getClientOriginalExtension();
                    $filenameToStore = time()."_".$filename.'.'.$extension;

                    $crud["image"] = $filenameToStore;
                }else{
                    $crud["image"] = $exst_record->image;
                }
                
                if(!empty($request->cover_image)){
                    $cover_file = $request->cover_image;
                    $cover_filenameWithExtension = $request->cover_image->getClientOriginalName();
                    $cover_filename = pathinfo($cover_filenameWithExtension, PATHINFO_FILENAME);
                    $extension = $request->cover_image->getClientOriginalExtension();
                    $cover_filenameToStore = time()."_".$cover_filename.'.'.$extension;

                    $crud["cover_image"] = $cover_filenameToStore;
                }else{
                    $crud["cover_image"] = $exst_record->cover_image;
                }
                
                $update = Workspace::where(['id' => $id])->update($crud);

                if($update){
                    if(!empty($request->image)){
                        $file->move($folder_to_upload, $filenameToStore);

                        $path = public_path()."/uploads/workspace/".$exst_record->image;
                        @unlink($path);
                    }

                    if(!empty($request->cover_image)){
                        $cover_file->move($folder_to_upload, $cover_filenameToStore);

                        $path = public_path()."/uploads/workspace/".$exst_record->cover_image;
                        @unlink($path);
                    }

                    return redirect()->route('admin.workspace')->with('success', 'Record updated successfully');
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

                $data = Workspace::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete'){
                        $update = Workspace::where(['id' => $id])->delete();

                        $path = public_path()."/uploads/workspace/".$data->image;
                        @unlink($path);
                        
                        $cover_path = public_path()."/uploads/workspace/".$data->cover_image;
                        @unlink($cover_path);
                    }else{
                        $update = Workspace::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
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
