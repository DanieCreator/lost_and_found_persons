<div class="row">
    <div class="col-md-4">
        <h4 class="text-gray-900 font-weight-bold">Report Details</h4>
        <span>Update the report persos details.</span>
    </div>
    <div class="col-md-8">
        <div class="card bg-white rounded shadow-sm">
            <div class="card-body">
                <div class="card-text">
                    <form wire:submit.prevent="update">
                        <div class="form-group">
                            <label for="name" class="text-gray-800 font-weight-bold">Person Name</label>
                            <input type="text" id="name" wire:model.lazy="person_name"
                                class="form-control @error('person_name') is-invalid @enderror">
                            @error('person_name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="person_national_identification_number"
                                class="text-gray-800 font-weight-bold">National Identification Number</label>
                            <input type="text" id="person_national_identification_number"
                                wire:model.lazy="person_national_identification_number"
                                class="form-control @error('person_national_identification_number') is-invalid @enderror">
                            @error('person_national_identification_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="person_birth_certificate_number" class="text-gray-800 font-weight-bold">Birth
                                Certifcate Number</label>
                            <input type="text" id="person_birth_certificate_number"
                                wire:model.lazy="person_birth_certificate_number"
                                class="form-control @error('person_birth_certificate_number') is-invalid @enderror">
                            @error('person_birth_certificate_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="person_passport_number" class="text-gray-800 font-weight-bold">Passport
                                Number</label>
                            <input type="text" id="person_passport_number" wire:model.lazy="person_passport_number"
                                class="form-control @error('person_passport_number') is-invalid @enderror">
                            @error('person_passport_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="person_phone_number" class="text-gray-800 font-weight-bold">Phone Number</label>
                            <input type="text" id="person_phone_number" wire:model.lazy="person_phone_number"
                                class="form-control @error('person_phone_number') is-invalid @enderror">
                            @error('person_phone_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="person_date_of_birth" class="text-gray-800 font-weight-bold">Date of
                                Birth</label>
                            <input type="date" id="person_date_of_birth" wire:model.lazy="person_date_of_birth"
                                class="form-control @error('person_date_of_birth') is-invalid @enderror">
                            @error('person_date_of_birth')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="clearfix">
                            <button class="btn btn-dark text-uppercase float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>