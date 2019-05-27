@extends('layouts.app')

@section('css')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<link href="/css/star/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
<script src="/js/star/star-rating.js" type="text/javascript"></script>
<link href="/css/star/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
<script>
$(document).on('ready', function(){
    $('#study').rating();
    }
});
$(document).on('ready', function(){
    $('#show').rating();
    }
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
                                        <a href="{{ url('/study') }}" title="Back"><button class="btn btn-warning btn-sm btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</button></a>
                                        <br>

                                        <a id="modal-229234" href="#modal-container-229234" role="button" data-toggle="modal" class="btn btn-block btn-sm btn-success">
                                            Send Application
                                        </a>

                                        <br>
                                        @if (isset($study->document))
                                            <a href="{{asset('storage/uploads/study/documents/'.$study->document)}}" download class="btn btn-block btn-sm btn-blue"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Document</a>
                                        @else

                                        @endif
                                        <br>
                                        {{-- ratings --}}

                                        <div class="card">
                                            <h5 class="card-header">Rating</h5>
                                            <div class="card-body">
                                                <p class="card-text">Put your ratings for this programme</p>
                                                {!! Form::open(['route' => 'studyrating.store', 'data-parsley-validate'=> '', 'files'=> true]) !!}
                                                    <input id="study" name="values" required class="rating rating-loading" value="" data-min="0" data-max="5" data-step="1" data-size="lg">
                                                    <br>
                                                    <div class="col-md-9">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input id="customRadioInline1" type="radio" name="star_status" value="positive" class="custom-control-input">
                                                            <label for="customRadioInline1" class="custom-control-label">Positive</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input id="customRadioInline2" type="radio" name="star_status" value="negative" class="custom-control-input">
                                                            <label for="customRadioInline2" class="custom-control-label">Negative</label>
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control" name="feedback" id=""rows="4"></textarea>
                                                    <br>
                                                    <input type="text" hidden required value="{{Auth::user()->id}}" name="user_id">
                                                    <input type="text" hidden required value="{{$study->id}}" name="study_id">
                                                    <button type="submit" class="btn btn-warning btn-block btn-sm">Submit</button><br>
                                                    <input type="reset" value="Clear" class="btn btn-block btn-danger btn-sm">
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        {{-- end ratings --}}
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                Feedbacks
                                            </div>
                                            <div class="card-body ratecardbody">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="display-4 d-flex justify-content-center clearfix">{{round($avarage,1)}}</div>
                                                        <p class="studycountusrestar"><i class="fa fa-user-o" aria-hidden="true"></i> {{count($study->studyratings)}}</p>
                                                        <input id="show" name="values" class="rating clearfix rating-loading d-inline" value="{{round($avarage,1)}}" data-min="0" data-max="5" data-step="0.5" readonly data-size="sm">
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$fivepresentage}}%" aria-valuenow="{{$fivepresentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div><br>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: {{$fourpresentage}}%" aria-valuenow="{{$fourpresentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div><br>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{$threepresentage}}%" aria-valuenow="{{$threepresentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div><br>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{$twopresentage}}%" aria-valuenow="{{$twopresentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div><br>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$onepresentage}}%" aria-valuenow="{{$onepresentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div><br>
                                                    </div>

                                                </div>
                                                {{-- <div class="ratelist"> --}}
                                                    @forelse ($study->studyratings as $item)
                                                    <div class="ratelist">
                                                        <div class="singlerate">
                                                            <p class="card-title d-inline ratesingleuser">{{$item->user->name}} <small><i class="fa fa-at" aria-hidden="true"></i> {{$item->created_at->diffForHumans()}}</small></p>
                                                            <input id="show" name="values" class="rating rating-loading d-inline"  value="{{$item->value}}" data-min="0" data-max="5" data-step="0.5" readonly showClear="false" data-size="xs">
                                                            <p class="card-text">{{$item->feedback}}</p>
                                                        </div>
                                                    </div>

                                                @empty

                                                @endforelse
                                                {{-- </div> --}}
                                            </div>
                                        </div>

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
