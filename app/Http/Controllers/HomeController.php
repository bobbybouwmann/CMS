<?php

namespace I9T\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use I9T\Http\Requests;
use I9T\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('auth.timeline');
        }
        return view('home');
    }

    public function timeline()
    {
        # TODO: Create a follow system and display posts of people you are following
        return view('auth.timeline');
    }
}
