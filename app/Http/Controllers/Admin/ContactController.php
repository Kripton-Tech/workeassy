<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Contact;
use Auth, DB, Mail, Validator, File, DataTables;

class ContactController extends Controller{
    /** index */
        public function index(Request $request){
            if($request->ajax()){
                $data = Contact::all();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            return ' <div class="btn-group">
                                            <a href="'.route('admin.contact.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;
                                            <a href="javascript:;" onclick="delete_sub(this);" data-id="'.base64_encode($data->id).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a> &nbsp;
                                        </div>';
                        })

                        ->rawColumns(['action'])
                        ->make(true);
            }

            return view('admin.contacts.index')->with(['section' => 'Contact Us', 'title' => 'Index']);
        }
    /** index */

    /** view */
        public function view(Request $request, $id=''){
            if($id == '')
                return redirect()->back()->with(['error', 'something went wrong, please try again later']);

            $id= base64_decode($request->id);

            $data = Contact::where(['id' => $id])->first();
            
            if($data){
                if($data->is_read == 'n')
                    Contact::where(['id' => $id])->update(['is_read' => 'y']);

                return view('admin.contacts.view')->with(['section' => 'Contact Us', 'title' => 'View', 'data' => $data]);
            }else{
                return redirect()->back()->with(['error', 'something went wrong, please try again later']);
            }
        }
    /** view */

    /** delete */
        public function delete(Request $request){
            if(!$request->ajax()){ exit('No direct script access allowed'); }

            if(!empty($request->all())){
                $id = base64_decode($request->id);
                
                $data = Contact::where(['id' => $id])->first();
                
                if(!empty($data)){
                    $delete = Contact::where(['id' => $id])->delete();
            
                    if($delete)
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
    /** delete */
}
