<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
use App\Journal;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\NoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $collection = Auth::user()->notes()->where('name', $request->get('name'))->get();
        if($collection->isEmpty()) {
            $notes = new Note();
            $notes->fill($request->all());
            Auth::user()->note()->save($notes);
        }else{
            $notes = $collection->first();
        }
        if($request->has('journal')) {
            $jID = $request->get('journal');
            $journal = Journal::findOrFail($jID);
            $journal->note()->attach($notes);
        }
        return redirect()->back();
    }

    public function index()
    {
        $notes = Auth::user()->notes;
        return view('notes.index', compact('notes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Note $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('notes'));
    }

    /**
     * Edit an existing Note
     * 
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\NoteRequest  $request
     * @param  Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, Note $note)
    {
        $note->fill($request->all());
        $note->save();
        return redirect()->back(); // this should be: return redirect('something'); do not return text/string unless testing (prior to commit)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        $notes = Note::all();
        return redirect()->back();
    }
    
    // Accept AJAX route, receive ajax data from form
    public function addNote()
    {
        if(Request::ajax())
        {
            $note = new Note();
            $note->name = Request::input('name');
            $note->description = Request::input('description');
            $note->save();
            
            $response = 
            [
                'status' => 'success',
                'msg' => 'Note addeed',
            ];
            
            return Response::json($response);
        }       
    }
}
