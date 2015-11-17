<?php

namespace App\Http\Controllers;

use App\Http\Requests\TriggerRequest;
use App\Trigger;
use App\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;

class TriggerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\TriggerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TriggerRequest $request)
    {
        $collection = Auth::user()->triggers()->where('name', $request->get('name'))->get();
        if($collection->isEmpty()) {
            $trigger = new Trigger();
            $trigger->fill($request->all());
            Auth::user()->triggers()->save($trigger);
        }else{
            $trigger = $collection->first();
        }
        if($request->has('journal')) {
            $jID = $request->get('journal');
            $journal = Journal::findOrFail($jID);
            $journal->triggers()->attach($trigger);
        }
        
        if(Session::has('backTo')) Session::keep('backTo'); // pass it forward
        
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/trigger');
    }

    public function index()
    {
        $triggers = Auth::user()->triggers;
        Session::flash('backTo', Request::fullUrl());
        return view('trigger.index', compact('triggers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Trigger $trigger
     * @return \Illuminate\Http\Response
     */
    public function show(Trigger $trigger)
    {
        return view('trigger.show', compact('trigger'));
    }

    public function create()
    {
        if(Session::has('backTo')) Session::keep('backTo'); // pass it forward
        
        return view('trigger.create');
    }
    
    /**
     * Edit an existing Trigger
     * 
     */
    public function edit(Trigger $trigger)
    {
        return view('trigger.edit', compact('trigger'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\TriggerRequest  $request
     * @param  Trigger $trigger
     * @return \Illuminate\Http\Response
     */
    public function update(TriggerRequest $request, Trigger $trigger)
    {
        $trigger->fill($request->all());
        $trigger->save();
        return redirect('/trigger');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Trigger $trigger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trigger $trigger)
    {
        $trigger->delete();
        $triggers = Trigger::all();
        return redirect('/trigger');
    }
}
