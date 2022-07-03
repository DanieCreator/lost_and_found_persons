@extends('layouts.dashboard')

@section('title', 'Police Stations')

@section('btn')
    <a href="{{ route('admin.stations.create') }}" class="btn btn-sm btn-primary">Add Station</a>
@endsection

@section('content')
    
    <div>
        @if ($stations->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Position</th>
                            <th>Updated</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stations as $station)
                            <tr>
                                <td>{{ $station->id }}</td>
                                <td>{{ $station->name }}</td>
                                <td>{{ $station->location }}</td>
                                <td>({{ $station->lat }}, {{ $station->lng }})</td>
                                <td>{{ $station->updated_at->format('m/d/Y') }}</td>
                                <td>{{ $station->created_at->format('m/d/Y') }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.stations.show', $station) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <form action="{{ route('admin.stations.destroy', $station) }}" method="post">
                                        <button type="submit" class="btn btn-sm btn-danger ml-3">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <span class="font-weight-bold">No stations added yet</span>
        @endif
    </div>

@endsection