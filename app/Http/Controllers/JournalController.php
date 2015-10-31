<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trigger;
use App\Medicine;
use App\Journal;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    private $journal;
    
    public function __construct(Request $request, Journal $journal) 
    {
//        $this->middleware('auth');
        
        $this->journal = $journal->where('user_id', Auth::user());
    }
    
    public function index()
    {
        $journal = $this->journal->get();
        
        return view('journal.index', compact('journal'));
    }
    
    public function store()
    {
        $journal = new Journal;
        $journal->fill(Request::all());
        $journal->user_id = Auth::id();
        $journal->touch();

        $journal->save();
    }
    
    public function show($id)
    {
        $journal = $this->journal->get();
        $journal = $journal->where('id', $id)->first();
        $trigger = new Trigger();
        $trigger->where('user_id', Auth::id());
        dd($trigger);
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
