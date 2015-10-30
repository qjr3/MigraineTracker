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
            $trigger->name = $request->get('name');
            $trigger->description = $request->get('description');
            Auth::user()->triggers()->save($trigger);
        }else{
            $trigger = $collection->first();
        }
        if($request->has('journal')) {
            $jID = $request->get('journal');
            $journal = Journal::findOrFail($jID);
            echo $journal;
            $journal->triggers()->attach($trigger);
        }
        return redirect()->back();
    }

    public function index()
    {
        return Trigger::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trigger = Trigger::find($id);
        return $trigger;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\TriggerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TriggerRequest $request, $id)
    {
        $trigger = Trigger::find($id);
        $trigger->name = $request->get('name');
        $trigger->description = $request->get('description');
        $trigger->save();
        return 'Success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trigger = Trigger::find($id);
        $trigger->delete();
        return 'Success';
    }
}
