<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Auth;

class JournalController extends Controller
{
    public function __construct() 
    {
//        $this->middleware('auth');
        $this->request = $request;
        $this->journal = $journal->where('user_id', Auth::id());
    }
    
    public function index()
    {
        $journal = $this->journal->get();
        
        return view('journal.index', compact('journal'));
    }
    
    public function store()
    {
    $request = $this->request;
    $journal = $journal->create($request->input());
    
    $journal->save();
    }
    
    public function show($id)
    {
        $journal = $this->journal->get();
        $journal = $journal->where('id', $id)->first();
        
        return view('journal.show', compact('journal'));
    }
    
    public function create()
    {
        return view('journal.view');
    }
    
    public function edit($id, Request $request)
    {
        $journal = $this->journal->where('id', $id)->first();
        
        return view('journal.edit', compact('journal'));
    }
    
    public function update($id)
    {
        $request = $this->request;
        $journal = $this->journal->where('id', $id)->first();
        $journal->fill($request->input())->save();
        
        return redirect('journal');
    }    
}
