<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use Auth, DB, Mail, Validator, File, DataTables;

class GalleryController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $path = URL('/uploads/gallery/').'/';

                $data = Gallery::select('id', 
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE 'default.png'
                                        END as image"),
                                        'status'
                                    )
                                ->orderBy('id', 'desc')
                                ->get();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            return ' <div class="btn-group">
                                            <a href="'.route('admin.gallery.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;
                                            <a href="'.route('admin.gallery.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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
                            return "<img src=".$data->image." alt='Gallery' class='' width='50'>";
                        })


                        ->rawColumns(['action', 'status', 'image'])
                        ->make(true);
            }

            return view('admin.gallery.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            return view('admin.gallery.create');
        }
    /** create */

    /** insert */
        public function insert(GalleryRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $crud = [
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => auth()->user()->id,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $folder_to_upload = public_path().'/uploads/gallery/';
                
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

                $last_id = Gallery::insertGetId($crud);

                if($last_id){
                    if(!empty($request->image))
                        $file->move($folder_to_upload, $filenameToStore);
                    
                    return redirect()->route('admin.gallery')->with('success', 'Record inserted successfully');
                }else{
                    return redirect()->back()->with('error', 'Faild to insert record')->withInput();
                }
            }else{
                return redirect()->route('admin.gallery')->with('error', 'Something went wrong');
            }
        }
    /** insert */

    /** view */
        public function view(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.gallery')->with('error', 'Something went wrong');

            $id = base64_decode($id);
            $path = URL('/uploads/gallery/').'/';

            $data = Gallery::select('id',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE 'default.png'
                                        END as image")
                                    )
                                    ->where(['id' => $id])->first();
            
            if($data)
                return view('admin.gallery.view')->with(['data' => $data]);
            else
                return redirect()->route('admin.gallery')->with('error', 'No data found');
        }
    /** view */

    /** edit */
        public function edit(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.gallery')->with('error', 'Something went wrong');

            $id = base64_decode($id);
            $path = URL('/uploads/gallery/').'/';

            $data = Gallery::select('id',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE 'default.png'
                                        END as image")
                                    )
                                    ->where(['id' => $id])->first();
            
            if($data)
                return view('admin.gallery.edit')->with(['data' => $data]);
            else
                return redirect()->route('admin.gallery')->with('error', 'No data found');
        }
    /** edit */ 

    /** update */
        public function update(GalleryRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $id = $request->id;
                $exst_record = Gallery::where(['id' => $id])->first();

                $crud = [
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $folder_to_upload = public_path().'/uploads/gallery/';
                
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
                
                $update = Gallery::where(['id' => $id])->update($crud);

                if($update){
                    if(!empty($request->image)){
                        $file->move($folder_to_upload, $filenameToStore);

                        $path = public_path()."/uploads/gallery/".$exst_record->image;
                        @unlink($path);
                    }

                    return redirect()->route('admin.gallery')->with('success', 'Record updated successfully');
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

                $data = Gallery::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete'){
                        $update = Gallery::where(['id' => $id])->delete();

                        $path = public_path()."/uploads/gallery/".$data->image;
                        @unlink($path);
                    }else{
                        $update = Gallery::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
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
