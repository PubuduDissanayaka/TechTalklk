<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NotifyNewStudy;
use App\Notifications\NotifyNewStudyDB;
use Notification;
use Illuminate\Support\Facades\DB;
use App\StudyRating;
use App\User;
use Auth;
use Mail;
use Session;

class StudyController extends Controller
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
        $perPage = 15;

        if (!empty($keyword)) {
            $study = Study::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('cover', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('google', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('document', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $study = Study::latest()->paginate($perPage);
        }

        return view('study.index', compact('study'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('study.create');
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
            'name' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'google' => '',
            'cover' => 'image',
            'photo' => 'image',
            'document' => 'mimes:pdf'

        ));

        // store data
        $study = new Study;

        $study->name = $request->name;
        $study->description = $request->description;
        $study->user_id = $request->user_id;
        $study->google = $request->google;

        //cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('storage/uploads/study/covers/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);

            $study->cover = $filename;
        } else {
            $study->cover = "no_image.jpg";
        }

        //photo
        if ($request->hasFile('photo')) {
            $photos = $request->file('photo');
            $filename = time(). '.' . $photos->getClientOriginalExtension();
            $location = public_path('storage/uploads/study/photos/' . $filename);
            Image::make($photos)->resize(800,400)->save($location);

            $study->photo = $filename;
        } else {

        }

        //Document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = time(). '.' . $document->getClientOriginalExtension();
            // $document->move('vacancies/document', $filename);
            Storage::putFileAs('public/uploads/study/documents', new File($document), $filename);

            $study->document = $filename;
        } else {

        }

        // dd($study->document);
        $study->save();

        // send notifications
        $users = User::where('id', '!=', $request->user_id)->get();
        Notification::send($users, new NotifyNewStudyDB($study));
        Notification::route('mail', $users)->notify(new NotifyNewStudy($study));

        // redirect
        toastr()->success('Study Programme Published Successfully!');
        return redirect()->route('study.show',$study->id);
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
        $study = Study::findOrFail($id);
        $all = $study->studyratings;
        // $allvalues = DB::table('study_ratings')->where('study_id','=', $study->id)->get();
        $count =  $all->count();
        $avarage = $all->pipe(function($all) {
            return $all->avg('value');
        });

        $five = $all->filter(function($all) {
                return $all->value == 5;
        });
        $numoffive = count($five);
        $fivepresentage = ($numoffive/$count) * 100;

        $four = $all->filter(function($all) {
                return $all->value == 4;
        });
        $numoffour = count($four);
        $fourpresentage = ($numoffour/$count) * 100;

        $three = $all->filter(function($all) {
                return $all->value == 3;
        });
        $numofthree = count($three);
        $threepresentage = ($numofthree/$count) * 100;

        $two = $all->filter(function($all) {
                return $all->value == 2;
        });
        $numoftwo = count($two);
        $twopresentage = ($numoftwo/$count) * 100;

        $one = $all->filter(function($all) {
                return $all->value == 1;
        });
        $numofone = count($one);
        $onepresentage = ($numofone/$count) * 100;
        // dd($fivepresentage);

        return view('study.show', compact('study' , 'avarage', 'fivepresentage', 'fourpresentage', 'threepresentage' , 'twopresentage', 'onepresentage'));
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
        $study = Study::findOrFail($id);

        return view('study.edit', compact('study'));
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
            'name' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'google' => '',
            'cover' => 'image',
            'photo' => 'image',
            'document' => 'mimes:pdf'

        ));

        $study = Study::findOrFail($id);


        $study->name = $request->name;
        $study->description = $request->description;
        $study->user_id = $request->user_id;
        $study->google = $request->google;

        //cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('storage/uploads/study/covers/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);

            $study->cover = $filename;
        } else {

        }

        //photo
        if ($request->hasFile('photo')) {
            $photos = $request->file('photo');
            $filename = time(). '.' . $photos->getClientOriginalExtension();
            $location = public_path('storage/uploads/study/photos/' . $filename);
            Image::make($photos)->resize(800,400)->save($location);

            $study->photo = $filename;
        } else {

        }

        //Document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = time(). '.' . $document->getClientOriginalExtension();
            // $document->move('vacancies/document', $filename);
            Storage::putFileAs('public/uploads/study/documents', new File($document), $filename);

            $study->document = $filename;
        } else {

        }

        // dd($study->document);
        $study->save();


        toastr()->success('Study Programme Updated Successfully!');
        return redirect()->route('study.show',$study->id);
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
        Study::destroy($id);

        return redirect('study')->with('flash_message', 'Study deleted!');
    }


    public function apply(Request $request){

        $this -> validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => '',
            'application' => 'required| mimes:pdf',
            'studid' => 'required',
            'studuser' => 'required',
            'studtitle' => 'required'
        ));

        if ($request->hasFile('application')) {
            $document = $request->file('application');
            $filename = time(). '.' . $document->getClientOriginalExtension();
            // $document->move('vacancies/document', $filename);
            Storage::putFileAs('public/uploads/study/documents/applications', new File($document), $filename);

            $application = $filename;
        } else {

        }
        // dd($request);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodymessage' => $request->message,
            'application' => $application,
            'studid' => $request->studid,
            'studuser' => $request->studuser,
            'studtitle' => $request->studtitle
        );

        Mail::send('emails.studyapplications', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($data['studuser']);
            $message->subject('Application for '. $data['studtitle'] . ' Study Programme');
        });

         $studid = $request->studid;

        toastr()->success('Your Application sent Successfully!');
        return redirect()->route('study.show',$studid);
    }
}
