<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function create(Request $request) {
        $validatedData = $request -> validate(
            [
                "fname" => 'required|max:200',
                "email" => 'email|required|max:500',
                "role" => 'required',
                "niche" => 'required',
                "pwd" => 'required|min:8',
                "pwd2" => 'required'
            ]
        );

        if($validatedData['pwd'] != $validatedData['pwd2']) {
            return redirect() -> back() -> withErrors(['pwd' => "Passwords do not match"]);
        }

        $user = new User();
        
        // Set the values from the request to be passed to the model that would be stored on the users table
        $options = [
            "fullname" => $validatedData['fname'],
            "email" => $validatedData['email'],
            "rle" => $validatedData['role'],
            "niche" => $validatedData['niche'] 
        ];

        if($user -> save($options)) {
            session() -> flash('status', "Success");
            
            return redirect() -> route('login');
        }
    }

    public function login(Request $request) {
        // Check to make sure the email is a proper email and it is defined and the password is also given
        $validatedData = $request -> validate([
            'email' => 'email|required',
            'pwd' => 'required'
        ]);

       
        $values = [
            'email' => $validatedData['email'],
            'password' => $validatedData['pwd']
        ];

        if(Auth::attempt($values)) {
            return redirect() -> route('dashboard');
        }
    }
}
