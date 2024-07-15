<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index(){
        return view('alumni.index', [
            'title' => 'Dashboard'
        ]);
    }
    
    public function profile(){
        return view('alumni.profile.index', [
            'title' => 'Profile Saya',
            'data' => Auth::user()->alumni
        ]);
    }
}
