<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>TechTalk | SignUp</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('kit/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link rel="stylesheet" href="{{asset('css/regstyle.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/parsley.css')}}" id="theme-stylesheet">

    <link href="{{asset('kit/assets/plugins/wizard/steps.css')}}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{asset('kit/assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="{{asset('kit/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('kit/css/colors/purple-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register myreg" style="background-image:url({{('https://picsum.photos/id/122/4147/2756')}});">
            <div class="login-box card myregbox">
            <div class="card-body">
                                <!-- Validation wizard -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <h4 class="card-title">TechTalk SignUp</h4>
                                <h6 class="card-subtitle">Share Your IT Knowledge</h6>
                                {!! Form::open(['route' => 'register-user.store', 'data-parsley-validate'=> '', 'files'=> true, 'class' => 'validation-wizard wizard-circle' , 'method' =>'POST']) !!}
                                {{-- <form action="#" class="validation-wizard wizard-circle"> --}}
                                    <!-- Step 1 -->
                                    <h6>Step 1</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                            {{-- license --}}
                                            <fieldset class="form-group">
                                                <iframe src={{asset('license.txt')}}></iframe>
                                                <label class="">
                                                    <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description ml-0">I agree with this license</span> </label>
                                                    {{-- <input class="" type="checkbox" value="yes"> --}}
                                                </label>
                                            </fieldset>
                                            {{-- end licenes --}}

                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Step 2</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="wfirstName2" name="fname"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Last Name : </label>
                                                    <input type="text" class="form-control" id="wlastName2" name="lname">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemailAddress2"> Email Address : <span class="danger">*</span> </label>
                                                    <input type="email" class="form-control required" id="wemailAddress2" name="email"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wphoneNumber2">Phone Number :</label>
                                                    <input type="tel" class="form-control" id="wphoneNumber2" name="phone"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password"> Password : <span class="danger">*</span> </label>
                                                    <input id="password" type="password" class="form-control required" name="password" data-parsley-required="true" data-parsley-minlength="8">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password-confirm">Confirm Password : <span class="danger">*</span> </label>
                                                    <input id="password-confirm" type="password" class="form-control required" name="password_confirmation" data-parsley-required="true" data-parsley-minlength="8">
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Step 3</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wint1">Account Type : <span class="danger">*</span> </label>
                                                    <select id="my-input" name="acctype" class="custom-select form-control required">
                                                        <option value="2">Personal</option>
                                                        <option value="5">University or Institue</option>
                                                        <option value="4">Company</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nic">National Identity Card No :</label>
                                                    <input type="text" class="form-control" id="nic" name="nic">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dob">Birth Date :</label>
                                                    <input type="date" class="form-control" name="dob" id="dob">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender :</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input id="customRadioInline1" type="radio" name="gender" value="male" class="custom-control-input">
                                                            <label for="customRadioInline1" class="custom-control-label">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input id="customRadioInline2" type="radio" name="gender" value="female" class="custom-control-input">
                                                            <label for="customRadioInline2" class="custom-control-label">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Step 4</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="web">Website :</label>
                                                    <input type="url" class="form-control" id="web" name="website">
                                                </div>
                                                <div class="form-group">
                                                    <label for="git">GitHub Profile :</label>
                                                    <input type="url" class="form-control" id="git" name="github">
                                                </div>
                                                <div class="form-group">
                                                    <label for="blog">Blog url :</label>
                                                    <input type="url" class="form-control" id="blog" name="blog">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-center">Thank You!</p>
                                            </div>
                                        </div>
                                    </section>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- vertical wizard -->

            </div>
          </div>
        </div>

    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('kit/assets/plugins/jquery/jquery.min.js')}}"></script>
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
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('kit/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="{{asset('js/regscript.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/wizard/jquery.steps.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/wizard/jquery.validate.min.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('kit/assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('kit/assets/plugins/wizard/steps.js')}}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>

    <!-- ============================================================== -->

</body>

</html>
