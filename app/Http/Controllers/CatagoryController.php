<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;
use LaraFlash;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Catagory::all();
        return view ('catagory.index')->with('data',$data);
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
        // validate data
        $this -> validate($request, array(
            'name' => 'required|max:255',
            'description' => 'required'
        ));
        // store data
        $cat = new Catagory;

        $cat->name = $request->name;
        $cat->description = $request->description;

        $cat->save();
        // redirect
        $data = Catagory::all();
        toastr()->success('Catagory has been saved successfully!');
        return redirect()->route('catagories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Catagory::find($id);
        return view('catagory.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate data
        $this -> validate($request, array(
            'name' => 'required|max:255',
            'description' => 'required'
        ));
        // store data
        $cat = Catagory::find($id);

        $cat->name = $request->name;
        $cat->description = $request->description;

        $cat->save();
        // redirect
        $data = Catagory::all();
        toastr()->success('Catagory has been updated successfully!');
        return redirect ('/catagories')->with('data',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Catagory::find($id);
        $data -> delete();

        $data = Catagory::all();
        toastr()->error('Catagory Deleted');
        return redirect('/catagories')->with('data',$data);
    }
}
