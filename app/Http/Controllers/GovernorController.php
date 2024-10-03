<?php

namespace App\Http\Controllers;

use App\Models\Governor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GovernorController extends Controller
{
    public function index()
    {
        $governor = Governor::with('wallet')->with('wallet.user')->where('status', 'untransferred')->get();

        return view('governor.index', compact('governor'));
    }
    
    public function store(Request $request)
    {
        $admin = User::find(1);
        $user = Auth::user()->load('wallet');
        if ($user->wallet->value < 25) {
            return  view('error');
        }
        $request->validate([
            'amount' => ['required', 'integer'],
            'transferCompany' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
        $user->wallet->update([
            'value' => $user->wallet->value - $request->amount,
            'updated_at' => Carbon::now()->setTimezone('Asia/Damascus')->toDateString(),
        ]);
        $user->wallet->save();
        $user = Governor::create([
            'wallet_id' => $user->wallet->id,
            'amount' => $request->amount,
            'transferCompany' => $request->transferCompany,
            'address' => $request->address,
            'status' => 'untransferred'
        ]);
        return view('book', compact('user','admin'));
    }
}
