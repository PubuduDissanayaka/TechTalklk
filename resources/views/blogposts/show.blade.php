@extends('layouts.app')
{{-- <img class="d-block w-100 img-fluid bcover" src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?cs=srgb&dl=beach-exotic-holiday-248797.jpg&fm=jpg" alt="First slide"> --}}
@section('css')
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/home/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/home/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/home/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/home/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/home/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/home/nice-select/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/home/animate-css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/home/flaticon/flaticon.css')}}">
  <!-- main css -->
  <link rel="stylesheet" href="{{asset('css/home/style.css')}}">

  <style>
      body{
          font-family: 'Poppins', 'Raleway', 'Muli', sans-serif;
          font-size: 16px;
          line-height: 1.5em;
      }
  </style>
@endsection

@section('content')
{{-- sideBar --}}
<div class="d-flex align-items-stretch">
<div id="sidebar" class="sidebar">
    @include('layouts._sidebar')
</div>
{{-- end sideBar --}}

{{-- page holder --}}
<div class="page-holder w-100 d-flex flex-wrap">
<div class="container-fluid">
<section class="">
        <section class="blog_area single-post-area section_gap py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 posts-list">
                            <div class="single-post row">
                                <div class="col-lg-12">
                                    <div class="feature-img">
                                        <img class="img-fluid" id="myImg" src="{{ asset('img/blog/cover/' . $blogpost->cover)}}" alt="Cover image">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="blog_info text-right">
                                        <div class="post_tag">
                                            <a href="#">Food,</a>
                                            <a class="active" href="#">Technology,</a>
                                            <a href="#">Politics,</a>
                                            <a href="#">Lifestyle</a>
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="#">{{$blogpost->user->name}}<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#">{{$blogpost->catagory->name}}<i class="fas fa-archive"></i></a></li>                                            
                                            <li><a href="#">{{$blogpost->created_at}}<i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#">{{$blogpost->comments->count()}} Comments<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 blog_details">
                                    <h2>{{$blogpost->title}}</h2>
                                    <p class="excert">
                                        {!!$blogpost->body!!}
                                    </p>

                                </div>
                            </div>
                            <hr>
                            {{-- <div class="navigation-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="#">
                                                <h4>Space The Final Frontier</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="#">
                                                <h4>Telescopes 101</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                        </div>
                                        <div class="thumb">
                                            <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <br>
                            <div class="comments-area">
                                {{-- comment form --}}
                                <label class="lead">Write Your comment</label>
                                {!! Form::open(['route' => 'comments.store']) !!}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="post_id" value="{{$blogpost->id}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea name="comment" id="" class="form-control" rows="6" required></textarea>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                                <br>
                                            <input type="submit" value="Post Comment" class="form-control shadow btn btn-outline-success">
                                        </div>
                                    </div>
                                {{ Form::close()}}  
                                <br><br>

                                <h4>{{$blogpost->comments->count()}} Comments</h4>
                                {!!$blogpost->find($blogpost->id)->comments[id]!!}
                                {{-- @if (count($comment)>0)
                                @foreach ($comment as $com)
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c4.jpg" alt="">
                                                        <p class="lead"></p>
                                                    </div>
                                                    <div class="desc"> --}}
                                                        {{-- <h5><a href="#"></a> {{$com->user->name}}</h5> --}}
                                                        {{-- <p class="date">{{$com->created_at}} </p>
                                                        <p class="comment">
                                                            {{$com->comment}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif --}}
                                    
                            </div>

                            
                        </div>
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <aside class="single_sidebar_widget search_widget">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Posts">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                        </span>
                                    </div>
                                    <div class="br"></div>
                                </aside>
                                <aside class="single_sidebar_widget author_widget">
                                    <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                                    <h4>Charlie Barber</h4>
                                    <p>Senior blog writer</p>
                                    <div class="social_icon">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-github"></i></a>
                                        <a href="#"><i class="fa fa-behance"></i></a>
                                    </div>
                                    <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                                    <div class="br"></div>
                                </aside>
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <h3 class="widget_title">Popular Posts</h3>
                                    @if (count($popular)>0)
                                        @foreach ($popular as $pop)
                                            <div class="media post_item">
                                                <div class="media-body">
                                                    <a href="/blog-posts/{{$pop->id}}">
                                                        <h3>{{$pop->title}}</h3>
                                                    </a>
                                                    <p>{{$pop->user->name}}</p>
                                                </div>
                                            </div> 
                                        @endforeach
                                    @else
                                        {{-- // --}}
                                    @endif
                                    <div class="br"></div>
                                </aside>
                                <aside class="single_sidebar_widget ads_widget">
                                    <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                                    <div class="br"></div>
                                </aside>
                                <aside class="single_sidebar_widget post_category_widget">
                                    <h4 class="widget_title">Post Catgories</h4>
                                    <ul class="list cat-list">
                                            @if (count($cat)>0)
                                            @foreach ($cat as $cat)
                                                <li>
                                                    <a href="#" class="d-flex justify-content-between">
                                                        <p>{{$cat->name}}</p>
                                                        <p>37</p>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <a href="#" class="d-flex justify-content-between">
                                                    <p>No Catagory Found</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="br"></div>
                                </aside>
                                
                                <aside class="single-sidebar-widget tag_cloud_widget">
                                    <h4 class="widget_title">Tag Clouds</h4>
                                    <ul class="list">
                                        @foreach ($tags as $tag)
                                            
                                        <li><a href="#">{{$tag->name}}</a></li>
                                        @endforeach
                                        
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
            
            <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');
                    
                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById('myImg');
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function(){
                      modal.style.display = "block";
                      modalImg.src = this.src;
                      captionText.innerHTML = this.alt;
                    }
                    
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() { 
                      modal.style.display = "none";
                    }
                    </script>
</section>
</div>

{{-- end pageholder --}}

</div>
</div>
@endsection

@section('script')
    	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	{{-- <script src="{{asset('js/home/jquery-3.2.1.min.js')}}"></script> --}}
	{{-- <script src="{{asset('js/home/popper.js')}}"></script> --}}
	{{-- <script src="{{asset('js/home/bootstrap.min.js')}}"></script> --}}
	<script src="{{asset('js/home/stellar.js')}}"></script>
	<script src="{{asset('js/home/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('vendor/home/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('vendor/home/isotope/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{asset('vendor/home/isotope/isotope-min.js')}}"></script>
	<script src="{{asset('vendor/home/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/home/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('vendor/home/counter-up/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('vendor/home/counter-up/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('js/home/mail-script.js')}}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{asset('js/home/gmaps.min.js')}}"></script>
	<script src="{{asset('js/home/theme.js')}}"></script>
@endsection