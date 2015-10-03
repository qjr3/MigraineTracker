<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserAccountController extends Controller
{
	/**
		Shows main user profile page
	*/
	public function view()
	{
		// Validate User first?
		return view('user.view', $user);
	}
	
	/**
		New user registration
	*/
	public function register()
	{
		return view('user.register', $user);
	}
	
	/**
		User login
	*/
	public function login()
	{
		return view('user.login');
	}
	
	/**
		User Logout
	*/
	public function logout()
	{
		return view('user.logout');
	}
	
	/**
		Delete User Account
	*/
	public function delete()
	{
		// Delete user account
		// display homepage
		return view();
	}
	
	/**
		Disable User Account
		!future-feature
	*/
	public function disable()
	{
	}
	
}
