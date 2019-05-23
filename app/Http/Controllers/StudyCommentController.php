<?php

namespace App\Http\Controllers;

use App\StudyComment;
use Illuminate\Http\Request;
use App\Study;
use App\Notifications\NotifyStudyOwner;
use App\Notifications\NotifyStudyOwnerDB;
use Notification;
use App\User;

class StudyCommentController extends Controller
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
        $this->validate($request, array(
            'comment' => 'required|max:255',
            'user_id' => 'required',
            'study_id' => 'required'
        ));

        $comment = new StudyComment();

        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->study_id = $request->study_id;


        $study = Study::find($request->study_id);

        $comment->save();
        // send notifications
        // dd($comment);
        $users = User::where('id', '=', $study->user_id)->get();
        Notification::send($users, new NotifyStudyOwnerDB($comment));
        Notification::route('mail', $users)->notify(new NotifyStudyOwner($comment));
        toastr()->success('Commented successfully!');

        $comments= StudyComment::all();
        return redirect()->route('study.show', $study)->with('comments', $comments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudyComment  $studyComment
     * @return \Illuminate\Http\Response
     */
    public function show(StudyComment $studyComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudyComment  $studyComment
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyComment $studyComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudyComment  $studyComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyComment $studyComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudyComment  $studyComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyComment $studyComment)
    {
        //
    }
}
