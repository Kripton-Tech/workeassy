<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
// use App\Models\Category;
// use App\Models\Portfolio;
use App\Http\Requests\ContactRequest;
use DB, Mail;
use Carbon\Carbon;

class RootController extends Controller{
    public function index(Request $request){
        // $categories = Category::select('id', 'title')->where(['status' => 'active'])->get();

        // $path = URL('uploads/portfolio').'/';
        // $portfolios = DB::table('portfolios as p')
        //                     ->select('p.id', 'p.category_id', 'p.title', 'c.title as category_title',
        //                                 DB::Raw("CASE
        //                                     WHEN ".'p.image'." != '' THEN CONCAT("."'".$path."'".", ".'p.image'.")
        //                                     ELSE CONCAT("."'".$path."'".", 'default.png')
        //                                 END as image")
        //                             )
        //                     ->leftjoin('categories as c', 'c.id', 'p.category_id')
        //                     ->where(['p.status' => 'active'])
        //                     ->get();

        // return view('front.index')->with(['categories' => $categories, 'portfolios' => $portfolios]);
        return view('front.index');
    }

    public function about(Request $request){
        return view('front.about');
    }

    public function contact(Request $request){
        return view('front.contact');
    }

    public function contactus(ContactRequest $request){
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => 'n',
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s')
        ];

        $process = Contact::insert($input);
        
        if($process)
            return response('OK');
        else
            return response('NO');
    }
}
