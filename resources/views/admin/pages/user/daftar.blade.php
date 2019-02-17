@extends('admin.main')
@section('title','User')
@section('content')







<h1>User</h1>
<hr>

@if(session('result') == 'success')
<div class="alert alert-success alert-dismissible fade show">
	<strong>Saved!</strong> <small>Success Saved Record</small>
	<button type="button" class="close" data-dismiss="alert" > &times;</button>
</div>
@endif

@if(session('result') == 'update')
<div class="alert alert-success alert-dismissible fade show">
	<strong>Saved!</strong> <small>Success Updated Record</small>
	<button type="button" class="close" data-dismiss="alert" > &times;</button>
</div>
@endif


<div class="row">
	<div class="col-md-6 mb-3">
		<a href="{{route('admin.user.add')}}" class="btn btn-primary">New User</a>
	</div>

	<div class="col-md-6 mb-3">
		<form action="{{ route('admin.user') }}" method="GET">
			<div class="input-group">
				<input type="text" name="keyword" value="{{ request('keyword') }}"  class="form-control">
				<div class="input-group-append">
					<button type="submit" class="btn btn-success">Search!</button>
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
		<td><img src="{{ url('storage/'.$dt->photo) }}" width="65" class="rounded"></td>
		
		<td>{{$dt->name }}</td>
		<td>{{$dt->email}}</td>
		<td>{{$dt->akses}}</td>
		<td>
			<a href="{{ route('admin.user.edit',['id'=>$dt->id]) }}" class="btn btn-success btn-sm">
				<i class="fa fa-w fa-edit"></i>
			</a>

			@if( $dt->id != Auth::id())
			<button class="btn btn-danger btn-sm btn-trash" type="button" data-id="{{ $dt->id }}" >
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

@push('modal')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title">Delete</h5>
				<button class="close" type="button" data-dismiss="modal">
					<span>X</span>
				</button>
			</div>

			<div class="modal-body">
				Are You Sure for Delete This User?
				<form action="#" method="post" id="form-delete">
					{{ csrf_field() }}
					{{ method_field('delete') }}
					<input type="hidden" name="id" id="input-id">
				</form>
			</div>

			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary btn-delete" type="button">Delete</button>
			</div>
		</div>
	</div>
</div>
@endpush

@push('js')
<script type="text/javascript">

$(function(){
	$('.btn-trash').click(function(){
		id = $(this).attr('data-id');
		$('#input-id').val(id);
		$('#deleteModal').modal('show');
	});

	$('.btn-delete').click(function(){
		alert($('#input-id').val());
	});
});
</script>
@endpush