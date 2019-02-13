@extends('auth.main')
@section('title','Login')
@section('content')
<div class="card card-login mx-auto mt-5">
<div class="card-header">Login</div>
<div class="card-body">
  <form method="POST" action="{{route('login')}}">
    {{csrf_field()}}
    <div class="form-group">
      <div class="form-label-group">
        <input type="email" id="inputEmail" 
        class="form-control {{$errors->has('email')? 'is-invalid' : ''}}"
        name="email" 
        placeholder="Email address" required="required" autofocus="autofocus">
        <label for="inputEmail">Email address</label>
        @if($errors->has('email'))
        <div class="infalid-feedback">{{$errors->first('email')}}</div>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <input type="password" id="inputPassword" 
        class="form-control {{$errors->has('password')? 'is-invalid' : ''}}" 
        name="password" 
        placeholder="Password" required="required">
        <label for="inputPassword">Password</label>
        @if($errors->has('password'))
        <div class="infalid-feedback">{{$errors->first('password')}}</div>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember" {{old('remember') ? 'checked' : ''}}>
          Remember Password
        </label>
      </div>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Login</button>
  </form>
  <div class="text-center">
    <p>Don't have User Account?? Register New Account</p>
    <a class="d-block small mt-3" href="{{route('register')}}">Register New Account</a>
    <a class="d-block small" href="{{route('password.request')}}">Forgot Password?</a>
  </div>
</div>
</div>
@endsection