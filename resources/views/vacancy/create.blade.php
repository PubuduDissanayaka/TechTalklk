@extends('layouts.app')

@section('css')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ck5lksam8dja2hvssb8hndfyhnd9qxvwobl1z6lxjuwyswym"></script>
<script>
    tinymce.init({
        selector:'#details',
        resize: false,
        plugins: 'link image table advlist autolink imagetools table spellchecker lists charmap print preview',
        contextmenu_never_use_native: true,
        plugins : 'advlist autolink table link image lists charmap print preview'
    });
</script>
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><strong> Create New Job Vacancy</strong></h3>
                        <a href="{{ url('/vacancy') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['route' => 'vacancy.store', 'data-parsley-validate'=> '', 'files'=> true]) !!}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                <label for="title" class="control-label">{{ 'Title' }}</label>
                                <input class="form-control" name="title" type="text" id="title" value="{{ isset($vacancy->title) ? $vacancy->title : ''}}"  required>
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
                                <label for="details" class="control-label">{{ 'Details' }}</label>
                                <textarea class="form-control" rows="15" name="description" type="textarea" id="details" required>{{ isset($vacancy->details) ? $vacancy->details : ''}} </textarea>
                                {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
                                            <label for="end" class="control-label">{{ 'End Date' }}</label>
                                            <input class="form-control" name="end" type="date" id="end" value="{{ isset($vacancy->end) ? $vacancy->end : ''}}" >
                                            {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
                                        <label for="cover" class="control-label">{{ 'Cover Image (.jpg)' }}</label>
                                        <input class="form-control-file" name="cover" type="file" id="cover" value="{{ isset($vacancy->cover) ? $vacancy->cover : ''}}" >
                                        {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
                                            <label for="end" class="control-label">{{ 'End Date' }}</label>
                                            <select name="catagory" id=""></select>
                                            <input class="form-control" name="end" type="date" id="end" value="{{ isset($vacancy->end) ? $vacancy->end : ''}}" >
                                            {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
                                    </div> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('document') ? 'has-error' : ''}}">
                                        <label for="document" class="control-label">{{ 'Upload File (.pdf)' }}</label>
                                        <input class="form-control-file" name="document" type="file" id="document" value="{{ isset($vacancy->document) ? $vacancy->document : ''}}" >
                                        {!! $errors->first('document', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                            <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" required>

                            <div class="form-group">
                                <input class="btn btn-success btn-block" type="submit" value="Publish Vacancy">
                            </div>
                            {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
