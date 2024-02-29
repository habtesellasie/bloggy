<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

// use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            // 'email' => 'required|exists:users,email',
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => "Your provided credentials could not be varified."
            ]);

            //? the below is as same as throwing a validation exception

            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'Your password or email doesn\'t match', ['password' => 'Password not correct']]);

        }

        session()->regenerate();
        return redirect('/')->with('success', "Welcome Back!");
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
