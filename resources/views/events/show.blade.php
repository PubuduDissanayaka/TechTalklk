@extends('layouts.app')

@section('css')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDByltWl2odxcXj45rSl1rB7bqS6M2kTGg&callback=initMap" async defer></script>

<style>

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
    <div class="container-fluid px-xl-2">
        <section class="py-1">
                <div class="jumbotron eventjumbo jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4 eventtitle">{{$event->title}}</h1>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-sm-8">
                                    <p class="eventorg">hosted by : {{$event->user->name}}</p>
                                    <p class="eventorg">From : </p>
                                    <br><br>
                                    <div class="block">

                                        <a href="/events/{{$event->id}}/edit" class="btn btn-success">Edit Event</a>

                                        {{Form::open(['route'=>['events.destroy', $event->id],'method'=>'DELETE', 'class'=>'inline'])}}
                                        <br>
                                        <button type="submit"  class="btn btn-danger"><i class="fa fa-remove"></i> Delete Event</button>
                                        {!! Form::close() !!}
                                    </div>
                                    <br><br>
                                </div>
                                <div class="col-sm-4">
                                    <table class="table eventtable">
                                        <tbody>
                                            <tr>
                                                <td><h1><i class="far fa-calendar-alt"></i></h1></td>
                                                <td><p class="lead">{{date('F j, Y',strtotime($event->date))}}</p></td>
                                            </tr>
                                            <tr>
                                                <td><h1><i class="far fa-clock"></i></h1></td>
                                                <td><p class="lead"><i class="fas fa-at"></i> {{date('g:i A',strtotime($event->start))}} To <span>{{date('g:i A',strtotime($event->end))}}</span></p></td>
                                            </tr>
                                            <tr>
                                                <td><h1><i class="fas fa-map-marker-alt"></i></h1></td>
                                                <td><p class="lead">{{$event->address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end of jumbotron --}}

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <img class="img-fluid" src="{{ asset('img/events/cover/' . $event->cover)}}" alt="">
                                <hr>
                                <p class="lead">Description</p>
                                    <div class="eventdes">{!!$event->description!!}</div>
                                    <hr>
                                <p class="lead">Location</p>
                                <div id="geomap"></div>
                                <br>
                                {{-- comments --}}
                                <div class="event-comments-area">
                                        {{-- comment form --}}
                                        <label class="lead">Write Your comment</label>
                                        {!! Form::open(['route' => 'eventcomments.store']) !!}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea name="comment" id="" class="form-control event-comment-box" rows="6" required></textarea>
                                                </div>

                                                <div class="col-sm-12">
                                                        <br>
                                                    <input type="submit" value="Post Comment" class="form-control shadow btn btn-success">
                                                </div>
                                            </div>
                                        {{ Form::close()}}
                                        <br><br>
                                            <hr>
                                        <h4 class="event-com-count"><strong>{{$event->comments->count()}} Comments</strong></h4>
                                        @if (count($comment)>0)
                                        @foreach ($comment as $com)
                                                <div class="event-comment-list">
                                                    <div class="event-single-comment justify-content-between d-flex">
                                                        <div class="justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <img src="img/blog/c4.jpg" alt="">
                                                                <p class="lead"></p>
                                                            </div>
                                                            <div class="desc">
                                                                <h5><a href="#"></a><strong class="event-com-user"> {{$com->user->name}}</strong></h5>
                                                                <p class="date">{{date('F j, Y',strtotime($com->created_at))}} <i class="fa fa-at" aria-hidden="true"></i> {{date('g:i A',strtotime($com->created_at))}}</p>
                                                                <p class="event-comment blockquote-footer">
                                                                    {{$com->comment}}
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <div class="reply-btn">
                                                            <a href="" class="btn-reply text-uppercase">reply</a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                @endforeach
                                            @endif

                                    </div>



                            </div>
                            <div class="col-sm-4">
                                <p class="lead">Members</p>
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action">one</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- end of description --}}

                    <input type="hidden" id="lat"  value="{{$event->latitude}}">
                    <input type="hidden" id="lng"  value="{{$event->longtitude}}">
        </section>
        </div>

        {{-- end pageholder --}}

        </div>
    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var map;
    var marker;

    /*
     * Google Map with marker
     */
    function initialize() {
        var lat = document.getElementById("lat").value;
        var lng = document.getElementById("lng").value;

        var latlng = new google.maps.LatLng(lat, lng);
        var options = {
            zoom: 18,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("geomap"), options);

        marker = new google.maps.Marker({
            map: map,
            position: latlng
        });
    }

    $(document).ready(function () {
        //load google map
        initialize();
    });


</script>
@endsection
