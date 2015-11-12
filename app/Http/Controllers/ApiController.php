<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Trigger;
use App\Medicine;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    
    /*
     * Triggers
     */
    public function showTriggers()
    {
        return  Auth::user()->triggers;
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
    public function showMedicines()
    {
        return  Auth::user()->medicines;
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