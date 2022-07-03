@extends('layouts.dashboard')

@section('title', 'Show Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Person Information</h5>
        <span class="text-muted d-block">All details about the lost person</span>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="bg-white row py-3">
                <div class="col-md-4">Name</div>
                <div class="col-md-8">{{ $report->person_name }}</div>
            </div>
            <div class="bg-light row py-3">
                <div class="col-md-4">National Identification Number</div>
                <div class="col-md-8">{{ $report->person_national_identification_number }}</div>
            </div>
            <div class="bg-white row py-3">
                <div class="col-md-4">Birth Certificate Number</div>
                <div class="col-md-8">{{ $report->person_birth_certificate_number }}</div>
            </div>
            <div class="bg-light row py-3">
                <div class="col-md-4">Passport Number</div>
                <div class="col-md-8">{{ $report->person_passport_number }}</div>
            </div>
            <div class="bg-white row py-3">
                <div class="col-md-4">Person Phone Number</div>
                <div class="col-md-8">{{ $report->person_phone_number }}</div>
            </div>
            <div class="bg-light row py-3">
                <div class="col-md-4">Date Of Birth</div>
                <div class="col-md-8">{{ $report->person_date_of_birth }}</div>
            </div>
        </div>
    </div>
</div>

@if (!is_null($report->extra_items))
<div class="card mt-5">
    <div class="card-header">
        <h5>Person Extra Details</h5>
        <span class="text-muted d-block">Prelminary details about the person</span>
    </div>
    <div class="card-body">
        <div class="card-text">

            @foreach (json_decode($report->extra_items, true) as $key => $item)
            <div class="{{ (($loop->iteration % 2) == 0) ? 'bg-light' : 'bg-white' }} row py-3">
                <div class="col-md-4">{{ $key }}</div>
                <div class="col-md-8">{{ $item }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="card mt-5">
    <div class="card-header">
        <h5>Last Seen</h5>
        <span class="text-muted d-block">Information About the person when he was last seen</span>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="bg-white row py-3">
                <div class="col-md-4">Last Seen</div>
                <div class="col-md-8">{{ $report->last_seen->format('d/m/Y') }}</div>
            </div>
            <div class="bg-light row py-3">
                <div class="col-md-4">Last Seen Place</div>
                <div class="col-md-8">{{ $report->last_seen_place }}</div>
            </div>

            @if (!is_null($report->last_seen_with))
            <div class="bg-white row py-3">
                <div class="col-md-4">Last Seen With</div>
                <div class="col-md-8">
                    @foreach (json_decode($report->last_seen_with, true) as $person)
                    <div class="py-2"><span class="font-weight-bold">{{ $loop->iteration }}. </span> {{ $person }}</div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="card mt-5">
    <div class="card-header">
        <h5>Station Details</h5>
        <span class="text-muted d-block">Station Details And Reporting Status</span>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="bg-white row py-3">
                <div class="col-md-4">Station</div>
                <div class="col-md-8">{{ $report->station->name }}</div>
            </div>
            <div class="bg-light row py-3">
                <div class="col-md-4">Officer</div>
                <div class="col-md-8">{{ $report->officer->user->name }}</div>
            </div>
        </div>
    </div>
</div>

@endsection