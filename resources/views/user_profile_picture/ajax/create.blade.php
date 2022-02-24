<form method="post" action="{{ route('user.profile.picture.store') }}" id="frmStoreUserProfilePicture" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="user_profile_picture" class="col-form-label">Profile Picture:</label>
            <input type="file" class="form-control-file" name="user_profile_picture" id="user_profile_picture">
            <span class="error_input profile_picture_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
