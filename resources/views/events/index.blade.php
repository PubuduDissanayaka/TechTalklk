@extends('layouts.app')

@section('css')
    @include('layouts.toast')
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
        <div class="col-sm-12">
            <section class="jumbotron eventindex text-center">
                <div class="container">
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
    <div class="row">
        <div class="col-sm-9">
                <main role="main">
                        <div class="album">
                          <div class="container">
                  
                            <div class="row">

                              @if (count($events)>0)
                              @foreach ($events as $event)    
                              <div class="col-md-6">
                                <div class="card mb-4 box-shadow">
                                  <img class="card-img-top img-fluid" style="height:200px;" src="{{ asset('img/events/cover/' . $event->cover)}}" alt="Card image cap">
                                  <div class="card-body">
                                    <a href="/events/{{$event->id}}"><h4 class="card-title"><strong>{{$event->title}}</strong></h4></a>
                                    <p class="lead"></p>
                                    <p class=""><strong><i class="fas fa-map-marker-alt"></i></strong> {{$event->address}}</p>
                                    <p><strong><i class="far fa-clock"></i></strong> {{date('g:i A',strtotime($event->start))}} To <span>{{date('g:i A',strtotime($event->end))}}</p>
                                    <p><strong><i class="far fa-calendar-alt"></i></strong> {{date('F j, Y',strtotime($event->date))}}</p>
                                      {{-- <p style="text-align: justify;">{{substr(strip_tags($event->description), 0, 200)}} {{ strlen($event->description) > 200 ? "..........." : "" }}</p> --}}
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="btn-group">
                                        <a href="/events/{{$event->id}}"><button type="button" class="btn btn-sm btn-outline-info form-control">View</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @endforeach
                              @else
                                  <h3 class="display-4">No Events found here</h3>
                              @endif
                            </div>
                          </div>

                          <div class="text-center col-md-6 offset-3">                                        {{-- {{$data->appends(request()->query())->links()}} --}}
                              {!! $events->links() !!}
                          </div>
                        </div>
                      </main>
        </div>
        
        <div class="col-sm-3 py-3">
          <form method="GET" action="{{ url('/events') }}" accept-charset="UTF-8" role="search">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Events ..." value="{{ request('search') }}">
                <span class="input-group-append">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
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
    @include('layouts.toast')
@endsection
