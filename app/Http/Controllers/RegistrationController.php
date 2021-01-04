<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistrationRequest;
use App\Traits\RegisterUser;

class RegistrationController extends Controller
{
    use RegisterUser;
    public function show()
    {
        return view('register');
    }

    public function register(RegistrationRequest $request)
    {
        // $validator = $request->validate([
        //   'name'      => 'required|min:1',
        //   'email'     => 'required',
        //   'password'  => 'required|min:6'
        // ]);

        // User::create($validator);
        // return redirect('/login');

        $user = $this->registerUser($request);
        return redirect('/login')->with(['success' => 'You are registered, please login']);
     }
}
