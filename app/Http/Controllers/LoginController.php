<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $valid = $request->validate([
            'email'=>'required|min:4',
            'password'=>'required|min:6',
        ]);
        $user = $request->all();

        if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')]))
        {
            return redirect('/userpage');
        }
        else
        {
            session()->flash('error', 'wrong username or password');
            return redirect('login');
        }

    }
}
