@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
    {{-- sideBar --}}
    <div class="d-flex align-items-stretch">
        {{-- end sideBar --}}

        {{-- page holder --}}
        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-4">
                <section class="py-2">
                    <div class="row">
                        @forelse ($friends as $friend)
                            <div class="col-sm-3">
                                <div class="card friend-card">
                                    <img class="card-img-top" src="" alt="">
                                    {{-- <img class="img-member circle" src="http://via.placeholder.com/150x150/333333/FFFffff"> --}}
                                    <onlineuser v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers"></onlineuser>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <a href="#">
                                                <h5>
                                                    {{$friend->name}}
                                                </h5>
                                            </a>

                                        </div>
                                        <p class="card-text friend-card-text">{{$friend->email}}</p>
                                        <a href="{{route('chat.show', $friend->id)}}" class="btn btn-outline-info">Send A message</a>
                                    </div>
                                </div>
                                <br>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Friends</h5>
                                        <p class="card-text">You don't have any Friend </p>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                    </div>


                </section>
            </div>
        </div>
    </div>
@endsection
