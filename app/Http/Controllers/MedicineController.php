<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Medicine;
use App\Journal;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    
    public function __construct() 
    {
        //$this->middleware('Auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\MedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicineRequest $request)
    {
        $medicine = new Medicine();
        $medicine->name = $request->get('name');
        $medicine->dose = $request->get('dose');
        $medicine->description = $request->get('description');
        $medicine->save();
        $jID = $request->get('journal');
        $journal = Journal::findOrFail($jID);
        $journal->medicines()->attach($medicine);
        Auth::user()->medicines()->attach($medicine);
        return 'Success';
    }

    public function index()
    {
        return Medicine::all();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        return $medicine;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\MedicineRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineRequest $request, $id)
    {
        $medicine = Medicine::find($id);
        $medicine->name = $request->get('name');
        $medicine->dose = $request->get('dose');
        $medicine->description = $request->get('description');
        $medicine->save();
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
        $medicine = Medicine::find($id);
        $medicine->delete();
        return 'Success';
    }
}
