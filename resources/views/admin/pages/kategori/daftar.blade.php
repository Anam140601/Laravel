@extends('admin.main')
@section('title','Kategori')
@section('content')
<h1>Kategori</h1>
<hr>

@if(session('result')=='success')
<div class="alert alert-success alert-dismissible fade show">
	<strong>Saved!</strong> New Category has been saved.
	<button class="close" type="button" data-dismiss="alert">&times;</button>
</div>
@endif



<div class="row">
	<div class="col-md-6 mb-3">
		<a href="{{route('admin.kategori.add')}}" class="btn btn-success">Add</a>
	</div>
	<div class="col-md-6 mb-3">
		<form action="{{ route('admin.kategori') }}" method="GET">
			<div class="input-group">
				<input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}">
				<div class="input-group-append">
					<button class="btn btn-primary" type="submit">
						Search!
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

<table class="table table-striped mb-3">
	<tr>
		<th>Kategori</th><th>&nbsp;</th>
	</tr>
	@foreach($data as $dt)
	<tr>
		<td>{{ $dt->nama_kategori }}</td>
		<td>
			<a href="#" class="btn btn-success btn-sm">
				<i class="fa fa-w fa-edit"></i>
			</a>
			<button class="btn btn-danger btn-sm" type="button">
				<i class="fa fa-w fa-trash"></i>
			</button>
		</td>
	</tr>
	@endforeach
</table>
{{
	$data->appends( request()->only('keyword'))
	->links('vendor.pagination.bootstrap-4')
}}

@endsection