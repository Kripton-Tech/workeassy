<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Workspace;
use App\Models\Video;
use App\Http\Requests\ContactRequest;
use DB, Mail;
use Carbon\Carbon;

class RootController extends Controller{
    public function index(Request $request){
        $slider_path = URL('uploads/slider').'/';
        $sliders = Slider::select('id', 'title',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$slider_path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$slider_path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();

        $option_path = URL('uploads/workspace').'/';
        $options = Workspace::select('id', 'title', DB::Raw("CONCAT(SUBSTRING(".'description'.", 1, 100), '...') as description"),
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$option_path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$option_path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();

        return view('front.index')->with(['sliders' => $sliders, 'options' => $options]);
    }

    public function option(Request $request, $id=""){
        if($id == '')
            return redirec()->back();

        $id = base64_decode($id);

        $path = URL('uploads/workspace').'/';
        $data = Workspace::select('id', 'title', 'sub_title', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                        END as image"),
                                        DB::Raw("CASE
                                            WHEN ".'cover_image'." != '' THEN CONCAT("."'".$path."'".", ".'cover_image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                        END as cover_image")
                                    )
                                ->where(['id' => $id])
                                ->first();

        return view('front.option')->with(['data' => $data]);
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
