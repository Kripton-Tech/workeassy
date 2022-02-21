<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Http\Requests\FaqRequest;
use Auth, DB, Mail, Validator, File, DataTables;

class FaqController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $data = Faq::select('id', 'title', 
                                        DB::Raw("CONCAT(SUBSTRING(".'description'.", 1, 30), '...') as description"),
                                        'status'
                                    )
                                ->orderBy('id', 'desc')
                                ->get();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            return ' <div class="btn-group">
                                            <a href="'.route('admin.faq.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;
                                            <a href="'.route('admin.faq.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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

            return view('admin.faq.index');
        }
    /** index */

    /** create */
        public function create(Request $request){
            return view('admin.faq.create');
        }
    /** create */

    /** insert */
        public function insert(FaqRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $crud = [
                    'title' => ucfirst($request->title),
                    'description' => $request->description,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => auth()->user()->id,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $last_id = Faq::insertGetId($crud);

                if($last_id){
                    return redirect()->route('admin.faq')->with('success', 'Record inserted successfully');
                }else{
                    return redirect()->back()->with('error', 'Faild to insert record')->withInput();
                }
            }else{
                return redirect()->route('admin.faq')->with('error', 'Something went wrong');
            }
        }
    /** insert */

    /** view */
        public function view(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.faq')->with('error', 'Something went wrong');

            $id = base64_decode($id);

            $data = Faq::select('id', 'title', 'description')->where(['id' => $id])->first();
            
            if($data)
                return view('admin.faq.view')->with(['data' => $data]);
            else
                return redirect()->route('admin.faq')->with('error', 'No data found');
        }
    /** view */

    /** edit */
        public function edit(Request $request, $id=''){
            if($id == '')
                return redirect()->route('admin.faq')->with('error', 'Something went wrong');

            $id = base64_decode($id);

            $data = Faq::select('id', 'title', 'description')->where(['id' => $id])->first();
            
            if($data)
                return view('admin.faq.edit')->with(['data' => $data]);
            else
                return redirect()->route('admin.faq')->with('error', 'No data found');
        }
    /** edit */ 

    /** update */
        public function update(FaqRequest $request){
            if($request->ajax()){ return true; }

            if(!empty($request->all())){
                $id = $request->id;
                $exst_record = Faq::where(['id' => $id])->first();

                $crud = [
                    'title' => ucfirst($request->title),
                    'description' => $request->description,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->id
                ];

                $update = Faq::where(['id' => $id])->update($crud);

                if($update){
                    return redirect()->route('admin.faq')->with('success', 'Record updated successfully');
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

                $data = Faq::where(['id' => $id])->first();

                if(!empty($data)){
                    if($status == 'delete'){
                        $update = Faq::where(['id' => $id])->delete();
                    }else{
                        $update = Faq::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
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
