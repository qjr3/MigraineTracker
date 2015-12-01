<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use App;
use Auth;

class ReportController extends Controller
{
    // Generate PDF report, save it and return the PDF (NOT A VIEW)
    public function create()
    {
        $user = Auth::user();
        $journals = $user->journals;
        $triggers = $user->triggers;
        $medicines = $user->medicines;
        $notes = $user->notes;

        $report = App::make('dompdf.wrapper');
        $report->loadView('reports.basic', compact('user', 'journals', 'triggers', 'medicines', 'notes'));
        
        return $report->stream();
    }
    
    // Store the report
    private function store()
    {
        
    }
    
    // Show list of pre-generated reports
    public function index()
    {
        
    }
    
    // Show selected report
    public function show($id)
    {
        
    }
}
