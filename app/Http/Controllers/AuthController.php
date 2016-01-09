<?php

namespace I9T\Http\Controllers;

use Auth;
use I9T\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use I9T\Http\Requests;
use I9T\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password'   => 'required',
        ]);

        $login = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'student_id';
        $request->merge([$login => $request->input('login')]);

        if (!Auth::attempt($request->only([$login, 'password']))) {
            notify()->flash('Mismatch on our end!', 'error', [
                'text' => 'It seems as though we cannot verify your crudentials, please try again.',
            ]);

            return redirect()->back();
        }

        $current_time = Carbon::now();

        Auth::user()->update([
            'last_activity' => $current_time,
        ]);

        notify()->flash('Welcome back!', 'success', [
            'text' => 'Welcome back, ' . Auth::user()->getFirstNameOrStudentID() . '!',
        ]);

        return redirect()->route('auth.timeline');
    }

    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email'       => 'required|unique:users|email',
            'student_id'  => 'required|unique:users|integer',
            'password'    => 'required|min:6',
            'password2'   => 'required|same:password',
        ]);

        $current_time = Carbon::now();

        User::create([
            'student_id' => $request->input('student_id'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'last_activity' => $current_time,
        ]);

        notify()->flash('Welcome to I9T!', 'success', [
            'text' => 'Welcome to I9T, ' . $request->input('student_id') . '!',
        ]);

        return redirect()->route('home');
    }

    public function signout()
    {
        Auth::logout();

        notify()->flash('See you again!', 'success');

        return redirect()->route('home');
    }
}
