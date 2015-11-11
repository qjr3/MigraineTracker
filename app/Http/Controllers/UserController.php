<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UserController extends Controller
{
    public function __construct(Request $request) 
    {
    	$this->middleware('profile');
    }

    public function edit(User $user)
    {
        $triggers = Auth::user()->triggers;
        return view('user.edit', compact('user', 'triggers'));
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        return view('user.profile', compact('user'));
    }

    public function show(User $user)
    {
        $triggers = Auth::user()->triggers;
        return view('user.profile', compact('user', 'triggers'));
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();        
    }
}
