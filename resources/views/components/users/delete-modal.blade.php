<div class="modal" tabindex="-1" id="delete-account">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <form action="{{ route('users.destroy', Auth::user()) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Deleting Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete your account? As said earlier you will loose all your data in the system, make sure you've downloaded and backed up the data if you sure.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Forget It</button>
                    <button class="btn btn-danger">Sure</button>
                </div>
            </form>
        </div>
    </div>
</div>