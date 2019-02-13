@extends('auth.main')
@section('title','Forgot Password')
@section('content')
<div class="card card-login mx-auto mt-5">
  <div class="card-header">Reset Password</div>
  <div class="card-body">
    <div class="text-center mb-4">
      <h4>Forgot your password?</h4>
      <p>Enter your email address and we will send you instructions on how to reset your password.</p>
    </div>
    <form method="POST" action="{{ route('password.request') }}">
      {{ csrf_field() }}

      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="form-label-group">
          <input type="email" id="email" class="form-control" placeholder="Enter email address" required autofocus name="email" value="{{ $email or old('email') }}" >
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <label for="email">Enter email address</label>
        </div>
      </div>
      <a class="btn btn-primary btn-block" href="login.html">Reset Password</a>
    </form>
    <div class="text-center">
      <a class="d-block small mt-3" href="register.html">Register an Account</a>
      <a class="d-block small" href="login.html">Login Page</a>
    </div>
  </div>
</div>
@endsection