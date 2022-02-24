<form method="post" action="{{ route('user.whatsapp.update', $user_whatsapp->id) }}" id="frmStoreUserCall" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Edit Whatsapp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="user-whatsapp" class="col-form-label">Enter Your Whatsapp Number:</label>
            <input type="tel" class="form-control" name="whatsapp" id="user-whatsapp" value="{{$user_whatsapp->whatsapp}}">
            <span class="error_input whatsapp_error text-danger"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
