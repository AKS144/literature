@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.job.title_singular') }}
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route("admin.jobs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($job) ? $job->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif             
            </div>

            <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                <label for="company">Company*</label>
                <input type="text" id="company" name="company" class="form-control" value="{{ old('company', isset($job) ? $job->company : '') }}" required>
                @if($errors->has('company'))
                    <em class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </em>
                @endif              
            </div>
           
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($job) ? $job->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif                
            </div>
            <div class="form-group {{ $errors->has('requirements') ? 'has-error' : '' }}">
                <label for="requirements">Requirements</label>
                <textarea id="requirements" name="requirements" class="form-control ">{{ old('requirements', isset($job) ? $job->requirements : '') }}</textarea>
                @if($errors->has('requirements'))
                    <em class="invalid-feedback">
                        {{ $errors->first('requirements') }}
                    </em>
                @endif                
            </div>
           
            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                <label for="location">Location*</label>
                <select name="location_id" id="location" class="form-control select2" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ (isset($job) && $job->location ? $job->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                <label for="categories">Category</label>
                <select name="categories" id="categories" class="form-control select2" required>
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (isset($job) && $job->categories ? $job->categories->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </em>
                @endif
            </div>

            {{-- <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                <label for="categories">Category</label>
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="categories" id="categories" class="form-control select2" multiple="multiple">
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($job) && $job->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </em>
                @endif               
            </div> --}}

            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Address</label>
                {{-- <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($job) ? $job->address : '') }}"> --}}
                <textarea id="address" name="address" class="form-control ">{{ old('address', isset($job) ? $job->address : '') }}</textarea>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif                
            </div>
            {{-- <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                <label for="categories">Category</label>
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($job) && $job->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </em>
                @endif               
            </div> --}}
          

            {{-- <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                <label for="location">Location*</label>
                <select name="location_id" id="location" class="form-control select2" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ (isset($job) && $job->location ? $job->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_id') }}
                    </em>
                @endif
            </div> --}}

            <div class="form-group">
                <label for="title">From</label>
                <input type="date" id="start_date" name="start_date" class="form-control"
                    value="{{ old('start_date', isset($job) ? $job->start_date : '') }}" style="width:350px" required>
                @if ($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="title">Till</label>
                <input type="date" id="end_date" name="end_date" class="form-control"
                    value="{{ old('end_date', isset($job) ? $job->end_date : '') }}" style="width:350px" required>
                @if ($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                <label for="salary">Salary*</label>
                <input type="text" id="salary" name="salary" class="form-control" value="{{ old('salary', isset($job) ? $job->salary : '') }}" required>
                @if($errors->has('salary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </em>
                @endif               
            </div> 
            <div class="form-group {{ $errors->has('job_link') ? 'has-error' : '' }}">
                <label for="name">Job Link*</label>
                <input type="text" id="job_link" name="job_link" class="form-control" value="{{ old('job_link', isset($job) ? $job->job_link : '') }}" required>
                @if($errors->has('job_link'))
                    <em class="invalid-feedback">
                        {{ $errors->first('job_link') }}
                    </em>
                @endif             
            </div>           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection