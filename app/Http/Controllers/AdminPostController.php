<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!auth()->user()) {
            return redirect()->back()->with('error', 'You must be logged in to create a post.');
        }
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|max:10240',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        if($request->hasFile('image')) {
            $validatedData['image'] = basename($request->file('image')->store('public/images'));
        }
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'super-admin') {
            Post::create($validatedData);
            return redirect()->back()->with('success', 'Your post has been created.');
        }
        else {
            return redirect()->back()->with('error', 'You are not authorized to create a post.');
        }    
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->role == 'super-admin')
        {
            Post::where('id', $id)->update([
                'approved' => true
            ]);
        } else {
            return redirect()->back()->with('error', 'you are not authorized to aprove posts');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
