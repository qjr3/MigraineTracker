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
        $user = Auth::user();
        return view('pages.dashboard', compact('user'));
    }
    
    public function privacy()
    {
        return 'Privacy Policy';
    }
    
    public function terms()
    {
        return 'Terms of Service';
    }
    
    public function about()
    {
        return 'About';
    }
}
