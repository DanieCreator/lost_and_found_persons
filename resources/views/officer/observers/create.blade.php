@extends('layouts.dashboard')

@section('title', 'Add Observer')

@section('content')
<div>
    <form action="{{ route('officer.observers.store') }}" method="post">
        @csrf

        <div class="row rounded-lg p-2">
            <div class="col-md-4">
                <h4 class="font-weight-bold my-3">User Details</h4>
                <span>Observer's account details and email address. After creating the user inform them that their password to login is (password)</span>
            </div>
            <div class="col-md-8">

                <div class="card shadow rounded-lg">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="name" class="text-gray-700">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        aria-describedby="nameHelp" value="{{ old('name') }}">
                                    <small class="text-muted form-text " id="nameHelp">The name of the observer</small>
                                    @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="text-gray-700">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        aria-describedby="emailHelp" value="{{ old('email') }}">
                                    <small class="text-muted form-text" id="emailHelp">The email of the observer</small>
                                    @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number" class="text-gray-700">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        aria-describedby="phone_numberHelp" value="{{ old('phone_number') }}">
                                    <small class="text-muted form-text" id="phone_numberHelp">The phone number of the observer</small>
                                    @error('phone_number')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="national_identification_number" class="text-gray-700">National ID
                                        Number</label>
                                    <input type="text" name="national_identification_number"
                                        id="national_identification_number"
                                        class="form-control @error('national_identification_number') is-invalid @enderror"
                                        aria-describedby="national_identification_numberHelp"
                                        value="{{ old('national_identification_number') }}">
                                    <small class="text-muted form-text" id="national_identification_numberHelp">The
                                        national identification number for the observer</small>
                                    @error('national_identification_number')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-info text-uppercase">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection