<?php    

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Contact;
use Auth, DB, Mail, Validator, File, DataTables;

class DashboardController extends Controller{
    /** index */
        public function index(Request $request){
            $data = [];

            $contactus = Contact::select('id', 'name', 'email', 'subject',
                                    DB::Raw("CONCAT(SUBSTRING(".'message'.", 1, 30), '...') as message"),
                                )
                                ->where(['is_read' => 'n'])
                                ->get();
                                
            $data['contactus'] = $contactus;

            return view('admin.dashboard', ['data' => $data]);
        }
    /** index */
}