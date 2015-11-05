<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trigger;
use App\Medicine;
use App\Journal;
Use Auth;
use App\Http\Requests\JournalRequest;
//use Illuminate\Http\Request;

class JournalController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('owner:journal', ['only' => ['show', 'edit', 'update']]);
    }
    
    public function index()
    {
        $journals = Auth::user()->journals;
        
        return view('journal.index', compact('journals'));
    }
    
    public function store(JournalRequest $request)
    {

        $journal = Auth::user()->journals()->create($request->all());

        $journal->triggers()->attach($request->input('triggers_id'));
        $journal->medicines()->attach($request->input('medicines_id'));

        return redirect('journal');
    }
    
    public function show(Journal $journal)
    {
        return view('journal.view', compact('journal'));
    }
    
    public function create()
    {
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        return view('journal.create', compact('triggers', 'medicines'));
    }
    
    public function edit(Journal $journal)
    {
        $journal = $journal->load('triggers');
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        return view('journal.update', compact('journal', 'triggers', 'medicines'));
    }
    
    public function update(Journal $journal, JournalRequest $request)
    {
        if(!isset($request['triggers_id']))
            $request['triggers_id'] = [];

        if(!isset($request['medicines_id']))
            $request['medicines_id'] = [];

        $journal->triggers()->sync($request['triggers_id']);
        $journal->medicines()->sync($request['medicines_id']);

        $journal->update($request->all());
        
        return redirect('journal');
    }    
}
