<?php

namespace App\Http\Controllers;

use App\Models\Governor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allUser()
    {
        $admin = auth()->user();

        $regularUsers = User::where('role', 1)->get();

        return view('Admin_gameStroe.users', compact(['admin', 'regularUsers']));
    }


    public function index()
    {
        $amount = 0;
        $admin = auth()->user();
        $regularUsers = User::where('role', 1)->take(1)->get();
        $wallet = $admin->wallet->value;
        $gov = Governor::where('status', 'transfer');
        $governorCount = $gov->count();
        $governor = $gov->get();
        foreach ($governor as $g) {
            $amount += $g->amount;
        }
        return view('Admin_gameStroe.index', compact(['admin', 'regularUsers', 'wallet', 'governorCount', 'governor', 'amount']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function settings()
    {
        $admin = auth()->user();
        return view('Admin_gameStroe.settings', compact(['admin']));
    }
    public function update(Request $request)
    {
        $admin = auth()->user();
        $admin->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        if ($request->old_password && Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->new_password);
            $admin->save();
        }
        return view('Admin_gameStroe.settings', compact(['admin']));
    }

    public function addCategory()
    {
        $admin = auth()->user();
        return view('Admin_gameStroe.add-category', compact(['admin']));
    }

    public function addGame()
    {
        $admin = auth()->user();
        return view('Admin_gameStroe.add-game', compact(['admin']));
    }
    public function addSlide()
    {
        $admin = auth()->user();
        return view('Admin_gameStroe.add-slide', compact(['admin']));
    }
    public function categories()
    {
        $admin = auth()->user();
        return view('Admin_gameStroe.categories', compact(['admin']));
    }
    public function games()
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->first();
        return view('Admin_gameStroe.games', compact(['admin']));
    }
    public function slider()
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->first();
        return view('Admin_gameStroe.slider', compact(['admin']));
    }
    public function accept($id)
    {
        $governor = Governor::find($id);
        $governor->update([
            'status' => 'transfer'
        ]);
        return redirect()->back();
    }
    public function transfer()
    {
        $governor = Governor::with('wallet')->with('wallet.user')->where('status', 'untransferred')->get();
        $admin = auth()->user();
        return view('Admin_gameStroe.transfer', compact(['admin', 'governor']));
    }
    public function transferDetails($id)
    {
        $governor = Governor::with('wallet')->with('wallet.user')->find($id);
        $admin = auth()->user();
        return view('Admin_gameStroe.transfer-details', compact(['admin', 'governor']));
    }
}
