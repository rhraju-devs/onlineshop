<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function emailCheckForm()
    {
        return view('frontend.forgetpassword.changepassword');
    }

    public function emailCheckFormStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $email = $request->email;

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('frontend.email.password', ['token' => $token, 'email' => $email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->rotue('frontend.dashboard');
    }

    public function newPassword($token)
    {
        return view('frontend.forgetpassword.newpassword', compact('token'));
    }

    public function newPasswordStore(Request $request)
    {
        // dd($request->all());

        $validate=Validator::make($request->all(),[
            'email' => 'email|requried|exists:users',
            'password'=>'required|confirmed|min:6',
            'password' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
        ->where([
          'email' => $request->email, 
          'token' => $request->token
        ])
        ->first();

        if($validate)
        {
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password),
            ]);
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect()->route('frontend.dashboard');
        }
        else{
            return redirect()->back();
        }


    }

}
