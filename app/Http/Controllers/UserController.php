<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(Request $request) 
    {

    }

    /**
            User login
    */
    public function login(User $user)
    {
        Auth::login($user);
    }

    public function create()
    {
        return view('user.create');
    }
    
    public function store(Request $data)
    {

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
