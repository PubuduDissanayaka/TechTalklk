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
    <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
    </div>
    {{-- end sideBar --}}

    {{-- page holder --}}
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-2">
            <section class="py-2">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="card">
                                <div class="card-header lead">
                                    {{$friend->name}}
                                    <a href="/friends" class="pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Go Back</a>
                                </div>

                                <div class="card-body">
                                <chat v-bind:chats='chats' v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid="{{ $friend->id }}"></chat>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </section>
        </div>
    </div>
</div>



@endsection

@section('script')
@endsection
