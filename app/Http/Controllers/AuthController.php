<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexLogin(){
        return view('auth.login');
    }
    public function indexRegister(){
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'Phone' => 'nullable|unique:users',
            'Address' => 'required',
        ]);
        $user = User::create($request->all());
        if ($user) {
            Session::flash('status','success');
            Session::flash('message',' yeeyyy!! Akun Berhasil Di Buat! Silahkan Login');
            return redirect('/login');
        }
        // return redirect('/home');
    }
    public function authenticating(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->Status != 'active') {
                Session::flash('status','failed');
                Session::flash('message','anda belum terverifikasi');
                return redirect('/notactive');
            } else {
                $request->session()->regenerate();
                if (Auth::user()->role_id == 1){
                    return redirect('/dashboard');
                } elseif (Auth::user()->role_id == 2) {
                return redirect('/home');
                }
                
            }
        } else {
            Session::flash('status','failed');
            Session::flash('message','login invalid mungkin password atau email anda salah');
            return redirect('/login');
        }
    }
    public function logout(Request $request): RedirectResponse
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}
}
