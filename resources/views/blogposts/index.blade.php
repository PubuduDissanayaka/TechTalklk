@extends('layouts.app')

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
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
{{-- sideBar --}}
<div class="d-flex align-items-stretch">
<div id="sidebar" class="sidebar">
    @include('layouts._sidebar')
</div>
{{-- end sideBar --}}

{{-- page holder --}}
<div class="page-holder w-100 d-flex flex-wrap">
<div class="container-fluid px-xl-2">
<section class="">
        <section class="blog_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog_left_sidebar">
                                @if (count($data)>0)
                                    @foreach ($data as $dat)
                                        <article class="row blog_item">
                                            <div class="col-md-3">
                                                <div class="blog_info text-right">
                                                    <div class="post_tag">
                                                        <a href="#">Food,</a>
                                                        <a class="active" href="#">Technology,</a>
                                                        <a href="#">Politics,</a>
                                                        <a href="#">Lifestyle</a>
                                                    </div>
                                                    <ul class="blog_meta list">
                                                        <li><a href="#">{{$dat->user->name}}<i class="lnr lnr-user"></i></a></li>
                                                        <li><a href="#">{{$dat->catagory->name}}<i class="fas fa-archive"></i></a></li>
                                                        <li><a href="#">{{date('F j, Y',strtotime($dat->created_at))}}<i class="lnr lnr-calendar-full"></i></a></li>
                                                        <li><a href="#">{{date('g:i A',strtotime($dat->created_at))}}<i class="far fa-clock"></i></a></li>                                                        
                                                        <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                                        <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="blog_post">
                                                    <img src="{{ asset('img/blog/cover/' . $dat->cover)}}" alt="Cover Image">
                                                    <div class="blog_details">
                                                        <a href="/blog-posts/{{$dat->id}} ">
                                                            <h2>{{$dat->title}}</h2>
                                                        </a>
                                                        <p>{{substr(strip_tags($dat->body), 0, 500)}} {{ strlen($dat->body) > 500 ? "..." : "" }}</p>
                                                        <a href="/blog-posts/{{$dat->id}} " class="blog_btn btn btn-outline-primary">View More >></a>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                @else
                                    <p class="display-4">No Blog post found here</p>
                                @endif

                                <div class="text-center col-md-6 offset-3">                                        {{-- {{$data->appends(request()->query())->links()}} --}}
                                        {!! $data->links() !!}
                                    
                                </div>

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
                                        <li><a href="#">Technology</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Architecture</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Technology</a></li>
                                        <li><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Adventure</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Adventure</a></li>
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</section>
</div>

{{-- end pageholder --}}

</div>
</div>
@endsection

@section('script')
    	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('js/home/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/home/popper.js')}}"></script>
	<script src="{{asset('js/home/bootstrap.min.js')}}"></script>
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