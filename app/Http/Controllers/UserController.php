<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct(Request $request) 
    {
    	$this->middleware('profile');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        return view('user.profile', compact('user'));
    }

    public function show(User $user)
    {
        return view('user.profile', compact('user'));
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();        
    }
}
