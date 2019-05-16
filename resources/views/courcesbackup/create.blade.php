@extends('layouts.app')

@section('css')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ck5lksam8dja2hvssb8hndfyhnd9qxvwobl1z6lxjuwyswym"></script>
{{-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> --}}
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
    {!! Form::open(['route' => 'cources.store', 'data-parsley-validate'=> '', 'files'=> true]) !!}
    <div class="row">
        <div class="col-sm-8 py-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Create New Cource</h3>
                </div>
                <div class="card-body">
                    <p>Create new cource or Degree program</p>
                    <form>
                    </form>
                    
                    <label class="form-control-label text-uppercase">Title</label>
                    {{Form::text('title',null,array('class'=>"form-control", 'required' => '','maxlength'=>'255'))}}
                    <br>
                    <label class="form-control-label text-uppercase">Description</label>
                    {{Form::textarea('description',null,array('class'=>"form-control", 'rows'=>'20', 'id'=>'blogwrite', 'required' => '' , 'placeholder'=>'Type event description'))}}
                    <br>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4 py-3">
            <div class="card">
                <div class="card-header">
                    <label>Cource Control</label>
                </div>
                <div class="card-body">
                    {{Form::submit('Create Cource',array('class'=>"shadow btn btn-outline-primary form-control"))}}
                </div>
            </div>
            <br>
            {{-- google form --}}
            <div class="card">
                <div class="card-header">
                    <label>Apply Form</label>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Google form</h5>
                    <p class="card-text">If you want to genarate cource apply form please go to <a href="https://docs.google.com/forms/"> google form</a> then create a form as you wish...</p>
                    {{Form::text('google',null,array('class'=>"form-control", 'maxlength'=>'255', 'placeholder'=>'Paste here your google form link ...'))}}
                </div>
            </div>
            <br>
            {{-- cource cover image --}}
            <div class="card">
                <div class="card-header">
                    <label class="form-control-label text-uppercase">Upload Cover Image</label>
                </div>
                <div class="card-body">
                    <p class="card-text">This will be shown as cource cover image</p>
                    <input type="file" name="cover" class="form-control btn btn-outline-primary" id="">
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</section>
</div>

{{-- end pageholder --}}

@include('layouts._footer')
</div>
</div>
@endsection