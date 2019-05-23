<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Notifications\NotifyNewVacancy;
use App\Notifications\NotifyNewVacancyDB;
use Notification;
use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use Session;

class VacancyController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $vacancy = Vacancy::where('title', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vacancy = Vacancy::latest()->paginate($perPage);
        }

        return view('vacancy.index', compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        // validate data
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'end' => '',
            'cover' => 'image'

        ));


        // store data
        $vac = new Vacancy;

        $vac->title = $request->title;
        $vac->details = $request->description;
        $vac->user_id = $request->user_id;
        $vac->end = $request->end;


        //cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('img/vacancy/cover/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);

            $vac->cover = $filename;
        } else {
            $vac->cover = "no_image.jpg";
        }

        //Document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = time(). '.' . $document->getClientOriginalExtension();
            // $document->move('vacancies/document', $filename);
            Storage::putFileAs('public/uploads/vacancies/document', new File($document), $filename);

            $vac->document = $filename;
        } else {

        }
        $vac->save();

        // send notifications
        $users = User::where('id', '!=', $request->user_id)->get();
        // dd($users);
        Notification::send($users, new NotifyNewVacancyDB($vac));
        Notification::route('mail', $users)->notify(new NotifyNewVacancy($vac));

        // redirect
        toastr()->success('Job Vacancy Published Successfully!');
        return redirect()->route('vacancy.show',$vac->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        return view('vacancy.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        return view('vacancy.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        // validate data
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'end' => '',
            'cover' => 'image'

        ));

        $vac = Vacancy::findOrFail($id);
        // dd($request);
        $vac->title = $request->title;
        $vac->details = $request->description;
        $vac->user_id = $request->user_id;
        $vac->end = $request->end;

        //cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('img/vacancy/cover/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);

            $vac->cover = $filename;
        } else {

        }

        //Document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = time(). '.' . $document->getClientOriginalExtension();
            // $document->move('vacancies/document', $filename);
            Storage::putFileAs('public/uploads/vacancies/document', new File($document), $filename);

            $vac->document = $filename;
        } else {

        }

        $vac->update();

        toastr()->success('Job Vacancy Updated Successfully!');
        return redirect()->route('vacancy.show',$vac->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Vacancy::destroy($id);

        return redirect('vacancy')->with('flash_message', 'Vacancy deleted!');
    }

    public function apply(Request $request){
        $this -> validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => '',
            'cv' => 'required',
            'vacid' => 'required',
            'vacuser' => 'required',
            'vactitle' => 'required'
        ));

        if ($request->hasFile('cv')) {
            $document = $request->file('cv');
            $filename = time(). '.' . $document->getClientOriginalExtension();
            // $document->move('vacancies/document', $filename);
            Storage::putFileAs('public/uploads/vacancies/document/applycv', new File($document), $filename);

            $cv = $filename;
        } else {

        }

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodymessage' => $request->message,
            'cv' => $cv,
            'vacid' => $request->vacid,
            'vacuser' => $request->vacuser,
            'vactitle' => $request->vactitle
        );

        Mail::send('emails.sendcv', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($data['vacuser']);
            $message->subject('Apply for '. $data['vactitle'] . ' Job Vacancy');
        });

         $vacid = $request->vacid;

        toastr()->success('Your CV sent Successfully!');
        return redirect()->route('vacancy.show',$vacid);
    }
}
