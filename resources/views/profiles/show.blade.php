@extends('layouts.main')

@section('banner', 'Job: '.$job->title)
@section('content')
<div class="col-lg-8 post-list">
    <div class="single-post d-flex flex-row">
        <div class="thumb">
            @if($profile->company && $profile->company->logo)
                <img src="{{ $profile->company->logo->getUrl() }}" alt="{{ $profile->company->name }}">
            @endif
        </div>
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#"><h4>{{ $profile->title }}</h4></a>
                    @if($profile->company)
                        <h6>{{ $profile->company->name }}</h6>		
                    @endif			
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
    <div class="single-post job-details">
        <h4 class="single-title">Whom we are looking for</h4>
        <p>
            {{ $profile->full_description }}
        </p>
    </div>
    <div class="single-post job-experience">
        <h4 class="single-title">Experience Requirements</h4>
        <p>
            {{ $profile->requirements }}
        </p>
    </div>													
</div>
@endsection