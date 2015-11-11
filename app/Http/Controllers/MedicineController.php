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
        
        if(Session::has('backTo')) Session::keep('backTo'); // pass it forward
        
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
        return view('medicine.show', compact('medicine'));
    }

    public function create()
    {
        if(Session::has('backTo')) Session::keep('backTo'); // pass it forward
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
        return redirect()->back();
    }
    
    // Accept AJAX route, receive ajax data from form
    public function addMedication()
    {
        if(Request::ajax())
        {
            $medicine = new Medicine();
            $medicine->name = Request::input('name');
            $medicine->description = Request::input('description');
            $medicine->dose = Request::input('dose');
            $medicine->save();
            
            $response = 
            [
                'status' => 'success',
                'msg' => 'Medication addeed',
            ];
            
            return Response::json($response);
        }       
    }
}
