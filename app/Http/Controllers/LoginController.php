<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function authenticate(LoginRequest $request) {
        // $validator = $request->validate([
        //     'email' => 'required',
        //     'password' => 'required|min:6'
        // ]);
        if($request->result == ($request->num1 + $request->num2)) {
            $attributes = $request->only(['email', 'password']);
            if(Auth::attempt($attributes)) {
                return redirect('/')->with(['success' => 'You are logged in']);
            }
        }
        else if($request->result == null) {
            return redirect()->back()->with(['error' => 'Addition is required']);
        }
        else {
            return redirect()->back()->with(['error' => 'Addition is wrong']);
        } 
        
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return back();
    }
}
