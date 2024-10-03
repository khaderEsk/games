<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = User::find(1);
        $user = Auth::user();
        return view('index', compact('user', 'admin'));
    }
    public function menu()
    {
        $admin = User::find(1);
        $user = Auth::user();
        return view('menu', compact('user','admin'));
    }
    public function about()
    {
        $admin = User::find(1);
        $user = Auth::user();
        return view('about', compact('user','admin'));
    }
    public function book()
    {
        $admin = User::find(1);
        $user = Auth::user();
        return view('book', compact('user','admin'));
    }
    public function profile()
    {
        $admin = User::find(1);
        $user = Auth::user();
        return view('profile', compact('user','admin'));
    }
    public function withdraw()
    {
        $admin = User::find(1);
        $user = Auth::user();
        return view('withdraw', compact('user','admin'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return view('profile', compact('user'));
    }
}
