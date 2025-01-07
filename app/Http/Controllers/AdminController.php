<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.index', compact('users'));
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->delete(); // Delete the user
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
