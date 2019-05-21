@extends('layouts.app')

@section('css')
<style>

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
<div class="container-fluid px-xl-4">
<section>
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-12">
            <p class="lead">
                User Profile Page
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="rounded-circle mx-auto d-block" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" alt="Card image cap" width="200" height="auto">
                        <div class="card-body">
                            <p class="card-text lead">{{Auth::user()->name}} {{" "}} {{(Auth::user()->last_name)}}</p>
                            <p class="card-text">{{isset(Auth::user()->detail->designation) ? Auth::user()->detail->designation : ''}}</p>
                            <a href="#" class="btn btn-primary btn-block btn-sm"><i class="far fa-envelope"></i> Send Message</a>
                        </div>
                    </div>
                    <br>
                    {{-- <img alt="Bootstrap Image Preview" src="" class="" /> --}}
                    <div class="card">
                        <p class="card-header lead">Bio</p>
                        <div class="card-body">
                            <p class="card-text text-danger">
                                {{isset(Auth::user()->detail->bio) ? Auth::user()->detail->bio : 'no bio'}}
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <p class="card-header lead">Friends</p>
                        <div class="card-body">
                            <div class="list-group">
                                @forelse ($friends as $item)
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{$item->name}}</h5>
                                        <small>3 days ago</small>
                                        </div>
                                    </a>
                                @empty

                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>


{{-- end pageholder --}}

</div>
</div>
@include('layouts._footer')
@endsection
