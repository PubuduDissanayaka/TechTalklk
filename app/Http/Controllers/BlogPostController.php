<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\BlogPost;
use App\Catagory;
use App\User;
use Illuminate\Support\Facades\DB;
use App\BlogComment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Tag;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Notifications\NotifyNewBlogPost;
use App\Notifications\NotifyNewBlogPostDB;
use Notification;


class BlogPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $data = BlogPost::where('title', 'LIKE', "%$keyword%")
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('cat_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
            $cat = DB::table('catagories')->limit(5)->get();
            $popular = BlogPost::orderBy('id','desc')->limit(5)->get();
        } else {
            $data = BlogPost::latest()->paginate($perPage);
            $cat = DB::table('catagories')->limit(5)->get();
            $popular = BlogPost::orderBy('id','desc')->limit(5)->get();
        }

        return view ('blogposts.index')->with('data',$data)->with('cat',$cat)->with('popular',$popular);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Catagory::all();
        return view ('blogposts.create')->with('cat',$cat);
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
            'user_id' => 'required',
            'cat_id' => 'required',
            'cover' => 'image'

        ));
        // store data
        $blogpost = new BlogPost;

        $blogpost->title = $request->title;
        $blogpost->body = $request->description;
        $blogpost->user_id = $request->user_id;
        $blogpost->cat_id = $request->cat_id;

        //cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('img/blog/cover/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);

            $blogpost->cover = $filename;
        } else {
            $blogpost->cover = "no_image.jpg";
        }


        $blogpost->save();

        // send notifications
        $users = User::where('id', '!=', auth()->user()->id)->get();
        Notification::send($users, new NotifyNewBlogPostDB($blogpost));
        Notification::route('mail', $users)->notify(new NotifyNewBlogPost($blogpost));

        // redirect
        toastr()->success('Blog Post Created successfully!');
        return redirect()->route('blog-posts.show',$blogpost->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogpost = BlogPost::find($id);
        $comment = $blogpost->comments;
        //$comment = DB::table('blog_comments')->where('post_id', '=', $blogpost->id)->orderBy('updated_at','desc')->get();
        $tags = Tag::all();

        $cat = DB::table('catagories')->limit(5)->get();

        $popular = BlogPost::orderBy('updated_at','desc')->limit(5)->get();
        return view('blogposts.show')->with('blogpost',$blogpost)->with('tags', $tags)->with('cat', $cat)->with('popular',$popular)->with('comment',$comment);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blogpost = BlogPost::find($id);
        $cat = DB::table('catagories')->limit(5)->get();
        return view('blogposts.edit')->with('blogpost',$blogpost)->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        // validate data
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'cat_id' => 'required',
            'cover' => 'image'

        ));
        // store data
        $blogpost = BlogPost::find($id);

        $blogpost->title = $request->title;
        $blogpost->body = $request->description;
        $blogpost->user_id = $request->user_id;
        $blogpost->cat_id = $request->cat_id;

        //cover image
        if ($request->hasFile('cover')) {
            //add new photo
            $oldFilename = $blogpost->cover;
            $cover = $request->file('cover');
            $filename = time(). '.' . $cover->getClientOriginalExtension();
            $location = public_path('img/blog/cover/' . $filename);
            Image::make($cover)->resize(800,400)->save($location);


            //update database
            $blogpost->cover = $filename;

            //delete old photo
            Storage::delete('public/img/events/cover/'.$oldFilename);

            $blogpost->save();
        } else {

        }


        $blogpost->save();
        // redirect
        toastr()->success('Blog Post has been Updated successfully!');
        return redirect()->route('blog-posts.show',$blogpost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }
}
