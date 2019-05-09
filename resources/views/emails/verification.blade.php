<h1>Hello {{$user['name']}}!</h1>

<p class="lead">Please confirm link or button activation email below!</p>

<a href="{{url('/verification', $user->verification->$token)}}" class="btn btn-primary">Verify email</a>
