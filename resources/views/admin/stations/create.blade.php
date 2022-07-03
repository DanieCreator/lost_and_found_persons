@extends('layouts.dashboard')

@section('title', 'Add Station')

@section('btn')
    
@endsection

@section('content')
    <form action="{{ route('admin.stations.store') }}" method="post">
        @csrf
        <input type="hidden" id="lat" name="lat" value="0.00">
        <input type="hidden" id="lng" name="lng" value="0.00">

        <div class="form-group">
            <label for="name" class="text-gray-700">Name</label>
            <input type="text" name="name" id="name" 
                class="form-control @error('name') is-invalid @enderror" 
                aria-describedby="nameHelp" value="{{ old('name') }}">
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
                aria-describedby="locationHelp" value="{{ old('location') }}">
            <small class="text-muted form-text" id="locationHelp">The location of the police station(Should be Autocomplete)</small>
            @error('location')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div id="map" class="bg-secondary" style="height: 40vh">
            Google Maps
        </div>

        <div class="mt-3 clearfix">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.api_key') }}&libraries=places&callback=initMap"></script>
    <script src="/js/maps/create.js"></script>
@endsection