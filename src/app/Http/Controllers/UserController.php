<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\User;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user);
        return redirect()->route('admin');
    }
    public function login(UserRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin');
        }
    }
    public function admin()
    {
        $contacts = Contact::all();
        return view('admin');
    }
}