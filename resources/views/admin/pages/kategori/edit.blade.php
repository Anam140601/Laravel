@extends('admin.main')
@section('title','Edit Category')
@section('content')
<h1>Edit <small class="text-muted">Category</small></h1>
<hr>


@if(session('result')=='fail')
<div class="alert alert-danger alert-dismissible fade show">
	<strong>Failed!</strong> Category not be saved.
	<button class="close" type="button" data-dismiss="alert">&times;</button>
</div>
@endif



<div class="row">
	<div class="col-md-6 mb-3">
		<form action="{{ route('admin.kategori.edit',['id'=>$rc->id]) }}" method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h5>Edit Category</h5>
				</div>
				<div class="card-body">
					<div class="form-group form-label-group">
						<input type="text" class="form-control {{ $errors->has('kategori')?'is-invalid':'' }}" id="iKategori" name="kategori" value="{{ old('kategori',$rc->nama_kategori) }}" placeholder="Category" required>
						<label for="iKategori">Category</label>
						@if($errors->has('kategori'))
						<div class="invalid-feedback">{{ $errors->first('kategori') }}</div>
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