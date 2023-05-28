<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexLogin(){
        return view('auth.login');
    }
    public function indexRegister(){
        return view('auth.register');
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
                Session::flash('status','success');
                Session::flash('message','anda sudah terverifikasi');
                if (Auth::user()->role_id == 1){
                    return redirect('/dashboard');
                } elseif (Auth::user()->role_id == 2) {
                return redirect('/home');
                }
                
            }
            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');
        } else {
            Session::flash('status','failed');
            Session::flash('message','login invalid');
            return redirect('/login');
        }
    }
}
