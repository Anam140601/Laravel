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
						<input type="text" name="name" class="form-control" value="{{old('name')}}" id="iName" placeholder="Username" required>
						<label for="iName">Username</label>
					</div>

					<div class="form-group form-label-group">
						<input type="email" name="email" class="form-control" value="{{old('email')}}" id="iEmail" placeholder="email" required>
						<label for="iEmail">Email</label>
					</div>

					<div class="form-group form-label-group">
						<input type="passord" name="passord" class="form-control" value="{{old('passord')}}" id="iPassword" placeholder="Password" required>
						<label for="iPassword">Pasword</label>
					</div>

					<div class="form-group form-label-group">
						<input type="passord" name="repassword" class="form-control" value="{{old('repassword')}}" id="iRePassword" placeholder="Confirm Password" required>
						<label for="iRePassword">Confirm Password</label>
					</div>
					
					<div class="form-group form-label-group">
						<select class="form-control" name="akses">
							<option value="">Akses Sebagai :</option>
							<option value="Operator">Operator</option>
							<option value="Admin">Administrator</option>
						</select>
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