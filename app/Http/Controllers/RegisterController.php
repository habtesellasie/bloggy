<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // create the user
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',

            //?OR 'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')], 
            //* this becomes useful when a user itself
            //* tries to change his username where I can chain Rule::unique()->ignore() method

            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', "Your account has been created " . $attributes['name']);
    }
}
