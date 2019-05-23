<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use LaraFlash;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Notification;
use App\Notifications\NotifyNewEvent;
use App\Notifications\NotifyNewEventDB;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
        $this->middleware('verified');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $events = Event::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('start', 'LIKE', "%$keyword%")
                ->orWhere('end', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $events = Event::latest()->paginate($perPage);

        }

        return view ('events.index')->with('events',$events);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        // validate data
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'addr' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'user_id' => 'required',
            'cover' => 'image'

        ));

        // dd($request);
        // store data
        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->address = $request->addr;
        $event->latitude = $request->lat;
        $event->longtitude = $request->lng;
        $event->user_id = $request->user_id;

        //cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('img/events/cover/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);

            $event->cover = $filename;
        } else {
            //
        }

        $event->save();

        // notifications
        $users = User::where('id', '!=', auth()->user()->id)->get();
        Notification::send($users, new NotifyNewEventDB($event)); //DB
        Notification::route('mail', $users)->notify(new NotifyNewEvent($event)); //email

        // redirect
        toastr()->success('Event has been published successfully!');
        return redirect()->route('events.show',['id' => $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $comment = $event->comments;
        return view('events.show')->with('event',$event)->with('comment',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit')->with('event',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate data
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'addr' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'cover' => 'image'

        ));


        // store data
        $event = Event::find($id);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->address = $request->addr;
        $event->latitude = $request->lat;
        $event->longtitude = $request->lng;

        if ($request->hasFile('cover')) {
            //add new photo
            $oldFilename = $event->cover;
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('img/events/cover/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);


            //update database
            $event->cover = $filename;

            //delete old photo
            Storage::delete('public/img/events/cover/'.$oldFilename);

            $event->save();
        } else {
            //
        }


        // redirect
        $event->save();
        //dd($event);
        toastr()->success('Event has been Updated successfully!');
        return redirect()->route('events.show',['id' => $event->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event -> delete();

        $event = Event::all();
        toastr()->success('Event Cancelled');
        return redirect('/events')->with('event',$event);
    }
}
