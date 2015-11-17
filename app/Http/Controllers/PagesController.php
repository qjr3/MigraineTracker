<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Journal;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function dashboard()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $notes = $user->notes()->where('journal_id', '==', 'null')->where('created_at', '>=', Carbon::now()->subMonth())->get();
            $journals = $user->journals()->where('created_at', '>=', Carbon::now()->subMonth())->get();
            return view('pages.dashboard', compact('user', 'journals', 'notes'));
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
