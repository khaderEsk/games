<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pest\Mutate\Mutators\Sets\MathSet;

class GameController extends Controller
{
    public function endBoxStacking(Request $request)
    {

        $request->validate([
            'seconds' => 'required|integer',
        ]);
        $hour  = (int) ($request->seconds / 3600);
        $user = auth()->user();

        if ($user->wallet) {
            $user->wallet->update([
                'value' => $user->wallet->value + $hour,
            ]);
            $user->wallet->save();
        }
    }
    public function HorseRaceAds($id)
    {
        $user = User::with('wallet')->find($id);
        return view('HorseRaceAds.index', compact('user'));
    }
    public function endHorseRaceAds(Request $request)
    {
        $request->validate([
            'funds' => 'required|integer',
        ]);

        // احصل على المستخدم الحالي
        $user = auth()->user(); // تأكد من أن المستخدم مسجل الدخول

        // تحقق مما إذا كان لدى المستخدم محفظة
        if ($user->wallet) {
            // تحديث قيمة المحفظة للمستخدم
            $user->wallet->value = $request->input('funds');
            $user->wallet->save(); // حفظ التحديثات

        }
    }

    public function egypt($id)
    {
        $user = User::with('wallet')->find($id);
        return view('egypt.start', compact('user'));
    }
    public function indexEgypt($id)
    {
        $user = User::with('wallet')->find($id);
        return view('egypt.index', compact('user'));
    }

    public function boxStackingAds($id)
    {
        $user = User::with('wallet')->find($id);
        return view('boxStackingAds.index', compact('user'));
    }



    public function XOStart($id)
    {
        $user = User::with('wallet')->find($id);
        return view('XO.index', compact('user'));
    }

    public function breakoutAds($id)
    {
        $user = User::with('wallet')->find($id);
        return view('breakoutAds.index', compact('user'));
    }


    public function puzzle($id)
    {
        $user = User::with('wallet')->find($id);
        return view('fifteenPuzzleGameAds.index', compact('user'));
    }
    public function TronMasterAds($id)
    {
        $user = User::with('wallet')->find($id);
        return view('TronMasterAds.index', compact('user'));
    }
    public function avoidDebris($id)
    {
        $user = User::with('wallet')->find($id);
        return view('avoidDebris.index', compact('user'));
    }
    public function hitHedgehog($id)
    {
        $user = User::with('wallet')->find($id);
        return view('hitTheHedgehog.index', compact('user'));
    }
    public function chess($id)
    {
        $user = User::with('wallet')->find($id);
        return view('chessMaster.index', compact('user'));
    }
    public function chess_player_computer($id)
    {
        $user = User::with('wallet')->find($id);
        return view('chessMaster.player_computer', compact('user'));
    }
    public function chess_two_player($id)
    {
        $user = User::with('wallet')->find($id);
        return view('chessMaster.two_player', compact('user'));
    }
}
