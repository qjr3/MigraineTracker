<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trigger;
use App\Medicine;
use App\Journal;
Use Auth;

Use Illuminate\Http\Request;

class JournalController extends Controller
{
    
    public function __construct() 
    {

    }
    
    public function index()
    {
        $journals = Auth::user()->journals;
        
        return view('journal.index', compact('journals'));
    }
    
    public function store(Request $request)
    {
        Auth::user()->journals()->create($request->all());

        return redirect('journal');
    }
    
    public function show($id)
    {
        $journal = Auth::user()->journals()->findOrFail($id);
        return view('journal.view', compact('journal'));
    }
    
    public function create()
    {
        return view('journal.create');
    }
    
    public function edit($id, Request $request)
    {
        $journal = Auth::user()->journals()->findOrFail($id);
        
        return view('journal.update', compact('journal'));
    }
    
    public function update($id, Request $request)
    {
        $journal = Auth::user()->journals()->findOrFail($id);
        $journal->update($request->all());
        
        return redirect('journal');
    }    
}
