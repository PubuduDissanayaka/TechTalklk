@extends('layouts.app')

@section('content')
<div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
    </div>
{{-- end sideBar --}}

    {{-- page holder --}}
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-2">
            <section class="py-2">
                <!-- Page Content -->
                <div class="px-3">

                    <!-- Page Heading/Breadcrumbs -->
                    <h1 class="mt-4 mb-3 basictitle courcetitle">{{$cource->title}}
                    </h1>
                    <p class="lead ">
                    <small>by
                        <a href="#">{{$cource->user->name}}</a>
                    </small>
                    </p>
                    <div class="row">
                
                    <!-- Post Content Column -->
                    <div class="col-lg-8">
                
                        <!-- Preview Image -->
                        <img class="img-fluid" src="{{asset('img/cource/cover/' . $cource->cover)}}" alt="">
                
                        <hr>
                
                        <!-- Date/Time -->
                        <p>Posted on {{date('F j, Y',strtotime($cource->created_at))}} at {{date('g:i A',strtotime($cource->created_at))}}</p>
                
                        <hr>
                
                        <!-- Post Content -->
                        <div class="lead">
                            {!!$cource->description!!}
                        </div>

                        <div class="col-md-12">
                        <iframe src="{{$cource->google}}?embedded=true" width="100%" height="1600" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                        </div>
                        <hr>                
                        <!-- Comments Form -->
                        <div class="card my-4">
                        <h5 class="card-header">Leave a Comment:</h5>
                        <div class="card-body">
                            <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        </div>
                
                        <!-- Single Comment -->
                        <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                        </div>
                
                        <!-- Comment with nested comments -->
                        <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                
                            <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            </div>
                
                            <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                            </div>
                
                        </div>
                        </div>
                
                    </div>
                
                    <!-- Sidebar Widgets Column -->
                    <div class="col-md-4">
                
                        <!-- Search Widget -->
                        <div class="card mb-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-append">
                                <button class="btn btn-outline-primary" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                        </div>
                
                        <!-- Categories Widget -->
                        <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                
                        <!-- Side Widget -->
                        <div class="card my-4">
                        <h5 class="card-header">Side Widget</h5>
                        <div class="card-body">
                            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                        </div>
                        </div>
                
                    </div>
                
                    </div>
                    <!-- /.row -->
                
                </div>
                <!-- /.container -->
            </section>
        </div>
    </div>
</div>
@endsection