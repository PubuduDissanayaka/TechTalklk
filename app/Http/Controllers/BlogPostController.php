<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Catagory;
use App\User;
use Illuminate\Support\Facades\DB;
//use Image;
use App\BlogComment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function index()
    {
        $cat = DB::table('catagories')->limit(5)->get();
        $data = BlogPost::orderBy('id','desc')->paginate(10);
        $popular = BlogPost::orderBy('id','desc')->limit(5)->get();
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
        // redirect
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
        //$comment = DB::table('blog_comments')->where('user_id', '=', $blogpost->id)->orderBy('updated_at','desc')->get();
        $tags = Tag::all();
        // $users = User::find($comment->user_id);
        // $users = User::all();
        // dd($users);
        $cat = DB::table('catagories')->limit(5)->get();
        // $ud = DB::table('blog_comments')->where('user_id', '=', $users->id)->get();
        // ->with('comment',$comment)
        $popular = BlogPost::orderBy('updated_at','desc')->limit(5)->get();
        return view('blogposts.show')->with('blogpost',$blogpost)->with('tags', $tags)->with('cat', $cat)->with('popular',$popular);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
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
