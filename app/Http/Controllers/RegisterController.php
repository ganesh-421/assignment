<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        try {
            $user = User::create($validatedData);
            return redirect()->route('login')->with('success', 'Your account has been created. Please log in.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}