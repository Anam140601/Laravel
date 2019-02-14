@extends('admin.main')
@section('title','New User')
@section('content')
<h1>New <small class="text-muted">User</small></h1>
<hr>

<div class="row">
	<div class="col-md-6">
		<form action="{{route('admin.user.add')}}" method="POST">
			{{csrf_field()}}
			<div class="card">
				<div class="card-header">
					<h5>New User</h5>
				</div>

				<div class="card-body">
					<div class="form-group form-label-group">
						<input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{old('name')}}" id="iName" placeholder="Username" required>
						<label for="iName">Username</label>
						@if($errors->has('name'))
						<div class="invalis-feedback">{{$errors->first('name')}}</div>
						@endif
					</div>

					<div class="form-group form-label-group">
						<input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{old('email')}}" id="iEmail" placeholder="email" required>
						<label for="iEmail">Email</label>
						@if($errors->has('email'))
						<div class="invalis-feedback">{{$errors->first('email')}}</div>
						@endif
					</div>

					<div class="form-group form-label-group">
						<input type="passord" name="passord" class="form-control {{$errors->has('password')?'is-invalid':''}}" id="iPassword" placeholder="Password" required>
						<label for="iPassword">Pasword</label>
						@if($errors->has('password'))
						<div class="invalis-feedback">{{$errors->first('password')}}</div>
						@endif
					</div>

					<div class="form-group form-label-group">
						<input type="passord" name="repassword" class="form-control {{$errors->has('repassword')?'is-invalid':''}}" id="iRePassword" placeholder="Confirm Password" required>
						<label for="iRePassword">Confirm Password</label>
						@if($errors->has('repassword'))
						<div class="invalis-feedback">{{$errors->first('repassword')}}</div>
						@endif
					</div>
					
					<div class="form-group form-label-group">
						<?php 
						$val = old('akses');
						 ?>
						<select class="form-control" name="akses">
							<option value="" {{$val==""?'selected':''}}>Akses Sebagai :</option>
							<option value="Operator" {{$val=="Admin"?'selected':''}}>Operator</option>
							<option value="Admin" {{$val=="Operator"?'selected':''}}>Administrator</option>
						</select>
						@if($errors->has('akses'))
						<div class="invalis-feedback">{{$errors->first('akses')}}</div>
						@endif
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>


@endsection