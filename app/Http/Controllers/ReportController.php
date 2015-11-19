<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use App;
class ReportController extends Controller
{
    // Generate PDF report, save it and return the PDF (NOT A VIEW)
    public function create()
    {
        $report = App::make('dompdf.wrapper') ;
        $report->loadView('reports.basic');
        
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
