@extends('layouts.dashboard')

@section('title', $station->name)

@section('content')
    <div>
        <div class="row">
            <div class="col-md-6">
                <span class="font-weight-bold">Name</span>
            </div>
            <div class="col-md-6">
                <span class="text-primary">{{ $station->name }}</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <span class="font-weight-bold">Location</span>
            </div>
            <div class="col-md-6">
                <span class="text-primary">{{ $station->location }}</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <span class="font-weight-bold">Position</span>
            </div>
            <div class="col-md-6">
                <span class="text-primary">({{ $station->lat }}, {{ $station->lng }})</span>
            </div>
        </div>
        <hr>
    </div>

    <div class="clearfix mt-3 d-flex justify-content-end">
        <a href="{{ route('admin.stations.edit', $station) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('admin.stations.destroy', $station) }}" method="post">
            <button type="submit" class="btn btn-danger ml-3">Delete</button>
        </form>
    </div>

@endsection