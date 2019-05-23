<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\NewsFeed;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
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
        $perPage = 25;

        if (!empty($keyword)) {
            $newsfeed = NewsFeed::where('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $newsfeed = NewsFeed::latest()->paginate($perPage);
        }

        return view('news-feed.index', compact('newsfeed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('news-feed.create');
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

        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }

        NewsFeed::create($requestData);

        return redirect('news-feed')->with('flash_message', 'NewsFeed added!');
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
        $newsfeed = NewsFeed::findOrFail($id);

        return view('news-feed.show', compact('newsfeed'));
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
        $newsfeed = NewsFeed::findOrFail($id);

        return view('news-feed.edit', compact('newsfeed'));
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
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }

        $newsfeed = NewsFeed::findOrFail($id);
        $newsfeed->update($requestData);

        return redirect('news-feed')->with('flash_message', 'NewsFeed updated!');
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
        NewsFeed::destroy($id);

        return redirect('news-feed')->with('flash_message', 'NewsFeed deleted!');
    }
}
