

@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Portfolio </div>
        <div class="tx-center mg-b-60">Admin</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
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
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>

                @endif
            </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign In</button>
          <div>
             <a href="{{ route('register') }}" class="tx-info tx-12 d-block mg-t-10">Register an Account</a>
          </div>
     </form>
       
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection

