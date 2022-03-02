@extends('layouts.main')

@section('content')
<div class="col-lg-8 post-list">
    @foreach($profiles as $profiles)
        {{-- <div class="single-post d-flex flex-row">
            <div class="thumb">
                @if($job->company->logo)
                    <img src="{{ $job->company->logo->getUrl() }}" alt="">
                @endif
            </div> --}}
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="{{ route('profiles.show', $profiles->id) }}"><h4>{{ $profiles->name }}</h4></a>
                      					
                    </div>
                </div>
               
            </div>
        </div>
    @endforeach
    {{ $profiles->appends(request()->query())->links() }}
</div>	
@endsection