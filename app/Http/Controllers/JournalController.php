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
        $this->middleware('auth');
        //$this->middleware('owner:journal', ['only' => ['show', 'edit', 'update']]);
    }
    
    public function index()
    {
        $journals = Auth::user()->journals;
        
        return view('journal.index', compact('journals'));
    }
    
    public function store(Request $request)
    {

        $journal = Auth::user()->journals()->create($request->all());

        $journal->triggers()->attach($request->input('triggers_id'));
        $journal->medicines()->attach($request->input('medicines_id'));

        return redirect('journal');
    }
    
    public function show($id)
    {
        $journal = Auth::user()->journals()->findOrFail($id);
        return view('journal.view', compact('journal'));
    }
    
    public function create()
    {
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        return view('journal.create', compact('triggers', 'medicines'));
    }
    
    public function edit($id, Request $request)
    {
        $journal = Auth::user()->journals()->findOrFail($id);

        $journal = $journal->load('triggers');
        
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        return view('journal.update', compact('journal', 'triggers', 'medicines'));
    }
    
    public function update($id, Request $request)
    {
        $journal = Auth::user()->journals()->findOrFail($id);

        if(!isset($request['triggers_id']))
            $request['triggers_id'] = array();

        if(!isset($request['medicines_id']))
            $request['medicines_id'] = array();

        $journal->triggers()->sync($request['triggers_id']);
        $journal->medicines()->sync($request['medicines_id']);

        $journal->update($request->all());
        
        return redirect('journal');
    }    
}
