{{-- @extends('layouts.app') --}}

@section('content')
	<h1>{{ $album->name }}</h1>
	<a class="btn btn-secondary" href="/">Go Back</a>
	<a class="btn btn-primary" href="/photos/create/{{ $album->id }}">Add Photo To Album</a>
	<hr>
	<div class="row">
		@foreach($album->photos as $photo)
			<div class="card mr-2" style="width: 18rem;">
			  {{-- <img class="card-img-top" src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}"> --}}
			  <img src="{{ asset('storage/photos/'."$photo->album_id"."photo->photo") }}">
			  <div class="card-body">
			    <p class="card-title text-center"><a href="/photos/{{ $photo->id }}">{{ $photo->title }}</a></p>
			  </div>
			</div>
		@endforeach
	</div>
@endsection