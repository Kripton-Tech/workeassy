<?php    

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth, DB, Mail, Validator, File, DataTables;

class DashboardController extends Controller{
    /** index */
        public function index(Request $request){
            $data = [];

            return view('admin.dashboard', ['data' => $data]);
        }
    /** index */
}