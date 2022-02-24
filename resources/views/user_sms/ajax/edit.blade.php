<form method="post" action="{{ route('user.sms.update', $user_sms) }}" id="frmStoreUserSms" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add SMS Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="user-sms" class="col-form-label">Enter Your SMS Number:</label>
            <input type="tel" class="form-control" name="sms" id="user-sms" value="{{$user_sms->sms}}">
            <span class="error_input sms_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
