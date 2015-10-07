<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }
    
    public function index()
    {
        $journals = [
            'userid'        => 1, 
            'severity'      => 5, 
            'location'      => 'Seattle WA',
            'weather'       => 'clear and sunny',
            'noise_level'   => 1,
            'light_level'   => 1,
        ];
        
        return view('journal.index', compact('journals'));
    }
    
}
