<div class="row">
    <div class="col-md-4">
        <h4 class="text-gray-900 font-weight-bold">Profile Information</h4>
        <span>Update your account's profile information and email address.</span>
    </div>
    <div class="col-md-8">
        <div class="card bg-white rounded shadow-sm">
            <div class="card-body">
                <div class="card-text">
                    <form wire:submit.prevent="save">
                        <div class="form-group">
                            <label for="name" class="text-gray-800 font-weight-bold">Name</label>
                            <input type="text" id="name" wire:model.lazy="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-gray-800 font-weight-bold">Email</label>
                            <input type="email" id="email" wire:model.lazy="email"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber" class="text-gray-800 font-weight-bold">Phone</label>
                            <input type="text" id="phoneNumber" wire:model.lazy="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror">
                            @error('phone_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="idNumber" class="text-gray-800 font-weight-bold">National ID Number</label>
                            <input type="text" id="idNumber" wire:model.lazy="national_identification_number"
                                class="form-control @error('national_identification_number') is-invalid @enderror">
                            @error('national_identification_number')
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