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
        $medicines = Auth::user()->medicines;
        return view('user.edit', compact('user', 'triggers', 'medicines'));
    }

    public function update(User $user, Request $request)
    {
        if ($request['has_diabetes'] == '')
            $request['has_diabetes'] = '0';
        if ($request['has_migraines'] == '')
            $request['has_migraines'] = '0';
        if ($request['has_glasses'] == '')
            $request['has_glasses'] = '0';

        $user->update($request->all());
        return redirect()->action('UserController@show', $user->id);
    }

    public function show(User $user)
    {
        $triggers = Auth::user()->triggers;
        $medicines = Auth::user()->medicines;
        return view('user.profile', compact('user', 'triggers', 'medicines'));
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/');
    }
}