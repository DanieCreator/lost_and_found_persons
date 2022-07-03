<div id="profile-information" class="row">
    <div class="col-md-4">
        <h4 class="text-gray-900 font-weight-bold">Profile Photo Section</h4>
        <span>Update your account's profile photo</span>
    </div>
    <div class="col-md-8">
        <div class="card bg-white rounded shadow-sm">
            <div class="card-body">
                <div class="card-text">
                    <form wire:submit.prevent="changeProfilePicture" method="post">
                        <div>
                            <div>
                                <label for="photo" class="text-gray-800 font-weight-bold">Profile Photo</label>
                            </div>
                            <div class="mt-2">
                                <img class="rounded-circle" src="{{ $photo ? $photo->temporaryUrl() : Auth::user()->profilePicture() }}" width="200"
                                    alt="{{ Auth::user()->name }}">
                            </div>

                            <div class="pt-2">
                                <input class="form-control-img @error('photo') is-invalid @enderror" 
                                    type="file" wire:model="photo">
                                @error('photo')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-dark text-uppercase mt-2">Save Photo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>