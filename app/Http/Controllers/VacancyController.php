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

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

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

        $requestData = $request->all();

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($requestData);

        return redirect('vacancy')->with('flash_message', 'Vacancy updated!');
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
}
