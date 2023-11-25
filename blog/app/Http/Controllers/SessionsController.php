<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view("sessions.create");
    }

    public function store(){
        // validate the request
        $attributes = request() -> validate([

            'email' => 'required|email',
            // 'email' => 'required|exists:users,email',
            'password'=> 'required'

        ]);

        // attempt to authenticate and login thr user based on the provided credentials
        if (! auth() -> attempt($attributes) ){

            throw ValidationException::withMessages([
                'email'=> 'your provided credentials cannot be verified!'
            ]);

            // return back()
            // ->withInput()
            // ->withErrors(['email'=> 'your provided credentials cannot be verified!']);
            
        }
        // if authentication fails
        session() -> regenerate();
        // show a success flash message
        return redirect('/') -> with( 'success' , 'Welcome Back!' );
    }
    public function destroy(){

        auth() -> logout();

        return redirect("/") -> with("success","Goodbye!");
    }
}
