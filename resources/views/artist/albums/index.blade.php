{{-- @extends('layouts.app') --}}

@section('content')
	<h3>Albums</h3>
	<div class="row">
		@foreach($albums as $album)
			<div class="card mr-2" style="width: 18rem;">
			  <img class="card-img-top" src="/storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}">
			  <div class="card-body">
			    <p class="card-title text-center"><a href="/albums/{{ $album->id }}">{{ $album->name }}</a></p>
			  </div>
			</div>
		@endforeach
	</div>
@endsection

@csrf

