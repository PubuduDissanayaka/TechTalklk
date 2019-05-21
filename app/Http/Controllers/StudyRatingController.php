<?php

namespace App\Http\Controllers;

use App\StudyRating;
use Illuminate\Http\Request;
use App\User;
use App\Study;
use Notification;
use App\Notifications\NotifyStudyOwnerRatings;
use App\Notifications\NotifyStudyOwnerRatingsDB;
use Illuminate\Support\Facades\DB;

class StudyRatingController extends Controller
{
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
        $this -> validate($request, array(
            'values' => 'required',
            'feedback' => '',
            'user_id' => 'required',
            'study_id' => 'required',
            'star_status' => ''
        ));

        $studyRating = new StudyRating;

        $studyRating->value = $request->values;
        $studyRating->feedback = $request->feedback;
        $studyRating->user_id = $request->user_id;
        $studyRating->study_id = $request->study_id;
        $studyRating->star_status = $request->star_status;

        // dd($studyRating);
        $studyRating->save();

        $study = Study::find($request->study_id);

        // send notifications
        $users = User::where('id', '=', $study->user_id)->get();
        Notification::send($users, new NotifyStudyOwnerRatingsDB($studyRating));
        Notification::route('mail', $users)->notify(new NotifyStudyOwnerRatings($studyRating));

        // redirect
        toastr()->success('Study Programme Rated successfully!');
        return redirect()->route('study.show',$study->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudyRating  $studyRating
     * @return \Illuminate\Http\Response
     */
    public function show(StudyRating $studyRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudyRating  $studyRating
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyRating $studyRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudyRating  $studyRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyRating $studyRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudyRating  $studyRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyRating $studyRating)
    {
        //
    }
}
