<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if(auth()->attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'welcome back!');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Goodbye!');
    }
}
