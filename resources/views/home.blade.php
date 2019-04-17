@extends('layouts.app')

@section('content')
{{-- sideBar --}}
<div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
</div>
{{-- end sideBar --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

