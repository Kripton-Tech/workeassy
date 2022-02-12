<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgetPassword;
use Illuminate\Support\Str;
use Auth, Validator, DB, Mail;

class AuthController extends Controller{
    /** login */
        public function login(Request $request){
            return view('admin.auth.login');
        }
    /** login */

    /** signin */
        public function signin(Request $request){
            $validator = Validator::make(
                                        ['email' => $request->email, 'password' => $request->password],
                                        ['email' => 'required', 'password' => 'required']
                                    );

            if($validator->fails()){
                return redirect()->route('admin.login')->withErrors($validator)->withInput();
            }else{
                $auth = (auth()->attempt(['email' => $request->email, 'password' => $request->password]) || auth()->attempt(['phone' => $request->email, 'password' => $request->password]));

                if($auth != false){
                    $user = auth()->user();

                    if($user->status == 'inactive'){
                        Auth::logout();
                        return redirect()->route('admin.login')->with('error', 'Account belongs to this credentials is inactive, please contact administrator');
                    }elseif($user->status == 'deleted'){
                        Auth::logout();
                        return redirect()->route('admin.login')->with('error', 'Account belongs to this credentials is deleted, please contact administrator');
                    }else{
                        return redirect()->route('admin.dashboard')->with('success', 'Login successfully');
                    }
                }else{
                    return redirect()->route('admin.login')->with('error', 'invalid credentials, please check credentials');
                }
            }
        }
    /** signin */

    /** logout */
        public function logout(Request $request){
            Auth::logout();
            return redirect()->route('admin.login');
        }
    /** logout */

    /** forget-password */
        public function forget_password(Request $request){
            return view('admin.auth.forget-password');
        }
    /** forget-password */

    /** password-forget */
        public function password_forget(Request $request){
            $user = DB::table('users')->where(['email' => $request->email])->first();

            if(!isset($user) && $user == null) {
                return redirect()->back()->withErrors(['email' => 'Entered email address does not exists in records, please check email address']);
            }

            $token = Str::random(60);
            $link = url('/admin/reset-password').'/'.$token.'?email='.urlencode($user->email);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $mailData = array('from_email' => _mail_from(), 'email' => $request->email, 'link' => $link);
            
            try{
                Mail::to($request->email)->send(new ForgetPassword($mailData));

                return redirect()->route('admin.login')->with('success', 'please check your email and follow steps for reset password');
            }catch(\Exception $e){
                DB::table('password_resets')->where(['email' => $request->email])->delete();
                return redirect()->route('admin.login')->with('error', 'something went wrong, please try again later');
            }
        }
    /** password-forget */

    /** reset-password */
        public function reset_password(Request $request, $string){
            $email = $request->email;
            return view('admin.auth.reset_password', compact('email', 'string'));
        }
    /** reset-password */

    /** recover-password */
        public function recover_password(Request $request){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
                'token' => 'required'
            ]);

            if($validator->fails())
                return redirect()->back()->withErrors($validator)->withInput();

            $tokenData = \DB::table('password_resets')->where('token', $request->token)->OrderBy('created_at', 'desc')->first();

            if(!isset($tokenData) && $tokenData == null)
                return redirect()->route('admin.login')->with('error', 'Reset password token mismatch, Please regenerate link again')->withInput();

            $user = \DB::table('users')->where('email', $request->email)->first();

            if(!isset($user) && $user == null)
                return redirect()->back()->with('error', 'Email address does not exists, Please check email address')->withInput();

            $crud = array(
                'password' => bcrypt($request->password),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('users')->where('email', $request->email)->limit(1)->update($crud);

            DB::table('password_resets')->where('email', $user->email)->delete();

            return redirect()->route('admin.login')->with('success', 'Password resetted successgully');
        }
    /** recover-password */
}
