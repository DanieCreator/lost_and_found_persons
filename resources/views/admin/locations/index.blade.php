@extends('layouts.dashboard')

@section('title', 'Police Stations Locations')

@section('content')
    
    <div>
        @if ($locations->count())
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Stations Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $key => $location)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $location->location }}</td>
                                <td>{{ $location->station_count }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Browse Stations</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <span class="font-weight-bold">No locations added yet</span>
        @endif
    </div>

@endsection