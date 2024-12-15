<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function create()
    {
        return view('image.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:225',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $path =  $request -> file('image')->store('uploads','public');

        Image::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,

        ]);
        return redirect()->route('image.upload')->with('success', 'Image uploaded successfully!');
    }

    public function showArtWorks()
    {
        $images = Image::all();
        return view('image.show', compact('images'));

    }

}
