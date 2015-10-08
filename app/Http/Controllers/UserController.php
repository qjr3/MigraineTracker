<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\Http\User;

class UserController extends Controller
{
    public function __construct(Request $request) 
    {

    }

    /**
            User login
    */
    public function login( )
    {
        return view('user.login');
    }

    public function create()
    {
        return view('user.create');
    }
    
    public function store(Request $data)
    {
        dd($data);
        return 'Hello World' . $data;
    }
    
    public function show()
    {
        return (Auth::getUser());
    }
    
    /**
            User Logout
    */
    public function logout()
    {
        Auth::logout();
    }
}
