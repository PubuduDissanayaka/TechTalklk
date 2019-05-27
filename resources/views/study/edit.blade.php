@extends('layouts.app')

@section('css')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ck5lksam8dja2hvssb8hndfyhnd9qxvwobl1z6lxjuwyswym"></script>
{{-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> --}}
<script>
    tinymce.init({
        selector:'#description',
        resize: false,
        plugins: 'link image table advlist autolink imagetools table spellchecker lists charmap print preview',
        contextmenu_never_use_native: true,
        plugins : 'advlist autolink table link image lists charmap print preview'
    });
</script>
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
{{-- sideBar --}}
<div class="d-flex align-items-stretch">
    {{-- <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
    </div> --}}
    {{-- end sideBar --}}

    {{-- page holder --}}
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-4">
            <section class="py-3">
                <div class="container">
                {!! Form::open(['route' => ['study.update',$study->id], 'data-parsley-validate'=> '', 'files'=> true]) !!}
                {{Form::hidden('_method','PUT')}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <p class="card-header">Create New Study Programme</p>
                                <div class="card-body">
                                    <a href="/study" title="Back" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                    <br />
                                    <br />

                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                        <label for="name" class="control-label">{{ 'Name' }}</label>
                                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($study->name) ? $study->name : ''}}" required>
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                        <label for="description" class="control-label">{{ 'Description' }}</label>
                                        <textarea class="form-control" rows="15" name="description" type="textarea" id="description" placeholder="Description about the Study Programme">{{ isset($study->description) ? $study->description : ''}}</textarea>
                                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('google') ? 'has-error' : ''}}">
                                        <label for="google" class="control-label">{{ 'Embed HTML Google Forms Link (URL)' }}</label>
                                        <textarea class="form-control" rows="5" name="google" type="textarea" id="google" placeholder='<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeIB1-_gGOxC5nXtN7y6WmzBL0tKXnpStdNH9r-O9Wje-xJBA/viewform?embedded=true" width="640" height="1378" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>'>{{ isset($study->google) ? $study->google : ''}}</textarea>
                                        {!! $errors->first('google', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <p class="card-header">Controller</p>
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="form-group">
                                            <input class="btn btn-success btn-block" type="submit" value="Save Changes">
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
                                        <p class="card-title lead">
                                            <label for="cover" class="control-label">{{ 'Cover Image (.jpg/.png)' }}</label>
                                        </p>
                                        <p class="card-text">
                                            <input class="form-control-file" name="cover" type="file" id="cover" value="{{ isset($study->cover) ? $study->cover : ''}}" >
                                            {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                        <p class="card-title lead">
                                            <label for="photo" class="control-label">{{ 'Extra Detailed Banner Photo (.jpg/.png)' }}</label>
                                        </p>
                                        <p class="card-text">
                                            <input class="form-control-file" name="photo" type="file" id="photo" value="{{ isset($study->photo) ? $study->photo : ''}}" >
                                            {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                                        </p>
                                    </div>
                                </div>
                            </div><br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group {{ $errors->has('document') ? 'has-error' : ''}}">
                                        <p class="card-title lead">
                                            <label for="document" class="control-label">{{ 'Application Form (.pdf)' }}</label>
                                        </p>
                                        <p class="card-text">
                                            <input class="form-control-file" name="document" type="file" id="document" value="{{ isset($study->document) ? $study->document : ''}}" >
                                            {!! $errors->first('document', '<p class="help-block">:message</p>') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        {!! Form::close() !!}
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

@section('content')

@endsection
