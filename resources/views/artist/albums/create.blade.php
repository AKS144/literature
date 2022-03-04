{{-- @extends('layouts.app') --}}

@section('content')
<div class="row">
	<h3 class="mx-auto">Create Album</h3>
</div>
<div class="row">
	<form method="POST" action="/albums/store" enctype="multipart/form-data" class="mx-auto">
		@csrf
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" placeholder="Album Name" class="form-control">

		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" placeholder="Album Description" class="form-control"></textarea>
		</div>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text">Upload Image</span>
		  </div>
		  <div class="custom-file">
		    <input type="file" class="custom-file-input" id="coverImage" name="cover_image">
		    <label class="custom-file-label" for="coverImage">Choose file</label>
		  </div>
		</div>
		<input class="btn btn-primary" type="submit" value="Create">
	</form>
</div>
@endsection