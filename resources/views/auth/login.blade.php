@extends('layouts.app')

@section('title','Login')

@push('css')

    <!-- login style -->
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="{{ asset('backend/login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/bootstrap/css/bootstrap.min.css') }}"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/login/css/main.css') }}">
<!--===============================================================================================-->

@endpush

@section('content')

<!-- <div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('backend/login/images/bg-01.jpg')}}');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}" >
                    @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
                    @if (Route::has('password.request'))
						<a class="txt1" href="{{ route('password.request') }}">
							Forgot Password?
						</a>
                    @endif
					</div>
				</form>
			</div>
		</div>
</div> -->
	

	<!-- <div id="dropDownSelect1"></div> -->

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-6 offset-md-3">

              @include('layouts.partial.msg')
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Login</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}" >
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="{{old('email')}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                    <a href="{{ route('welcome') }}" class="btn btn-danger pull-right">Back</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')

    <!--   login scripts   -->
<!--===============================================================================================-->
    <!-- <script src="{{ asset('backend/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script> -->
<!--===============================================================================================-->
	<script src="{{ asset('backend/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<!-- <script src="{{ asset('backend/login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('backend/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script> -->
<!--===============================================================================================-->
	<script src="{{ asset('backend/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('backend/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/login/js/main.js') }}"></script>
@endpush
