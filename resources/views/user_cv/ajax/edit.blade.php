<form method="post" action="{{ route('user.cv.update') }}" id="frmStoreUserBio" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add CV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label for="cv" class="col-form-label">CV (Pdf):</label>
        <div class="form-group">
            <input type="file" name="cv" id="cv" class="" accept="application/pdf">
            <span class="error_input cv_error text-danger"></span>
        </div>
        <div class="form-group ml-2">
        	 @if ($user->cv)
                <a href="{{ asset('/user_cvs/'.Auth::user()->cv) }}" target="_blank" rel="noopener noreferrer">View CV</a>
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
