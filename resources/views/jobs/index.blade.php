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
        <div class="container-fluid py-2 px-xl-2">
            <section class="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="jumbotron jobindex text-center">
                                    <div class="container-fluid">
                                        <p class="jumbotron-heading eventheadtitle">Bringing the world together through live experiences</p>
                                        <p class="lead eventheaddes">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                                        <p>
                                            <a href="/events/create" class="btn btn-primary my-2 lead">Create an Event</a>
                                            <a href="#" class="btn btn-secondary my-2 lead">Contact Customer Care</a>
                                        </p>
                                    </div>
                                </section> 
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <h1>
                                        <small>Vacancies</small>
                                    </h1>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        @if (count($jobs)>0)
                                        @foreach($jobs as $item)
                                                <div class="col-md-4">
                                                        <div class="card jobcard">
                                                            <img class="card-img-top" src="..." alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{$item->title}}</h4>
                                                                <hr>
                                                                <p></p>
                                                                <p class="card-text">{{substr(strip_tags($item->description), 0, 500)}} {{ strlen($item->description) > 500 ? "..." : "" }}</p>
                                                                <a href="/jobs/{{$item->id}}" class="btn btn-success">View More <i class="fas fa-greater-than    "></i></a>
                                                            </div>
                                                        </div>
                                                    <br>
                                                </div>
                                                @endforeach
                                            @else
                                                <p class="lead"> nothing found Job Vacancies here</p>
                                            @endif
                                            <br>
                                            
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <a href="{{ url('/jobs/create') }}" class="btn btn-primary btn-lg" title="Add New Job">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                        </a>
                                        <br> <br>

                                    <form method="GET" action="{{ url('/jobs') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                            <span class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                    <br><br>
                                    <h2>
                                        Heading
                                    </h2>
                                    <p>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                    </p>
                                    <p>
                                        <a class="btn" href="#">View details »</a>
                                    </p>
                                </div>
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
{{-- 
@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Jobs</div>
                    <div class="card-body">
                        <a href="{{ url('/jobs/create') }}" class="btn btn-success btn-sm" title="Add New Job">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/jobs') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Description</th><th>Jobrole</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->description }}</td><td>{{ $item->jobrole }}</td>
                                        <td>
                                            <a href="{{ url('/jobs/' . $item->id) }}" title="View Job"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/jobs/' . $item->id . '/edit') }}" title="Edit Job"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/jobs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Job" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $jobs->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
