@extends('layouts.main')

@section('home')
<section class="banner-area relative" id="home">	
    <div class=""></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
               
                <form action="{{ route('search') }}" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-4 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="What are you looking for?">
                        </div>
                        {{-- <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects">
                                <select name="location">
                                    <option value="0">All Areas</option>
                                    @foreach($searchLocations as $id=>$searchLocations)
                                        <option value="{{ $id }}">{{ $searchLocations }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select name="category">
                                    <option value="0">All Categories</option>
                                    @foreach($searchCategories as $id=>$searchCategories)
                                        <option value="{{ $id }}">{{ $searchCategories }}</option>
                                    @endforeach
                                </select>
                            </div>										
                        </div>  --}}
                        <div class="col-lg-2 form-cols">
                            <button type="submit" class="btn btn-info">
                              <span class="lnr lnr-magnifier"></span> Search
                            </button>
                        </div>								
                    </div>
                </form>	
                {{--  <p class="text-white"> <span>Search by categories:</span>
               @foreach($searchByCategory as $id=>$searchByCategory)
                    <a href="{{ route('categories.show', $id) }}" class="text-white">{{ $searchByCategory }}</a>@if (!$loop->last),@endif
                @endforeach 
                </p>--}}
            </div>											
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="col-lg-8 post-list">
    @foreach($jobs as $job)
        <div class="single-post d-flex flex-row">
           
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="{{ route('jobs.show', $job->id) }}"><h4>{{ $job->name }}</h4></a>
                        <h6>{{ $job->company}}</h6>					
                    </div>
                </div>
                <p>
                    {{ $job->description }}
                </p>
                
                <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
                <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
            </div>
        </div>
    @endforeach

    <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{ route('jobs.index') }}">Load More Job Posts</a>
</div>	
@endsection