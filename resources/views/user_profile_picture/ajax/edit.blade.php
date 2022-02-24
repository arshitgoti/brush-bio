<form method="post" action="{{ route('user.profile.picture.update', $user->id) }}" id="frmStoreUserProfilePicture" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row col-md-12">
            <img class="img overflow-auto rounded mx-auto d-block" src="{{ Storage::url($user->profile_pic); }}"/>
            <span class="error_input profile_picture_error text-danger">Note: By uploading new image , old profile picture will be replaced by new selected profile picture</span>
        </div>
        <div class="row col-md-12">
            <a class="btn btn-danger btn-sm" id="btnDelete" href="{{route('user.profile.picture.destroy', $user->id)}}">Remove Image</a>
        </div>
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
