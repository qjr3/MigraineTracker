<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Auth;
use App\Trigger;
use App\Medicine;
use App\Journal;

class JournalController extends Controller
{
    private $request;
    private $journal;
    
    public function __construct(Request $request, Journal $journal) 
    {
//        $this->middleware('auth');
        $this->request = $request;
        
        $this->journal = $journal->where('user_id', 1);
//        $this->journal = $journal->where('user_id', Auth::user()->id);
    }
    
    public function index()
    {
        $journal = $this->journal->get();
        
        return view('journal.index', compact('journal'));
    }
    
    public function store()
    {
        $request = $this->request;
        $journal = new Journal;
        $journal->fill($request->input());
        $journal->user_id = 1;
        $journal->touch();
        $journal->save();
    }
    
    public function show($id)
    {
        $journal = $this->journal->get();
        $journal = $journal->where('id', $id)->first();
        
        return view('journal.view', compact('journal'));
    }
    
    public function create()
    {
        return view('journal.create');
    }
    
    public function edit($id, Request $request)
    {
        $journal = $this->journal->where('id', $id)->first();
        
        return view('journal.update', compact('journal'));
    }
    
    public function update($id)
    {
        $request = $this->request;
        $journal = $this->journal->where('id', $id)->first();
        $journal->touch();
        $journal->fill($request->input())->save();
        
        return redirect('journal');
    }    
}
