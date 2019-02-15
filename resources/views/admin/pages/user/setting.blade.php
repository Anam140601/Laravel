@extends('admin.main')
@section('title','User Setting |')
@section('content')

<?php 
$img = "img-user";
$photo = Auth::user()->photo;
$avatar = url($img."/".$photo);
 ?>

<h1>USER</h1>
<hr>
@if(session('result') == 'success')
<div class="alert alert-success alert-dismissiable fade show" >
	<strong>Update !</strong> Data Berhasil Di Update
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
</div>
@elseif(session('result') == 'fail')
<div class="alert alert-danger alert-dismissiable fade show" >
	<strong>Failed !</strong> Data Gagal Di Update
	<button type="button" class="close" data-dismiss="alert">
		&times;
	</button>
</div>
@endif


<div class="row">
	<div class="col-md-6">
		<form action="{{ route('admin.user.setting')}}" method="post">
			<div class="card mb-3">
				<div class="card-header"><h5>Setting</h5></div>
				<div class="card-body">
					{{ csrf_field() }}

					<div class="form-group form-label-group">
						<input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{ old('name',$dt->name) }}" id="iName" placeholder="Username" required>
						<label for="iName">Username</label>
						@if($errors->has('name'))
						<div class="invalid-feedback">{{$errors->first('name')}}</div>
						@endif
					</div>
					<div class="form-group form-label-group">
						<input type="email" name="email" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{ old('email',$dt->email) }}" id="iEmail" placeholder="User Email" required>
						<label for="iEmail">User Email</label>
						@if($errors->has('email'))
						<div class="invalid-feedback">{{$errors->first('email')}}</div>
						@endif
					</div>
					<div class="form-group form-label-group">
						<input type="password" name="password" class="form-control {{$errors->has('name')?'is-invalid':''}}" id="iPassword" placeholder="Password">
						<label for="iPassword">Password</label>
						@if($errors->has('password'))
						<div class="invalid-feedback">{{$errors->first('password')}}</div>
						@endif
						<div class="form-text text-muted">
							<small>Kosongkan Password bila tidak diubah....</small>
						</div>
					</div>
					<div class="form-group form-label-group">
						<input type="password" name="repassword" class="form-control {{$errors->has('name')?'is-invalid':''}}" id="iRePassword" placeholder="Confirm Password">
						<label for="iRePassword">Confirm Password</label>
						@if($errors->has('repassword'))
						<div class="invalid-feedback">{{$errors->first('repassword')}}</div>
						@endif
					</div>
					<div class="form-group form-label-group">
						<img width="15%" src={{$avatar}}>
						<input type="file" name="fileupoad" class="form-control {{$errors->has('name')?'is-invalid':''}}" id="ifileupload">
						@if($errors->has('fileupload'))
						<div class="invalid-feedback">{{$errors->first('fileupload')}}</div>
						@endif
					</div>


				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary shadow-sm">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection