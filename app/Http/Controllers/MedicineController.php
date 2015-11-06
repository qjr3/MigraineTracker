<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Medicine;
use App\Journal;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back();;
    }

    public function index()
    {
        $medicines = Auth::user()->medicines;
        return view('medicine.index', compact('medicines'));
    }
    
    /**
     * Edit an existing medicine
     * 
     */
    public function edit(Medicine $medicine)
    {
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
        return view('medicines.show', compact('medicine'));
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
        return redirect()->back();
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
        if(!$medicines->isEmpty())
            return redirect('medicine.index');
        else
            return redirect('pages.dashboard');
    }
}
