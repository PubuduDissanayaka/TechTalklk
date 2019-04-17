@extends('layouts.app')

{{-- @section('parsley.min.js')
    {!! Html::styles() !!}
@endsection --}}

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
<section class="">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4">Catagories</h1>
{{--             
            @if ('{{$data->id->(1)}}')
                <h1>has one</h1>
            @else
                <h2>no one</h2>
            @endif --}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 py-3">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Edit Catagory </h3>
                </div>
                <div class="card-body">
                    <p>Edit the Catagory name & Description</p>
                    {!! Form::open(['route' => ['catagories.update',$data->id], 'data-parsley-validate'=> '']) !!}
                    <label class="form-control-label text-uppercase">Name</label>
                    {{Form::text('name',$data->name,array('class'=>"form-control", 'required' => '','maxlength'=>'255'))}}
                    <br>
                    <label class="form-control-label text-uppercase">Catagory Description</label>
                    {{Form::textarea('description',$data->description,array('class'=>"form-control row-12", 'required' => ''))}}
                    <br>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Edit Catagory',array('class'=>"btn btn-outline-success shadow"))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        </div>
    </div>
    {{-- ajax --}}

    {{-- end ajax --}}
</section>
</div>

{{-- end pageholder --}}

</div>
</div>
@endsection