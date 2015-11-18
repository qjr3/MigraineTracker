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
use Carbon\Carbon;
use App\Http\Requests\JournalRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;

class JournalController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('owner:journal', ['only' => ['show', 'edit', 'update']]);
    }
    
    public function index()
    {
        $journals = Auth::user()->journals;
        
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());
        
        return view('journal.index', compact('journals'));
    }
    
    public function store(JournalRequest $request)
    {
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());
        
        // Some reason, DB default value isn't autofilling....so we'll do it here instead.
        if(empty($request['name'])) $request['name'] = 'unnamed';
        
        $journal = Auth::user()->journals()->create($request->all());

        $journal->triggers()->attach($request->input('triggers_id'));
        $journal->medicines()->attach($request->input('medicines_id'));
        $journal->common_triggers()->attach($request->input('common_triggers_id'));
        $journal->pain_locations()->attach($request->input('pain_locations_id'));
//        $journal->notes()->attach($request->input('note_id'));

        // If a note was created on journal, store and link it.....
        // ?? how to do this when I am tired? is not to do it....
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/journal');
    }
    
    public function show(Journal $journal)
    {
        // Setup backtracking
        Session::flash('backTo', Request::fullUrl());
        $duration = $this->duration($journal);
        return view('journal.show', compact('journal', 'duration'));
    }
    
    public function create()
    {
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());
        
        // Create list with name=>id to use in select2 field.
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        
        $common_triggers = CommonTriggers::all()->lists('name', 'id');
        $pain_locations = PainLocations::all()->lists('name', 'id');
        
        return view('journal.create', compact('triggers', 'common_triggers', 'medicines'));
    }
    
    public function edit(Journal $journal)
    {
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());
        
        $journal = $journal->load('triggers');
        
        // Create list with name=>id to use in select2 field.
        $triggers = Auth::user()->triggers()->lists('name', 'id');
        $medicines = Auth::user()->medicines()->lists('name', 'id');
        
        $common_triggers = CommonTriggers::all()->lists('name', 'id');
//        $pain_locations = PainLocations::all()->lists('name', 'id');
        
        return view('journal.edit', compact('journal', 'common_triggers', 'triggers', 'medicines'));
    }
    
    public function update(Journal $journal, JournalRequest $request)
    {   
        // Some reason, DB default value isn't autofilling....so we'll do it here instead.
        if(empty($request['name'])) $request['name'] = 'unnamed';
        
        // Make sure the id arrays are not null
        if(!isset($request['triggers_id']))
            $request['triggers_id'] = [];

        if(!isset($request['medicines_id']))
            $request['medicines_id'] = [];
        
        if(!isset($request['common_triggers_id']))
            $request['common_triggers_id'] = []; // Should fix issue #26
        
        if(!isset($request['pain_locations_id']))
            $request['pain_locations_id'] = []; 
//        if(!isset($request[notes_id]))
//            $request['notes_id'] = [];

        $journal->triggers()->sync($request['triggers_id']);
        $journal->medicines()->sync($request['medicines_id']);
        $journal->common_triggers()->sync($request['common_triggers_id']);
        $journal->pain_locations()->sync($request['pain_locations_id']);
//        $journal->notes()->sync($request['notes_id']);
        
        $journal->update($request->all());
        
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/journal');
    }    
    
    public function destroy(Journal $journal)
    {
        $journal->delete();
        $journals = Journal::all();
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/journal');
    }

    public function duration(Journal $journal){
        if($journal->start_time == null || $journal->end_time == null)
            return null;
        $start_time = Carbon::createFromFormat('Y-m-d\TH:i:s', $journal->start_time);
        $end_time = Carbon::createFromFormat('Y-m-d\TH:i:s', $journal->end_time);
        $minutes = $end_time->diffInMinutes($start_time);
        $string = '';
        if($minutes > 1440){
            $days = intval($minutes/1440);
            $minutes = $minutes%1440;
            $string = $string.$days.' Day';
            if($days > 1){
                $string = $string.'s ';
            }else{
                $string = $string.' ';
            }
        }
        if($minutes > 59){
            $hours = intval($minutes/60);
            $minutes = $minutes%60;
            $string = $string.$hours.' Hour';
            if($hours > 1){
                $string = $string.'s ';
            }else{
                $string = $string.' ';
            }
        }
        if($minutes != 1){
            $string = $string.$minutes.' Minutes';
        }else{
            $string = $string.$minutes.' Minute';
        }
        return $string;
    }
}
