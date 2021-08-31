@extends('layouts.auth')

@section('content')
<div class="signin-panel">
  <svg-to-inline path="{{ asset('assets/img/citywalk.svg') }}" class-Name="svg-bg"></svg-to-inline>

  <div class="signin-sidebar">
    <div class="signin-sidebar-body">
      <a href="dashboard-one.html" class="sidebar-logo mg-b-40"><span>Accounting</span></a>
      <h4 class="signin-title">Welcome back!</h4>
      <h5 class="signin-subtitle">Please signin to continue.</h5>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="signin-form">
          <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email address">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror            
          </div>

          <div class="form-group">
            <label class="d-flex justify-content-between">
              <span>Password</span>
              <!-- <a href="" class="tx-13">Forgot password?</a> -->
            </label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror            
          </div>

          <div class="form-group d-flex mg-b-0">
            <button class="btn btn-brand-01 btn-uppercase flex-fill">Sign In</button>
            <!-- <a href="page-signup.html" class="btn btn-white btn-uppercase flex-fill mg-l-10">Sign Up</a> -->
          </div>


        </div>            
      </form>
      <p class="mg-t-auto mg-b-0 tx-sm tx-color-03">By signing in, you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy</a></p>
    </div><!-- signin-sidebar-body -->
  </div><!-- signin-sidebar -->
</div><!-- signin-panel -->
@endsection
