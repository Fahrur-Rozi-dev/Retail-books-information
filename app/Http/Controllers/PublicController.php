<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index(Request $request)
    {
        // $request->session()->flush();
        // return view();
    }

    public function home()
    {
        return view('Public.home');
    }
}
