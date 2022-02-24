<form method="post" action="{{ route('user.bio.update', $user_bio->id) }}" id="frmStoreUserBio" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Update Artist Bio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="bio_content" class="col-form-label">Bio Content:</label>
            <textarea name="bio_content" id="bio_content" class="form-control" rows="5" placeholder="Tell us more about yourself…">{{$user_bio->bio_content}}</textarea>
            <span class="error_input bio_content_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
