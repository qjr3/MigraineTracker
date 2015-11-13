<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Medicine;
use App\Journal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class MedicineController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\MedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicineRequest $request)
    {
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());

        $collection = Auth::user()->medicines()->where('name', $request->get('name'))->get();
        if($collection->isEmpty()) {
            $medicine = new Medicine();
            $medicine->fill($request->all());
            Auth::user()->medicines()->save($medicine);
        }else{
            $medicine = $collection->first();
        }
        if($request->has('journal')) {
            $jID = $request->get('journal');
            $journal = Journal::findOrFail($jID);
            $journal->medicines()->attach($medicine);
        }
        
        
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/medicine');
    }

    public function index()
    {
        $medicines = Auth::user()->medicines;
        Session::flash('backTo', Request::fullUrl()); // Help find our way back
        return view('medicine.index', compact('medicines'));
    }
    
    /**
     * Edit an existing medicine
     * 
     */
    public function edit(Medicine $medicine)
    {
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());
        
        return view('medicine.edit', compact('medicine'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        Session::flash('backTo', Request::fullUrl()); // Help find our way back

        return view('medicine.show', compact('medicine'));
    }

    public function create()
    {
        // keep backtrack token in the session one more step of the way.
        if(Session::has('backTo')) Session::keep('backTo');
        else Session::flash('backTo', Request::fullUrl());
        
        return view('medicine.create');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\MedicineRequest  $request
     * @param  Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineRequest $request, Medicine $medicine)
    {
        $medicine->fill($request->all());
        $medicine->save();
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/medicine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        $medicines = Medicine::all();
        return ($returnPath = Session::get('backTo')) ? redirect($returnPath) : redirect('/medicine');
    }
}
