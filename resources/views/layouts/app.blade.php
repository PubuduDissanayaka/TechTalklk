<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{Auth::check() ? Auth::user()->id : 'null'}}">

    <title>TechTalk</title>

    @include('layouts._css')
    @yield('parsleystyle')

    <style>
        .mynav{
            margin: 0px 5px 0px 5px;
            padding: 5px;
        }
        .navbar{
            padding: 0px 20px 0px 20px;
        }
</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow">
            @guest

            @else
            <a class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead" href="#"><i class="fas fa-align-left"></i></a>

            @endguest
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    TechTalk
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest

                    @else
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mynav">
                            <form id="searchForm" class="ml-auto d-none d-block">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search People ..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </li>
                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto position-relative">



                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mynav">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item mynav">
                                @if (Route::has('register-user.create'))
                                    <a class="nav-link" href="/register-user/create">Register</a>
                                @endif
                            </li>
                        @else

                        {{-- notifications --}}
                        <li class="nav-item dropdown ml-auto mynav"><a id="notify" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><h3 class="bellicon"><i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-pill badge-info">{{count(auth()->user()->unreadNotifications)}}</span></i></h3></a>
                            <div aria-labelledby="notify" class="dropdown-menu notifyarea">
                                {{-- <div class="dropdown-divider"></div> --}}
                            @if (count(Auth::user()->unreadNotifications)>0)
                                {{-- @forelse (Auth::user()->unreadNotifications as $unread)
                                    <div class="notfy">
                                            <a href="/blog-posts/{{$unread->data['dataid']}}" >
                                            <p class="notifytitle"><small>{{$unread->data['datauser']}}</small> Posted "<strong>{{$unread->data['datatitle']}}</strong>"</p>
                                            <p>{{$unread->created_at->diffForHumans()}}</p>
                                            </a>
                                    </div>

                                @empty
                                @endforelse --}}
                            @else
                            <a href="#" class="notifytitle">No notifications</a>

                            @endif

                            </div>
                        </li>
                        {{-- <notification v-bind:notifications="notifications"></notification> --}}
                        {{-- end notifications --}}

                            <li class="nav-item dropdown ml-auto mynav">
                                <a id="userInfo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                    @if ((Auth::User()->avatar)===null)
                                        <img src="{{Voyager::image(app('VoyagerAuth')->user()->avatar)}}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
                                    @else
                                        <img src="{{asset('img/avatar-6.jpg')}}"  alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">

                                    @endif
                                </a>
                                <div aria-labelledby="userInfo" class="dropdown-menu">
                                    <a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{ Auth::user()->name }}</strong><small>Web Developer</small></a>
                                  <div class="dropdown-divider"></div>
                                  <a href="/dashboard" class="dropdown-item">Dashboard</a>
                                  <a href="#" class="dropdown-item">Settings</a>
                                  <a href="#" class="dropdown-item">Activity log</a>
                                  <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <div class="wrapper">
            <div class="box-wrap">
                <div class="box one"></div>
                <div class="box two"></div>
                <div class="box three"></div>
                <div class="box four"></div>
                <div class="box five"></div>
                <div class="box six"></div>
            </div>
        </div>

    </div>
        <script>
            $(window).("load",function(){
                $(".wrapper").fadeOut("slow");
            });
        </script>
    @include('layouts._scripts')
    {{-- @include('layouts.toast') --}}
</body>
</html>
