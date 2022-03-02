@extends('layouts.main')

@section('banner', $banner)

@section('content')
<div class="col-lg-8 post-list">
    @foreach($jobs as $job)
        <div class="single-post d-flex flex-row">
            <div class="thumb">
                @if($profile->company->logo)
                    <img src="{{ $profile->company->logo->getUrl() }}" alt="">
                @endif
            </div>
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="{{ route('jobs.show', $job->id) }}"><h4>{{ $profile->title }}</h4></a>
                        <h6>{{ $profile->company->name }}</h6>					
                    </div>
                </div>
                <p>
                    {{ $profile->short_description }}
                </p>
                <h5>Job Nature: {{ $profile->job_nature }}</h5>
                <p class="address"><span class="lnr lnr-map"></span> {{ $profile->address }}</p>
                <p class="address"><span class="lnr lnr-database"></span> {{ $profile->salary }}</p>
            </div>
        </div>
    @endforeach
    {{ $jobs->appends(request()->query())->links() }}
</div>	
@endsection