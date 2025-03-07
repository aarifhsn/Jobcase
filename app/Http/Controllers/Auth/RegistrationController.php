<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
        ]);

        // redirect to home page
        return redirect()->route('login')->with('success', __('messages.registration_success'));
    }
}
