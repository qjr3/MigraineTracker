<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct(Request $request) 
    {
    	$this->middleware('auth');
    	$this->middleware('owner');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {   
        //dd($request);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return view('user.profile', compact('user'));
    }

    public function show($id)
    {
    	$user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }
}
