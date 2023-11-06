<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
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


    public function store(SessionRequest $request){
        $validated = $request->validated();

        if(auth()->attempt($validated)){

            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

}
