<!-- JavaScript files-->
<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script> --}}
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="{{ asset('js/charts-home.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script src="{{ asset('js/parsley.min.js') }}"></script>
{{-- <script src="{{ asset('js/particles.min.js') }}"></script> --}}
<main>
    @yield('script')
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('layouts.toast')
@jquery
@toastr_js
@toastr_render
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')

