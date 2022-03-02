@extends('layouts.main')


@section('content')
<div class="col-lg-8 post-list">
    <div class="single-post d-flex flex-row">
        {{-- <div class="thumb">
            @if($job->company && $job->company->logo)
                <img src="{{ $job->company->logo->getUrl() }}" alt="{{ $job->company->name }}">
            @endif
        </div> --}}
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#"><h4>{{ $profiles->name }}</h4></a>
                    {{-- @if($job->company)
                        <h6>{{ $job->company->name }}</h6>		
                    @endif			 --}}
                </div>
            </div>
         
        </div>
    </div>	
    											
</div>
@endsection