{{-- @extends('layouts.app') --}}

@section('content')
	<h1>{{ $photo->title }}</h1>
	<p>{{ $photo->description }}</p>
	<a class="btn btn-secondary" href="/albums/{{ $photo->album_id }}">Go Back To Gallery</a>
	<hr>
	<div class="row">
		<img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}" class="mx-auto">

	</div>
	<div class="row mt-3">
		<form method="POST" action="/photos/{{ $photo->id }}">
			@method('DELETE')
			@csrf
			<input type="submit" class="btn btn-danger" value="Delete Photo">
		</form>
	</div>
	<hr>
	<small class="pb-5">Size: {{ $photo->size }}KB</small>
@endsection