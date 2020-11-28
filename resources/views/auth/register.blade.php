@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!--   <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

<!-- 
        <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
             @csrf

            <div class="form-group @error('name') is-invalid @enderror">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              <label for="fullname"> Fullname</label>
            </div>

               @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>


          <div class="form-group @error('email') is-invalid @enderror">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
              <label for="inputEmail">Email address</label>
            </div>
             @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group @error('password') is-invalid @enderror">
                  <input type="password" id="inputPassword" class="form-control" name="password" required autocomplete="new-password">
                  <label for="inputPassword">Password</label>
                </div>
                 @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>

            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" href="#">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
    </div>
</div> -->


 <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Register </div>
        <div class="tx-center mg-b-60">Admin</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
            </div><!-- form-group -->
            @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


           <div class="form-group">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
            </div><!-- form-group -->
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
             @enderror

            <div class="form-group">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
               @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            <div class="form-group">
               
                  <input type="password" id="confirmPassword" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password">
                
             
              </div>




            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>

                @endif
            </div><!-- form-group -->


           
          <button type="submit" class="btn btn-info btn-block">Register</button>
          <div>
             <a href="{{ route('login') }}" class="tx-info tx-12 d-block mg-t-10">Login</a>
          </div>
     </form>
       
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->



@endsection
