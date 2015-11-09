<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trigger;
use App\CommonTriggers;
use App\PainLocations;
use App\Medicine;
use App\Journal;
use App\Note;
use Auth;
use App\Http\Requests\JournalRequest;

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
        $journal->common_triggers()->attach($request->input('common_triggers_id'));
        $journal->pain_locations()->attach($request->input('pain_locations_id'));
        $journal->notes()->attach($request->input('note_id'));

        // If a note was created on journal, store and link it.....
        // ?? how to do this when I am tired? is not to do it....
        return redirect('journal');
    }
    
    public function show(Journal $journal)
    {
        return view('journal.show', compact('journal'));
    }
    
    public function create()
    {
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        
        $common_triggers = CommonTriggers::all()->lists('name', 'id');
        $pain_locations = PainLocations::all()->lists('name', 'id');
        
        return view('journal.create', compact('triggers', 'common_triggers', 'medicines', 'pain_locations'));
    }
    
    public function edit(Journal $journal)
    {
        $journal = $journal->load('triggers');
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        
        $common_triggers = CommonTriggers::all()->lists('name', 'id');
        $pain_locations = PainLocations::all()->lists('name', 'id');
        
        return view('journal.edit', compact('journal', 'common_triggers', 'triggers', 'medicines', 'pain_locations'));
    }
    
    public function update(Journal $journal, JournalRequest $request)
    {
        if(!isset($request['triggers_id']))
            $request['triggers_id'] = [];

        if(!isset($request['medicines_id']))
            $request['medicines_id'] = [];
        
        if(!isset($request['common_triggers_id']))
            $request['common_triggers_id'] = []; // Should fix issue #26
        
        if(!isset($request['pain_locations_id']))
            $request['pain_locations_id'] = []; 

        if(!isset($request[notes_id]))
            $request['notes_id'] = [];
        
        
        $journal->triggers()->sync($request['triggers_id']);
        $journal->medicines()->sync($request['medicines_id']);
        $journal->common_triggers()->sync($request['common_trigger_id']);
        $journal->pain_locations()->sync($request['pain_locations_id']);
        $journal->notes()->sync($request['notes_id']);
        
        $journal->update($request->all());
        
        return redirect()->back();
    }    
    
    public function destroy(Journal $journal)
    {
        $journal->delete();
        $journals = Journal::all();
    }
}
