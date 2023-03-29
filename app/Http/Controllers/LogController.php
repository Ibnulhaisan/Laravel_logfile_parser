<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{

    public function registration(Request $request)
    {

        $request->validate([

                'email'=>'required|string|email|max:255|unique:admins',
                'password' => 'required|string|min:8|confirmed:password',



            ]
//        [
//        'first_name.required'=>'enter your first name',
//                 'last_name.required'=>'enter your last name',
//                 'email.required'=>'enter your email',
//                 'password.required'=>'enter your password',
//               're_password.required'=>'Does not match password',
//             ]
        );


//
        $data = new User();
        $data->email=$request->email;
        $data->password=$request->password;

        $data->save();

//



//



        // return redirect('/')->with('success', 'Registration successful!');

        return view ('registration');
    }

    public function log(){
     return view('logform');
    }
    public function logout(){
        return view('logout');
    }

    public function authenticate(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function practice(){
        return view('practice');
    }



}
