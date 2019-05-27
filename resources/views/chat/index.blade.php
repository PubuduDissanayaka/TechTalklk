@extends('layouts.app')

@section('css')

<style>

</style>

<meta name="friendId" content="{{$friend->id}}">
@endsection

@section('content')

<audio id="ChatAudio">
    <source src="{{ asset('sounds/chat1.mp3') }}">
</audio>

{{-- <audio id="ChatAudio" src="{{asset('sounds/chat.mp3')}}">
     <source src="{{asset('sounds/chat.mp3')}}">
</audio> --}}

{{-- sideBar --}}
<div class="d-flex align-items-stretch">
    {{-- <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
    </div> --}}
    {{-- end sideBar --}}

    {{-- page holder --}}
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-2">
            <section class="py-2">

            </section>
        </div>
    </div>
</div>



@endsection

@section('script')
@endsection
