<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Medicine;

class MedicineController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('Auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\MedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(MedicineRequest $request)
    {
        $medicine = new Medicine();
        $medicine->name = $request->get('name');
        $medicine->dose = $request->get('dose');
        $medicine->description = $request->get('description');
        $journal = $request->get('journal');
        $journal->medicines()->save($medicine);
        Auth::user()->medicines()-save($medicine);
        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $trigger = Trigger::find($id);
        return $trigger;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\MedicineRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patchUpdate(MedicineRequest $request, $id)
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
    public function deleteDestroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return 'Success';
    }
}
