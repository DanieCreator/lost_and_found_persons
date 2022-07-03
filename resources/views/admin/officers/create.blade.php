@extends('layouts.dashboard')

@section('title', 'Add Officer')

@section('content')

<div class="mx-3">
    <form action="{{ route('admin.officers.store') }}" method="post">
        @csrf

        <div class="row bg-white rounded-lg p-2">
            <div class="col-md-3">
                <h4 class="font-weight-bold my-3">User Details</h4>
            </div>
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="name" class="text-gray-700">Name</label>
                        <input type="text" name="user[name]" id="name"
                            class="form-control @error('user.name') is-invalid @enderror" aria-describedby="nameHelp"
                            value="{{ old('user.name') }}">
                        <small class="text-muted form-text " id="nameHelp">The name of the police officer</small>
                        @error('user.name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="text-gray-700">Email</label>
                        <input type="email" name="user[email]" id="email"
                            class="form-control @error('user.email') is-invalid @enderror" aria-describedby="emailHelp"
                            value="{{ old('user.email') }}">
                        <small class="text-muted form-text" id="emailHelp">The email of the police officer</small>
                        @error('user.email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone_number" class="text-gray-700">Phone Number</label>
                        <input type="text" name="user[phone_number]" id="phone_number"
                            class="form-control @error('user.phone_number') is-invalid @enderror"
                            aria-describedby="phone_numberHelp" value="{{ old('phone_number') }}">
                        <small class="text-muted form-text" id="phone_numberHelp">The phone_number of the police
                            officer</small>
                        @error('user.phone_number')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="national_identification_number" class="text-gray-700">National ID Number</label>
                        <input type="text" name="user[national_identification_number]" id="national_identification_number"
                            class="form-control @error('user.national_identification_number') is-invalid @enderror"
                            aria-describedby="national_identification_numberHelp"
                            value="{{ old('user.national_identification_number') }}">
                        <small class="text-muted form-text" id="national_identification_numberHelp">The
                            national identification number for the police officer</small>
                        @error('user.national_identification_number')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <hr>

        <div class="row bg-white rounded-lg p-2">
            <div class="col-md-3">
                <h4 class="font-weight-bold my-3">Officer Details</h4>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="stationId" class="text-gray-700">Station</label>
                        <select name="officer[station_id]" id="stationId"
                            class="form-control @error('officer.station_id') is-invalid @enderror"
                            aria-describedby="stationIdHelp">
                            <option value="">Select Station...</option>
                            @foreach ($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted form-text" id="stationIdHelp">
                            Select current station for the police officer
                        </small>
                        @error('officer.station_id')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="officer_number" class="text-gray-700">Officer ID Number</label>
                        <input type="text" name="officer[officer_number]" id="officer_number"
                            class="form-control @error('officer.officer_number') is-invalid @enderror"
                            aria-describedby="officer_numberHelp" value="{{ old('officer_number') }}">
                        <small class="text-muted form-text" id="officer_numberHelp">
                            Officer Identification Number
                        </small>
                        @error('officer.officer_number')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" name="officer[ocs]" class="custom-control-input" id="ocsCheckBox">
                            <label class="custom-control-label" for="ocsCheckBox">Officer Commanding Police Station (OCS)</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 clearfix">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>
    </form>
</div>
@endsection