@extends('admin.main')
@section('title'.'Add Category')
@section('content')
<h1>Add <small class="text-muted">Category</small></h1>
<hr>

<div class="row">
	<div class="col-md-6 mb-3">
		<form action="{{ route('admin.kategori.add') }}" method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h5>Add New Category</h5>
				</div>
				<div class="card-body">
					<div class="form-group form-label-group">
						<input type="text" class="form-control {{ $errors->has('kategori')?'is-invalid':'' }}" id="iKategori" name="kategori" value="{{ old('kategori') }}" placeholder="Category" required>
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