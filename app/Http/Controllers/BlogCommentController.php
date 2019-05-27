<?php

namespace App\Http\Controllers;

use App\BlogComment;
use Illuminate\Http\Request;
use App\BlogPost;
use App\User;
use App\Notifications\NotifyBlogPostOwner;
use App\Notifications\NotifyBlogPostOwnerDB;
use Notification;

class BlogCommentController extends Controller
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
            'post_id' => 'required'
        ));

        $comment = new BlogComment();

        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;


        $post = BlogPost::find($comment->post_id);

        $comment->save();

        toastr()->success('Commented successfully!');

        $comments= BlogComment::all();


        // $user = $post->user->id;
        $post = BlogPost::find($comment->post_id);
        $users = User::find($post->user_id);
        // $user = $comment->post_id->id;
        // dd($users);

        // dd($comment);
        // $users->notify(new NotifyBlogPostOwnerDB($comment));
        Notification::send($users, new NotifyBlogPostOwnerDB($comment));
        Notification::route('mail', $users)->notify(new NotifyBlogPostOwner($comment));
        return redirect()->route('blog-posts.show', $post)->with('comments', $comments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }
}
