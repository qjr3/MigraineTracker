<?php

namespace App\Http\Controllers;

use App\Http\Requests\TriggerRequest;
use App\Trigger;
use App\Journal;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back();
    }

    public function index()
    {
        $triggers = Auth::user()->triggers;
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
        return zzzzredirect()->back(); // this should be: return redirect('something'); do not return text/string unless testing (prior to commit)
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
        return redirect()->back();
    }
    
    // Accept AJAX route, receive ajax data from form
    public function addTrigger()
    {
        if(Request::ajax())
        {
            $trigger = new Trigger();
            $trigger->name = Request::input('name');
            $trigger->description = Request::input('description');
            $trigger->save();
            
            $response = 
            [
                'status' => 'success',
                'msg' => 'Trigger addeed',
            ];
            
            return Response::json($response);
        }       
    }
}
