@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.job.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $job->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $job->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Company
                        </th>
                        <td>
                            {{ $job->company ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{ $job->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {!! $job->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Requirements
                        </th>
                        <td>
                            {!! $job->requirements !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Start Date
                        </th>
                        <td>
                            {{ $job->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            End Date
                        </th>
                        <td>
                            {{ $job->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Job Link
                        </th>
                        <td>
                            {{ $job->job_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Location
                        </th>
                        <td>
                            {{ $job->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $job->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Categories
                        </th>
                        <td>
                            {{-- @foreach($job->categories as $id => $categories)
                                <span class="label label-info label-many">{{ $categories->name }}</span>
                            @endforeach --}}
                            {{ $job->categories->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Salary
                        </th>
                        <td>
                            {{ $job->salary }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.job.fields.top_rated') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $job->top_rated ? "checked" : "" }}>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection