<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Workspace;
use App\Models\Toward;
use App\Models\About;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Testimonial;
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
        $options = Workspace::select('id', 'title', DB::Raw("CONCAT(SUBSTRING(".'description'.", 1, 120), '...') as description"),
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$option_path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$option_path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();
                                
        $toward_path = URL('uploads/toward').'/';
        $towards = Toward::select('id', 'title',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$toward_path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$toward_path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();
                                
        $abouts_path = URL('uploads/about').'/';
        $abouts = About::select('id', 'title', DB::Raw("CONCAT(SUBSTRING(".'description'.", 1, 150), '...') as description"),
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$abouts_path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$abouts_path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();

        $testimonial_path = URL('uploads/testimonial').'/';
        $testimonials = Testimonial::select('id', 'name', 'title', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$testimonial_path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$testimonial_path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();

        return view('front.index')->with(['sliders' => $sliders, 'options' => $options, 'towards' => $towards, 'abouts' => $abouts, 'testimonials' => $testimonials]);
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
        $path = URL('uploads/about').'/';
        $data = About::select('id', 'title', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                        END as image")
                                    )
                                ->where(['status' => 'active'])
                                ->get();

        return view('front.about')->with(['data' => $data]);
    }

    public function gallery(Request $request){
        $categories = GalleryCategory::select('id', 'title')->where(['status' => 'active'])->get();

        $path = URL('uploads/gallery').'/';
        $data = DB::table('galleries as g')
                    ->select('g.id', 'g.category_id', 'gc.title as title',
                                DB::Raw("CASE
                                    WHEN ".'g.image'." != '' THEN CONCAT("."'".$path."'".", ".'g.image'.")
                                    ELSE CONCAT("."'".$path."'".", 'default.png')
                                END as image")
                            )
                    ->leftjoin('galleries_categories as gc', 'gc.id', 'g.category_id')
                    ->where(['g.status' => 'active'])
                    ->get();

        return view('front.gallery')->with(['categories' => $categories, 'data' => $data]);
    }

    public function faq(Request $request){
        $data = Faq::select('id', 'title', 'description')->where(['status' => 'active'])->get();

        return view('front.faq')->with(['data' => $data]);
    }

    public function learneasy(Request $request){
        return view('front.learneasy');
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
        
        if($process){
            $to = _settings('MAIL_FROM_ADDRESS');

            $data = [
                'name' => $request->name,
                'email' => $request->email, 
                'subject' => $request->subject, 
                'message' => $request->message, 
                'from_email' => _settings('MAIL_FROM_ADDRESS'),
                'logo' => _logo()
            ];

            try{
                Mail::to($to)->send(new ContactUs($data));

                return response('OK');
            }catch(\Exception $e){
                return response('OK');
            }
        }else{
            return response('NO');
        }
    }

    public function blogs(Request $request){
        return view('front.blogs');
    }

    public function blog(Request $request, $id=''){
        return view('front.blog');
    }
}
