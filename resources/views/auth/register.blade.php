@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/regstyle.css')}}" id="theme-stylesheet">
@endsection

@section('content')
<div class="container py-0">
    <div class="row justify-content-center py-0">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-title">{{ __('Register') }}</div> --}}

                <div class="card-title">
                    {!! Form::open(['route' => 'register-user.store', 'data-parsley-validate'=> '', 'files'=> true, 'method' =>'POST']) !!}
                    {{-- <form method="POST" action="{{ route('register') }}" class='data-parsley-validate'>
                        @csrf --}}
                        <p class="row lead justify-content-center"><strong> Register TechTalk user </strong></p>
                            <div class="wizards">
                                <div class="progressbar">
                                    <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div> <!-- 19.66% -->
                                </div>
                                <div class="form-wizard active">
                                    <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
                                    <p>License</p>
                                </div>
                                <div class="form-wizard">
                                    <div class="wizard-icon"><i class="fa fa-user"></i></div>
                                    <p>About</p>
                                </div>
                                <div class="form-wizard">
                                    <div class="wizard-icon"><i class="fa fa-key"></i></div>
                                    <p>Account</p>
                                </div>
                                <div class="form-wizard">
                                    <div class="wizard-icon"><i class="fa fa-globe"></i></div>
                                    <p>Website</p>
                                </div>
                                <div class="form-wizard">
                                    <div class="wizard-icon"><i class="fa fa-check-circle"></i></div>
                                    <p>Finish</p>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- license --}}
                                <fieldset class="form-section">
                                    <iframe src={{asset('license.txt')}}></iframe>
                                    <label class="form-check-label">
                                        <input class="form-check-input required" type="checkbox" value="yes"> I agree with this license
                                    </label>
                                    <div class="wizard-buttons">
                                        <button type="button" class="btn btn-next pull-right">Next</button>
                                    </div>
                                </fieldset>
                                {{-- end licenes --}}

                                {{-- about --}}
                                <fieldset class="form-section">
                                    <P class="lead"><strong> Input personal data</strong></p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name *</label>
                                                <input type="text" name="fname" class="form-control" placeholder="John" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name *</label>
                                                <input type="text" name="lname" class="form-control" placeholder="Doe" data-parsley-required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender *</label>
                                                <br>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>National Identity Card No *</label>
                                                <div>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="far fa-id-card"></i></div>
                                                        </div>
                                                        <input type="text" class="form-control" name="nic" placeholder="NIC Number" data-parsley-required="true" data-parsley-minlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date *</label>
                                                <input type="date" class="form-control validateDate" name="dob" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="tel" name="phone" class="form-control" placeholder="07* *******" data-parsley-required="true" data-parsley-type="integer" data-parsley-minlength="10" data-parsley-maxlength="10">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wizard-buttons">
                                        <button type="button" class="btn btn-previous pull-left">Previous</button>
                                        <button type="button" class="btn btn-next pull-right">Next</button>
                                    </div>
                                </fieldset>
                                {{-- end about --}}

                                {{-- account --}}
                                <fieldset class="form-section">
                                    <p class="lead"><strong> Input account info </strong></p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="my-input">Account Type *</label>
                                                <select id="my-input" name="acctype" class="form-control">
                                                    <option value="2">Personal</option>
                                                    <option value="5">University or Institue</option>
                                                    <option value="4">Company</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" name="email" class="form-control" placeholder="email@example.com" data-parsley-required="true" data-parsley-type="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" type="password" class="form-control" name="password" data-parsley-required="true" data-parsley-minlength="8">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" data-parsley-required="true" data-parsley-minlength="8">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wizard-buttons">
                                        <button type="button" class="btn btn-previous pull-left">Previous</button>
                                        <button type="button" class="btn btn-next pull-right">Next</button>
                                    </div>
                                </fieldset>
                                {{-- about account --}}

                                {{-- websites --}}
                                <fieldset class="form-section">
                                        <p class="lead"><strong> Input your websites info </strong></p>
                                        <div class="form-group">
                                            <label><i class="fas fa-globe-asia"></i> Website </label>
                                            <input type="text" name="website" class="form-control" placeholder="https://example.com"/>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fab fa-blogger-b"></i> Blogspot </label>
                                            <input type="text" name="blog" class="form-control" placeholder="Ex:- https://example.blogspot.com"/>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fab fa-github"></i> GitHub profile </label>
                                            <input type="text" name="github" class="form-control" placeholder="Ex:- https://github.com/UserName"/>
                                        </div>
                                    <div class="wizard-buttons">
                                        <button type="button" class="btn btn-previous pull-left">Previous</button>
                                        <button type="button" class="btn btn-next pull-right">Next</button>
                                    </div>
                                </fieldset>
                                {{-- end web sites --}}

                                {{-- finish --}}
                                <fieldset>
                                    <div class="jumbotron text-center">
                                    <h1>Please click submit button to save your data</h1>
                                    </div>
                                    <div class="wizard-buttons">
                                        <button type="button" class="btn btn-previous pull-left">Previous</button>
                                        <button type="submit" class="btn btn-primary btn-submit pull-right">Join</button>
                                    </div>
                                </fieldset>
                                {{-- end finish --}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/regscript.js')}}"></script>
@endsection
