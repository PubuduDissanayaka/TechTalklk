<?php

namespace App\Http\Controllers;

use App\EventComment;
use Illuminate\Http\Request;
use App\Event;

class EventCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'comment' => 'required|max:255',
            'user_id' => 'required',
            'event_id' => 'required'
        ));

        $comment = new EventComment();

        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->event_id = $request->event_id;


        $event = Event::find($comment->event_id);

        $comment->save();

        toastr()->success('Commented successfully!');

        $comments= EventComment::all();
        return redirect()->route('events.show', $event)->with('comments', $comments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function show(EventComment $eventComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function edit(EventComment $eventComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventComment $eventComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventComment $eventComment)
    {
        //
    }
}
