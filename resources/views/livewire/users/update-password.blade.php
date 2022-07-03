<div class="row">
    <div class="col-md-4">
        <h4 class="text-gray-900 font-weight-bold">Update Password</h4>
        <span>Ensure your account is using a long, random password to stay secure.</span>
    </div>
    <div class="col-md-8">
        <div class="card bg-white rounded shadow-sm">
            <div class="card-body">
                <div class="card-text">
                    <form wire:submit.prevent="updatePassword">
                        <div class="form-group">
                            <label for="currentPassword" class="text-gray-800 font-weight-bold">Current Password</label>
                            <input type="password" id="currentPassword" wire:model="current_password"
                                class="form-control @error('current_password') is-invalid @enderror">
                            @error('current_password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newPassword" class="text-gray-800 font-weight-bold">New Password</label>
                            <input type="password" id="newPassword" wire:model="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmation" class="text-gray-800 font-weight-bold">Confirm
                                Password</label>
                            <input type="password" id="passwordConfirmation" wire:model="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror">
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