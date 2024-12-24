<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function userArtworks()
    {
        // Fetch images uploaded by the current user
        $images = Image::where('user_id', Auth::id())->get();

        // Return the correct view
         return view('image.currentuser', compact('images'));
    }


    public function destroy($id)
{
    $image = Image::findOrFail($id);

    // Check if the authenticated user is the owner
    if ($image->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Delete the image file from storage
    Storage::delete($image->image_path);

    // Delete the database record
    $image->delete();

    return redirect()->back()->with('success', 'Artwork deleted successfully.');
}

}
