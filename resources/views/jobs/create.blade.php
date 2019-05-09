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
                <div class="row">
                <div class="col-md-12">
                    <div id="my-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                            <li data-target="#my-carousel" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Title</h5>
                                    <p>Text</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Title</h5>
                                    <p>Text</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
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




{{-- @extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Job</div>
                    <div class="card-body">
                        <a href="{{ url('/jobs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/jobs') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('jobs.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
