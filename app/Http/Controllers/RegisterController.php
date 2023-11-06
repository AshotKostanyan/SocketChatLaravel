<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(RegisterRequest $request){
        $validated = $request->validated();
        $user = User::create($validated);
        auth()->login($user);


        return redirect('/');
    }
}

