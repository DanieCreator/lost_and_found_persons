@extends('layouts.app')

@section('content')
<div class="container">

    @if (request()->has('s'))
    <h1>Search Results</h1>
    @else
    <h1>Latest Reports</h1>
    @endif

    <div class="mt-5">
        @if ($reports->count())
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <td>##</td>
                        <td>Name</td>
                        <td>Station</td>
                        <td>DOB</td>
                        <td>Last Seen</td>
                        <td>Last Updated</td>
                        <td>When Reported</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->person_name }}</td>
                        <td>{{ $report->station->name }}</td>
                        <td>{{ $report->person_date_of_birth }}</td>
                        <td>{{ $report->last_seen->format('m/d/Y') }}</td>
                        <td>{{ $report->updated_at->format('m/d/Y') }}</td>
                        <td>{{ $report->created_at->format('m/d/Y') }}</td>
                        <td class="d-flex">
                            <a href="{{ route('reports.show', $report) }}"
                                class="btn btn-sm btn-secondary mx-2">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $reports->links() }}
        </div>
        @else
        @if (request()->has('s'))
        <div class="font-weight-bold">No results found</div>
        @else
        <div class="font-weight-bold">No Cases reports yet!</div>
        @endif
        @endif
    </div>

</div>
@endsection