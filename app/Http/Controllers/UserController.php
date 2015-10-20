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

    }

    public function showProfile($id)
    {
        return 'profile';
    }
}
