<?php
namespace App\Http\Controllers;

use Auth;
use App\Trigger;
use App\Medicine;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    
    /*
     * Triggers
     */
    public function showTriggers(Request $request)
    {

        if(isset($request['name'])){
            $triggers = Trigger::likeName(Auth::user()->id, $request['name'])->get();
            if($triggers->isEmpty()){
                $triggers = Auth::user()->triggers;
            }
        }else{
            $triggers = Auth::user()->triggers;
        }
        return $triggers;
    }
    
    public function createTrigger(Request $request)
    {
        Auth::user()->triggers()->create($request->all());
    }
    
    public function destroyTrigger(Trigger $trigger)
    {
        $trigger->delete();
    }
    
    /*
     * Medicines
     */
    public function showMedicines(Request $request)
    {
        if(isset($request['name'])){
            $medicines = Medicine::likeName(Auth::user()->id, $request['name'])->get();
            if($medicines->isEmpty()){
                $medicines = Auth::user()->medicines;
            }
        }else{
            $medicines = Auth::user()->medicines;
        }
        return $medicines;
    }
    
    public function createMedicine(Request $request)
    {
        Auth::user()->medicines()->create($request->all());
    }
    
    public function destroyMedicine(Medicine $medicine)
    {
        $medicine->delete();
    }
}