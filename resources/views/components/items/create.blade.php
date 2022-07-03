<div class="modal" tabindex="-1" id="create-item-modal" aria-hidden="true">
    <form action="{{ route('admin.items.store') }}" method="post">
        @csrf
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="key" class="font-weight-bold text-gray-700">Key</label>
                        <input type="text" name="key" id="key" placeholder="Item Key" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>