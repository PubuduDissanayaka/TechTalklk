@extends('layouts.app')

@section('css')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ck5lksam8dja2hvssb8hndfyhnd9qxvwobl1z6lxjuwyswym"></script>
{{-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSOSbY0FCY3UKXPV3YrBYbZ6CdS01xoxc"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSOSbY0FCY3UKXPV3YrBYbZ6CdS01xoxc&libraries=places"></script>
<script>
tinymce.init({ 
    selector:'#blogwrite',
    resize: false,                   
    plugins: 'link image table advlist autolink imagetools table spellchecker lists charmap print preview',
    contextmenu_never_use_native: true, 
    plugins : 'advlist autolink table link image lists charmap print preview'
});
</script>


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
    <div class="container-fluid px-xl-4">
        <section class="py-5">
            {!! Form::open(['route' => ['events.update',$event->id], 'data-parsley-validate'=> '', 'files'=> true]) !!}
            {{Form::hidden('_method','PUT')}}
            <div class="row">
                    <div class="col-sm-8">
                        <h3 class="display-4">Edit Event</h3><br>
                        <label class="form-control-label text-uppercase">Event Title</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-angellist"></i></span></div>
                            {{Form::text('title',$event->title,array('class'=>"form-control form-control-lg", 'required' => '','maxlength'=>'255' , 'placeholder'=>'Event Title'))}}
                        </div>
                        <br>
                        <label class="form-control-label text-uppercase">Event Description</label>
                        {{Form::textarea('description',$event->description,array('class'=>"form-control", 'rows'=>'20', 'id'=>'blogwrite', 'required' => '' , 'placeholder'=>'Type event description'))}}
                        <br>
                        <hr>
                        {{-- time and date pick --}}
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Event Date</label>
                                <input type="date" value="{{$event->date}}" class="form-control form-control-sm" name="date" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Event Date</small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Start Time</label>
                                <input type="time" value="{{$event->start}}" class="form-control form-control-sm" name="start" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Event Starting Time</small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">End Time</label>
                                    <input type="time" value="{{$event->start}}" class="form-control form-control-sm" name="end" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Event Ending Time</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">

                                <label class="form-control-label text-uppercase">Location</label>
                                <!-- search input box -->
                                <form>
                                    <div class="form-group input-group">
                                        <input type="text" value="{{$event->address}}" id="search_location" class="form-control" placeholder="Search location">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary get_map" type="submit">
                                                Locate
                                            </button>
                                        </div>
                                    </div>
                                </form>
    
                                <!-- display google map -->
                                <div id="geomap"></div>
                                <br>
                                <!-- display selected location information -->
                                <p class="form-control-label text-uppercase">Location Details</p>
                                <p>Address: <input type="text" value="{{$event->address}}" name="addr" class="search_addr form-control"></p>
                                <input type="hidden" value="{{$event->latitude}}" name="lat" class="search_latitude" size="30">
                                <input type="hidden" value="{{$event->longtitude}}" name="lng" class="search_longitude" size="30">
                            </div>
                        </div>
                        
                        
                    </div>

                    {{-- submit side --}}
                    <div class="col-sm-4">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Event Control</h5>
                                <hr>
                                <br>
                                <table class="table table-light eventctrltable">
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{Form::submit('Save Changes',array('class'=>"btn btn-outline-success shadow form-control"))}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <label class="lead">Event Cover Image</label>
                            </div>
                            <div class="card-body">
                                <p class="lead">Old Image</p>
                                <img class="img-fluid" src="{{asset('img/events/cover/' . $event->cover)}}" alt="">
                                <br>
                                <br>
                                <input type="file" class="form-control btn btn-outline-primary" name="cover" id="">
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

        </section>
        </div>

        {{-- end pageholder --}}

        </div>
    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var searchBox = new google.maps.places.SearchBox(document.getElementById('search_location'));
</script>

<script>
    var geocoder;
    var map;
    var marker;
    
    /*
        * Google Map with marker
        */
    function initialize() {
        var initialLat = $('.search_latitude').val();
        var initialLong = $('.search_longitude').val();
        initialLat = initialLat?initialLat:6.795002999999999;
        initialLong = initialLong?initialLong:79.90075890000003;
    
        var latlng = new google.maps.LatLng(initialLat, initialLong);
        var options = {
            zoom: 16,
            center: latlng,
            componentRestrictions: {country: "lk"},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    
        map = new google.maps.Map(document.getElementById("geomap"), options);
    
        geocoder = new google.maps.Geocoder();
    
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: latlng
        });
    
        google.maps.event.addListener(marker, "dragend", function () {
            var point = marker.getPosition();
            map.panTo(point);
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                }
            });
        });
    
    }
    
    $(document).ready(function () {
        //load google map
        initialize();
        
        /*
            * autocomplete location search
            */
        var PostCodeid = '#search_location';
        $(function () {
            $(PostCodeid).autocomplete({
                source: function (request, response) {
                    geocoder.geocode({
                        'address': request.term
                    }, function (results, status) {
                        response($.map(results, function (item) {
                            return {
                                label: item.formatted_address,
                                value: item.formatted_address,
                                lat: item.geometry.location.lat(),
                                lon: item.geometry.location.lng()
                            };
                        }));
                    });
                },
                select: function (event, ui) {
                    $('.search_addr').val(ui.item.value);
                    $('.search_latitude').val(ui.item.lat);
                    $('.search_longitude').val(ui.item.lon);
                    var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                    marker.setPosition(latlng);
                    initialize();
                }
            });
        });
        
        
        /*
            * Point location on google map
            */
        $('.get_map').click(function (e) {
            var address = $(PostCodeid).val();
            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
            e.preventDefault();
        });
    
        //Add listener to marker for reverse geocoding
        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('.search_addr').val(results[0].formatted_address);
                        $('.search_latitude').val(marker.getPosition().lat());
                        $('.search_longitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    });
</script>
@endsection