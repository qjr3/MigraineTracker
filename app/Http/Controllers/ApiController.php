<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function showTriggers()
    {
        return  Auth::user()->triggers;
    }

    public function createTrigger(Request $request)
    {
        Auth::user()->triggers()->create($request->all());
    }

    public function showMedicines()
    {
        return  Auth::user()->medicines;
    }

    public function createMedicine(Request $request)
    {
        Auth::user()->medicines()->create($request->all());
    }
}
