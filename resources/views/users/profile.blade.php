@extends('layouts.app')

@section('css')
<style>

</style>

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
<section>
{{-- demo --}}
<div class="py-5" style="background-image: url(&quot;https://static.pingendo.com/cover-stripes.svg&quot;); background-position: right bottom; background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="p-5 bg-white ml-auto col-md-5 border">
          <h1>{{$user->name}} {{" "}} {{$user->last_name}}</h1>
          <p class="mb-3">{{isset($user->detail->bio) ? $user->detail->bio : "no bio" }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">{{$user->name}} {{" "}} {{$user->last_name}}</h4>
              <p class="card-text">{{isset($user->detail->bio) ? $user->detail->bio : "no bio" }}</p>
              <a href="#" class="btn btn-info btn-block btn-sm"><i class="fas fa-plus"></i> Add Friend</a>
            <a href="#" class="btn btn-success btn-block btn-sm"><i class="far fa-envelope"></i> Send Message</a>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <ul class="nav nav-pills">
            <li class="nav-item"> <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone">Tab 1</a> </li>
            <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo">Tab 2</a> </li>
            <li class="nav-item" > <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree">Tab 3</a> </li>
          </ul>
          <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="tabone" role="tabpanel">
              <p class="">Which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite.</p>
            </div>
            <div class="tab-pane fade" id="tabtwo" role="tabpanel">
              <p class="">When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface.</p>
            </div>
            <div class="tab-pane fade" id="tabthree" role="tabpanel">
              <p class="">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
{{-- end demo --}}
</section>
</div>




{{-- end pageholder --}}

</div>
</div>
@include('layouts._footer')
@endsection

{{-- @section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
@endsection --}}
