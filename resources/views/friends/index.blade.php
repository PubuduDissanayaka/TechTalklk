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
                    <div class="row">
                        @foreach ($friends as $friend)
                        <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="" alt="">
                                    <div class="card-body">
                                        <a href="#"><h5 class="card-title">{{$friend->name}}</h5></a>
                                        <p class="card-text">{{$friend->email}}</p>
                                        <a href="{{route('messages.show', $friend->id)}}" class="btn btn-outline-info">Send A message</a>
                                    </div>
                                </div>                  
                                <br>
                            </div>
                            @endforeach
                    </div>

                    
                </section>
            </div>
        </div>
    </div> 
@endsection