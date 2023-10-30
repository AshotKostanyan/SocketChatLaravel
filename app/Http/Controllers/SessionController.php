<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy(){
        auth()->logout();

        return redirect('/');
    }

    public function create(){
        return view('session.create');
    }


    public function store(){

        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if(auth()->attempt($attributes)){

            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

}
