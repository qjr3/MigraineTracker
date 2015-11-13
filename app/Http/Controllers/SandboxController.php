<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SandboxController extends Controller
{
    public function dashboard()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            return view('pages.dashboard', compact('user'));
        }
        return redirect('/');
    }
    
    public function index()
    {
        return view('sandbox.index');
    }
}
