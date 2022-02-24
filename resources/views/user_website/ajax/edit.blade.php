<form method="post" action="{{ route('user.website.update', $user->id) }}" id="frmStoreUserWebsite" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Website</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="user-website" class="col-form-label">Website:</label>
            <input type="url" class="form-control" name="website" id="user-website" value="{{$user->website}}">
            <span class="error_input website_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
