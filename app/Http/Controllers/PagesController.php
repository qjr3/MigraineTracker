<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PagesController extends Controller
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
    
    public function privacy()
    {
        return view('pages.privacy');
    }
    
    public function terms()
    {
        return view('pages.terms');
    }
    
    public function about()
    {
        return view('pages.about');
    }
}
