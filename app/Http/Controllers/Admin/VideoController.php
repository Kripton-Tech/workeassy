<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Requests\VideoRequest;
use Auth, DB, Mail, Validator, File, DataTables;

class VideoController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $data = Video::select('id', DB::Raw("CONCAT(SUBSTRING(".'link'.", 1, 30), '...') as link"), 'status')->orderBy('id', 'desc')->get();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            return ' <div class="btn-group">
                                            <a href="'.route('admin.video.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;
                                            <a href="'.route('admin.video.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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

            return view('admin.video.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            return view('admin.video.create');
        }
    /** create */

    /** insert */
        public function insert(VideoRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $crud = [
                    'link' => $request->link,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => auth()->user()->id,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $last_id = Video::insertGetId($crud);

                if($last_id)
                    return redirect()->route('admin.video')->with('success', 'Record inserted successfully');
                else
                    return redirect()->back()->with('error', 'Faild to insert record')->withInput();
            }else{
                return redirect()->route('admin.video')->with('error', 'Something went wrong');
            }
        }
    /** insert */

    /** view */
        public function view(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.video')->with('error', 'Something went wrong');

            $id = base64_decode($id);

            $data = Video::select('id', 'link')->where(['id' => $id])->first();
            
            if($data)
                return view('admin.video.view')->with(['data' => $data]);
            else
                return redirect()->route('admin.video')->with('error', 'No data found');
        }
    /** view */

    /** edit */
        public function edit(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.video')->with('error', 'Something went wrong');

            $id = base64_decode($id);

            $data = Video::select('id', 'link')->where(['id' => $id])->first();
            
            if($data)
                return view('admin.video.edit')->with(['data' => $data]);
            else
                return redirect()->route('admin.video')->with('error', 'No data found');
        }
    /** edit */ 

    /** update */
        public function update(VideoRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $id = $request->id;
                $exst_record = Video::where(['id' => $id])->first();

                $crud = [
                    'link' => $request->link,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $update = Video::where(['id' => $id])->update($crud);

                if($update)
                    return redirect()->route('admin.video')->with('success', 'Record updated successfully');
                else
                    return redirect()->back()->with('error', 'Faild to updated record')->withInput();
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

                $data = Video::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete'){
                        $update = Video::where(['id' => $id])->delete();
                    }else{
                        $update = Video::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
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
