<form method="post" action="{{ route('user.cv.store') }}" id="frmStoreUserBio" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add CV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label for="cv" class="col-form-label">Select CV (Pdf):</label>
        <div class="form-group">
            <input type="file" name="cv" id="cv" class="" accept="application/pdf">
            <span class="error_input cv_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
