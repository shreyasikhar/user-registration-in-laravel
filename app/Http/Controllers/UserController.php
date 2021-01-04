<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;  // Import Hash facade


class UserController extends Controller
{
    public function forgotPassword()
    {
        return view('forgot');
    }

    public function getEmail(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->get();
        if($user[0]->email)
        {
            $token = bin2hex(openssl_random_pseudo_bytes(20));
            Mail::to($request->email)->send(new ForgotPassword($request->email, $token));
            DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token]);
            // token needs to send
            return redirect('/forgot')->with(['success' => 'You will receive email to reset password']);
        }
        else {
            return redirect('/forgot')->with(['error' => 'Your email is not found in our records']);
        }
    }

    public function resetPassword($token)
    {
        return view('resetPassword', ['token' => $token]);
    }

    public function submitResetPassword(Request $request)
    {
        $checkmail = DB::table('password_resets')->where('token', $request->reset_token)->get();
        if(isset($checkmail[0]->email)) {
            $password = Hash::make($request->password);
            DB::table('users')->update(['password' => $password]);
            DB::table('password_resets')->where('token', $request->reset_token)->delete();
            return redirect('/login')->with(['success' => 'Password Reset Successful, Please login']);
        }
        else {
            return redirect('/forgot')->with(['error' => 'Reset Password URL not valid, please request email again']);
        }
    }

}
