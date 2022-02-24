<form method="post" action="{{ route('user.call.update', $user_call->id) }}" id="frmStoreUserCall" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Call</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="user-call" class="col-form-label">Enter Your Call Number:</label>
            <input type="tel" class="form-control" name="call" id="user-call" value="{{$user_call->call}}">
            <span class="error_input call_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
