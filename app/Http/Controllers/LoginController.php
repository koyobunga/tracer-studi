<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()){
            if(Auth::user()->level == 'admin')
                return redirect('admin');
            if(Auth::user()->level == 'alumni')
                return redirect('alumni');
        }
        return view('login');
    }

    public function signin(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $valid['status'] = 1;

        if(Auth::attempt($valid)){
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin'){
                return redirect('admin')->with('success', 'Login berhasil');
            }
            if(Auth::user()->level == 'alumni'){
                return redirect('alumni')->with('success', 'Login berhasil');
            }
        }
        return back()->with('error', 'Gagal login');
    }

    public function signout()
    {
        if(Auth::logout())
            return redirect('/')->with('info', 'Telah logout');
        return back()->with('error', 'Gagal logout');
    }
}
