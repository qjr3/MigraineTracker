<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class TestController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		return view('test', compact('user'));
	}
}
