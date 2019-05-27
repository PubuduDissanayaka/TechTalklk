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
    {{-- <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
    </div> --}}
    {{-- end sideBar --}}

    {{-- page holder --}}
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-4">
            <section class="py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="vacjumboshow jumbotron">
                                    <h1 style="color:white;" class="display-4">
                                        {{$vacancy->title}}
                                    </h1>
                                    <br>
                                    <p>
                                        <div class="lead"><i class="far fa-user"></i> Posted by: {{$vacancy->user->name}}</div>
                                    </p>
                                    <p>
                                        @if (($vacancy->end)== '')

                                        @else
                                        <div class="lead"><i class="far fa-calendar-alt"></i> Closing Date: {{date('F j, Y',strtotime($vacancy->end))}}</div>
                                        @endif
                                    </p>

                                    @if (($vacancy->user->id)==Auth::User()->id)
                                    <p class="inline-block">
                                        <a class="btn btn-warning btn-sm" href="{{ url('/vacancy/' . $vacancy->id . '/edit') }}">Edit Post</a>
                                        <form method="POST" action="{{ url('vacancy' . '/' . $vacancy->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete NewsFeed" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </p>
                                    @else
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="{{ url('/vacancy') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</button></a>
                                        <h4 class="text-center text-info">
                                            Description
                                        </h4>
                                        <p>
                                            {!!$vacancy->details!!}
                                        </p>
                                        <br>
                                        <img class="img-fluid" src="{{ asset('img/vacancy/cover/' . $vacancy->cover)}}" alt="Cover image">
                                    </div>

                                    {{-- sidebar --}}
                                    <div class="col-md-3">
                                        <a id="modal-229234" href="#modal-container-229234" role="button" data-toggle="modal" class="btn btn-block btn-lg btn-success waves-effect waves-light">
                                            Send CV
                                        </a>

                                        <br>
                                        @if (isset($vacancy->document))
                                            <a href="{{asset('storage/uploads/vacancies/document/'.$vacancy->document)}}" download class="btn btn-block btn-info waves-effect waves-light"><i class="far fa-file-pdf"></i> Download Document</a>
                                        @else

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
        </div>

        {{-- end pageholder --}}

    </div>
</div>

			<div class="modal fade" id="modal-container-229234" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="myModalLabel">
								Send CV
							</h5>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">

                        {!! Form::open(['url' => 'vacancy/apply', 'data-parsley-validate'=> '', 'files'=> true]) !!}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Your Name" aria-describedby="helpId" required>
                                <small id="helpId" class="text-muted">Your Name</small>
                            </div>

                            <div class="form-group">
                              <label for="email">e-mail</label>
                              <input type="email" value="{{Auth::user()->email}}" name="email" id="email" class="form-control" placeholder="Your e-mail" aria-describedby="helpId" required>
                              <small id="helpId" class="text-muted">Your e-mail</small>
                            </div>
                            <div class="form-group">
                              <label for="message">Message</label>
                              <input type="text" name="message" id="message" class="form-control" placeholder="Your Message" aria-describedby="helpId">
                              <small id="helpId" class="text-muted">Your Message</small>
                            </div>
                            <div class="form-group">
                              <label for="cv">Attach CV</label>
                              <input type="file" name="cv" id="cv" class="form-control-file" placeholder="Your CV" aria-describedby="helpId" required>
                              <small id="helpId" class="text-muted">Your CV</small>
                            </div>

                            <input type="text" value="{{$vacancy->id}}" hidden name="vacid">
                            <input type="text" value="{{$vacancy->user->email}}" hidden name="vacuser">
                            <input type="text" value="{{$vacancy->title}}" hidden name="vactitle">

                            <div class="row">

                            <input type="submit" class="btn btn-success d-inline col-md-6" value="Send CV">
							<button type="button" class="btn btn-secondary d-inline-block col-md-6" data-dismiss="modal">
								Close
							</button>
                            </div>
                            {!! Form::close() !!}
						</div>


					</div>

				</div>

@endsection

@section('script')

@endsection
