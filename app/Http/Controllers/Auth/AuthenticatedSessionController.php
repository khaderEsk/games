<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $admin = User::find(1);
        return view('/login',compact('admin'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = $request->user();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($user->role == 1)
                return redirect()->intended(route('index', absolute: false))->with('user', $user);
            return redirect()->intended(route('indexAdmin', absolute: false))->with('user', $user);
        }
        return back()->withErrors([
            'email' => 'المعلومات المدخلة غير صحيحة.',
        ])->withInput($request->only('email'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
