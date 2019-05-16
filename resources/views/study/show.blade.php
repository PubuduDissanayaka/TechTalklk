@extends('layouts.app')

@section('css')
<script src="{{asset('js/star/star-rating.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/star/star-rating.css')}}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/star/themes/krajee-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css" />
<script>
$(document).on('ready', function(){
    $('#input-9').rating();
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
    <div id="sidebar" class="sidebar">
        @include('layouts._sidebar')
    </div>
    {{-- end sideBar --}}

    {{-- page holder --}}
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-4">
            <section class="py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="vacjumboshow jumbotron">
                                    <h1 class="display-4">
                                        {{$study->name}}

                                    </h1>
                                    <br>
                                    <p>
                                        <div class="lead"><i class="far fa-user"></i> Posted by: {{$study->user->name}}</div>
                                    </p>
                                    <p>
                                        @if (($study->end)== '')

                                        @else
                                        <div class="lead"><i class="far fa-calendar-alt"></i> Closing Date: {{date('F j, Y',strtotime($study->end))}}</div>
                                        @endif
                                    </p>

                                    @if (($study->user->id)==Auth::User()->id)
                                    <p class="inline-block">
                                        <a class="btn btn-warning btn-sm" href="{{ url('/study/' . $study->id . '/edit') }}">Edit Post</a>
                                        <form method="POST" action="{{ url('study' . '/' . $study->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete NewsFeed" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </p>
                                    @else
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <img class="img-fluid" src="{{ asset('storage/uploads/study/covers/' . $study->cover)}}" alt="Cover image">
                                        <br>
                                        <h4 class="text-center text-info">
                                            Description
                                        </h4>
                                        <div>
                                            {!!$study->description!!}
                                        </div>
                                        <br>

                                        @if (isset($study->photo))
                                            <img class="img-fluid" src="{{ asset('storage/uploads/study/photos/' . $study->photo)}}" alt="Other photos">
                                        @else

                                        @endif
                                        <br>
                                        <div >
                                            <br>
                                            {!!$study->google!!}
                                        </div>

                                        {{-- comments --}}
                                <div class="event-comments-area">
                                        {{-- comment form --}}
                                        <label class="lead">Write Your comment</label>
                                        {!! Form::open(['route' => 'studycomments.store']) !!}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    <input type="hidden" name="study_id" value="{{$study->id}}">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea name="comment" id="" class="form-control event-comment-box" rows="6" required></textarea>
                                                </div>

                                                <div class="col-sm-12">
                                                        <br>
                                                    <input type="submit" value="Post Comment" class="form-control shadow btn btn-success">
                                                </div>
                                            </div>
                                        {{ Form::close()}}
                                        <br><br>
                                            <hr>
                                        <h4 class="event-com-count"><strong>{{$study->comments->count()}} Comments</strong></h4>
                                        @if (count($study->comments)>0)
                                        @foreach ($study->comments as $com)
                                            <div class="event-comment-list">
                                                <div class="event-single-comment justify-content-between d-flex">
                                                    <div class="justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="img/blog/c4.jpg" alt="">
                                                            <p class="lead"></p>
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#"></a><strong class="event-com-user"> {{$com->user->name}}</strong></h5>
                                                            <p class="date">{{date('F j, Y',strtotime($com->created_at))}} <i class="fa fa-at" aria-hidden="true"></i> {{date('g:i A',strtotime($com->created_at))}}</p>
                                                            <p class="event-comment blockquote-footer">
                                                                {{$com->comment}}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    </div>

                                    {{-- sidebar --}}
                                    <div class="col-md-5">
                                        {{-- ratings --}}
                                        <form action="#basic-example-9" method="post">
                                            <input id="input-9" name="input-9" required class="rating-loading">
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
                                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        </form>

                                        {{-- end ratings --}}
                                        <br>
                                        <a href="{{ url('/study') }}" title="Back"><button class="btn btn-warning btn-sm btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</button></a>
                                        <br>
                                        <a id="modal-229234" href="#modal-container-229234" role="button" data-toggle="modal" class="btn btn-block btn-lg btn-success">
                                            Send Application
                                        </a>

                                        <br>
                                        @if (isset($study->document))
                                            <a href="{{asset('storage/uploads/study/documents/'.$study->document)}}" download class="btn btn-block btn-blue"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Document</a>
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
								Send Application
							</h5>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">

                        {!! Form::open(['url' => 'study/apply', 'data-parsley-validate'=> '', 'files'=> true]) !!}
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
                              <label for="application">Attach Application (.pdf)</label>
                              <input type="file" name="application" id="application" class="form-control-file" placeholder="Your Application" aria-describedby="helpId" required>
                              <small id="helpId" class="text-muted">Your Application in pdf format</small>
                            </div>

                            <input type="text" value="{{$study->id}}" hidden name="studid">
                            <input type="text" value="{{$study->user->email}}" hidden name="studuser">
                            <input type="text" value="{{$study->name}}" hidden name="studtitle">

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
