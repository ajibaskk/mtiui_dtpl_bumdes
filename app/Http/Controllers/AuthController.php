<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        Log::info("this is log");
        return view('auth.login2');
    }  

    public function postLogin(Request $request) {
        Log::info("this is log post");
        Log::info($request->email);

        $password = Hash::make($request->password);
        Log::info($request->password);
        Log::info($password);

        // $admin = User::firstWhere("email", $request->email);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Log::info($admin);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Log::info($credentials);
 
            return redirect()->intended('nasabah.index');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
