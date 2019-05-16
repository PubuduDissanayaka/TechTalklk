@extends('layouts.app')

@section('css')

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
            <section class="py-2">
                <div class="row">
                    <div class="col-md-12 container-fluid">
                        <div class="jumbotron studyjumbo">
                            <h1 class="display-4">Study Programmes</h1>
                            <p class="lead">Subtitle</p>
                            <hr class="my-4">
                            <p>Content</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-group">
                            @forelse ($study as $item)
                                <a href="/study/{{$item->id}}" class="list-group-item list-group-item-action flex-column align-items-start shadow">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/uploads/study/covers/' . $item->cover)}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <p class="mb-1 lead">{{$item->name}}</p>
                                                    <small>{{$item->created_at->diffForHumans()}}</small>
                                                </div>
                                                <p class="mb-1" style="text-align: justify;">{{substr(strip_tags($item->description), 0, 500)}} {{ strlen($item->description) > 500 ? "..........." : "" }}</p>
                                                <button href="/studydescription/{{$item->id}}" class="btn btn-info btn-sm">Read More <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
                                                <br>
                                                <small><p class="pull-right text-muted">Published by: {{$item->user->name}}</p></small>
                                        </div>
                                    </div>
                                </a>
                                <br>

                            @empty
                                <p class="lead"> No Job Vacancies Available Here</p>
                            @endforelse
                            <br>

                            <div class="row">
                                <div class="col-md-4 offset-4 d-block">
                                    <div class="pagination-wrapper"> {!! $study->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- {{Auth::user()->role_id}} --}}
                        @if ((Auth::user()->role_id) == 5)
                            <a href="{{ url('/study/create') }}" class="btn btn-success btn-sm" title="Add New Study">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        @else

                        @endif


                        <form method="GET" action="{{ url('/study') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search Programmes" value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
        </div>

        {{-- end pageholder --}}

    </div>
</div>
@endsection

@section('script')

@endsection
