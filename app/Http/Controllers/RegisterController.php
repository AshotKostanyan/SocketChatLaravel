<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name'=>['required', 'max:255'],
            'username'=>['required', 'max:255','min:2','unique:users,username'],
            'email'=>['required', 'email','max:255'],
            'password'=>['required','min:7','max:255']
        ]);

        $user = User::create($attributes);
        auth()->login($user);


        return redirect('/');
    }
}
