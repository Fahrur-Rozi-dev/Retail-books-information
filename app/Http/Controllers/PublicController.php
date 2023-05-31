<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index(Request $request)
    {

    }

    public function home()
    {
        return view('Public.home');
    }
    public function dev()
    {
        return view('Public.development');
    }
}
