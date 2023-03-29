<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Signmodel;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function submit(Request $request)
    {

        $request->validate([
           'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
             'email'=>'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed:password',
            're_password'=>'required|string|min:8|confirmed:re_password',


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
        public function submit(Request $request)
    {

        $request->validate([
                'first_name'=>'required|string|max:255',
                'last_name'=>'required|string|max:255',
                'email'=>'required|string|email|max:255|unique:admins',
                'password' => 'required|string|min:8|confirmed:password',
                're_password'=>'required|string|min:8|confirmed:re_password',


            ]
//        [
//        'first_name.required'=>'enter your first name',jobs
//                 'last_name.required'=>'enter your last name',
//                 'email.required'=>'enter your email',
//                 'password.required'=>'enter your password',
//               're_password.required'=>'Does not match password',
//             ]
        );


//
        $data = new Admin();
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->password=$request->password;

        $data->save();

//



//



       // return redirect('/')->with('success', 'Registration successful!');

        return view ('homepage')->with('success', 'Registration successful!');
    }

    public function query(){

       $data = select first_name,last_name,email,password from admins where id = 1;



    }
}
