@extends('layouts.dashboard')

@section('title', 'Edit Station')

@section('content')
    <div class="">
        <form action="{{ route('admin.stations.update', $station) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="lat" value="{{ old('lat') ?? $station->lat }}">
            <input type="hidden" name="lng" value="{{ old('lng') ?? $station->lng }}">

            <div class="form-group">
                <label for="name" class="text-gray-700">Name</label>
                <input type="text" name="name" id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    aria-describedby="nameHelp" value="{{ old('name') ?? $station->name }}">
                <small class="text-muted form-text " id="nameHelp">The name of the police station</small>
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location" class="text-gray-700">Location</label>
                <input type="text" name="location" id="location" 
                    class="form-control @error('location') is-invalid @enderror" 
                    aria-describedby="locationHelp" value="{{ old('location') ?? $station->location }}">
                <small class="text-muted form-text" id="locationHelp">The location of the police station(Should be Autocomplete)</small>
                @error('location')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
    
            <div id="map" class="bg-secondary" style="height: 32vh">
                Google Maps
            </div>

            <div class="mt-3 clearfix">
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
        </form>
    </div>
@endsection