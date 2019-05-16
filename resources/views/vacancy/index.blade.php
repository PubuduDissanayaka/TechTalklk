@extends('layouts.app')

@section('content')
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron vacjumbo">
                    <h2>
                        TechTalk Job Market!
                    </h2>
                    <p>
                        This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                    </p>
                    <p>
                        @if ((Auth::user()->role_id) == 4 | (Auth::user()->role_id) == 5 | (Auth::user()->role_id) == 1 )
                            <a href="{{ url('/vacancy/create') }}" class="btn btn-success btn-sm" title="Add New NewsFeed">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @else

                        @endif
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-group">
                            @forelse ($vacancy as $item)
                                <a href="/vacancy/{{$item->id}}" class="list-group-item list-group-item-action flex-column align-items-start shadow">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('img/vacancy/cover/' . $item->cover)}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <p class="mb-1 lead">{{$item->title}}</p>
                                                    <small>{{$item->created_at->diffForHumans()}}</small>
                                                </div>
                                                <p class="mb-1" style="text-align: justify;">{{substr(strip_tags($item->details), 0, 500)}} {{ strlen($item->details) > 500 ? "..........." : "" }}</p>
                                                <button href="/vacancy/{{$item->id}}" class="btn btn-info btn-sm">Read More <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
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
                                    <div class="pagination-wrapper d-block"> {!! $vacancy->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <form method="GET" action="{{ url('/vacancy') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search Job Vacancies..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
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
@endsection

