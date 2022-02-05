<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Register
    function register(){
        return view('main.auth.register');
    }
    function store(Request $request){
        $validateData = $request->validate([
            'full_name' => 'required|min:3|string',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|min:10|unique:users',
            'address' => 'required|min:5',
            'user_lat' => 'required',
            'user_long' => 'required',
            'password' => 'required|min:8'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        // $request->session()->flash('success', 'Berhasil mendaftar! Silahkan masuk');
        return redirect('login')->with('success', 'Berhasil mendaftar! Silahkan masuk');
    }
    // Login
    function login(){
        return view('main.auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user', auth()->user());
            // $data = $request->session()->all();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login gagal! Silahkan perbaiki data anda');
    }
    function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Menghindari hacking session fixation
            $request->session()->regenerate();

            // Masuk ke middleware dulu untuk keamanan
            return redirect()->intended('/');
            // return(auth()->user());
        }

        return back()->with('loginError', 'Login gagal! Silahkan perbaiki data anda');
    }
    function logout(Request $request){
        $request->session()->flush();
        return redirect('login')->with('success', 'Berhasil logout.');
    }
}
