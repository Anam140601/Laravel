@extends('admin.main')
@section('title','User')
@section('content')

@foreach($data as $dt)
<?php 
$img = "img-user";
$photo = $dt->photo;
$avatar = url($img."/".$photo);
 ?>
 @endforeach



<h1>User</h1>
<hr>

<div class="row">
	<div class="col-md-6 mb-3">
		<a href="#" class="btn btn-primary">Tambah User</a>
	</div>

	<div class="col-md-6 mb-3">
		<form action="{{ route('admin.user') }}" method="GET">
			<div class="input-group">
				<input type="text" name="keyword" value="{{ request('keyword') }}"  class="form-control">
				<div class="input-group-append">
					<button type="submit" class="btn btn-success">Search</button>
				</div>
			</div>
		</form>
	</div>
</div>

<table class="table table-stiped mb-3">
	<tr>
		<th>Avatar</th><th>Username</th><th>Email</th><th>Akses</th><th>&nbsp;</th>
	</tr>
	@foreach($data as $dt)
	<tr>
		<td><img src={{$avatar}} width="65" class="rounded"></td>
		<td>{{$dt->name }}</td>
		<td>{{$dt->email}}</td>
		<td>{{$dt->akses}}</td>
		<td>
			<a href="#" class="btn btn-success btn-sm">
				<i class="fa fa-w fa-edit"></i>
			</a>

			@if( $dt->id != Auth::id())
			<button class="btn btn-danger btn-sm" type="button">
				<i class="fa fa-w fa-trash"></i>
			</button>
			@endif
		</td>
	</tr>
	@endforeach
</table>

{{
	$data->appends( request()->only('keyword') )
	->links('vendor.pagination.bootstrap-4')
}}


@endsection