
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('layouts.toast')
@jquery
@toastr_js
@toastr_render
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="{{asset('kit/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<main>
    @yield('script')
</main>
<script src="{{ asset('js/parsley.min.js') }}"></script>
{{-- kit --}}
<!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('kit/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('kit/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('kit/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('kit/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('kit/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('kit/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{asset('kit/assets/plugins/chartist-js/dist/chartist.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{asset('kit/assets/plugins/d3/d3.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/c3-master/c3.min.js')}}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{asset('kit/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('kit/js/dashboard2.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('kit/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
{{-- end kit --}}

    <script src="{{asset('kit/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js')}}" type="text/javascript"></script>
