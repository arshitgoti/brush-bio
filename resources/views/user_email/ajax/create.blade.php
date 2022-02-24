<form method="post" action="{{ route('user.email.store') }}" id="frmStoreUserEmail" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add E-Mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="user-email" class="col-form-label">Enter Your Email:</label>
            <input type="email" class="form-control" name="email" id="user-email">
            <span class="error_input email_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
