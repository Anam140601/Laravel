@extends('auth.main')
@section('title','Register')
@section('content')
<div class="card card-register mx-auto mt-5">
  <div class="card-header">Register an Account</div>
  <div class="card-body">
    <form method="POST" action="{{route('register')}}">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-label-group">
              <input id="name" type="text" class="form-control" placeholder="Username" value="{{old('name')}}" name="name" required autofocus >
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
              <label for="name">Username</label>
            </div>
          </div>
          
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-group">
          <input type="email" id="email" class="form-control" placeholder="Email address" required value="{{ old('email') }}" name="email">
          <label for="email">Email address</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required name="password">
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
              <label for="password">Password</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-label-group">
              <input type="password" id="password-confirm" class="form-control" placeholder="Confirm password" required name="password_confirmation">
              <label for="password-confirm">Confirm password</label>
            </div>
          </div>
        </div>
      </div>
    <button class="btn btn-primary btn-block" type="submit">Register</button>
    </form>
    <div class="text-center">
      <p>Have User Account?? Goto Login Page</p>
      <a class="d-block small mt-3" href="{{route('login')}}">Login Page</a>
    </div>
  </div>
</div>
@endsection

