<form method="post" action="{{ route('user.exhibition.update', $user_exhibition->id) }}" id="frmUpdateUserGallery" class="frmStore">
    @csrf
    <input type="hidden" name="type" value="{{$user_exhibition->type}}">
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Update {{ $user_exhibition->type }} exhibition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exhibition_name" class="col-form-label">Exhibition Name:</label>
                    <input type="text" class="form-control" name="exhibition_name" value="{{$user_exhibition->exhibition_name}}" id="exhibition_name" required>
                    <span class="error_input exhibition_name_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gallery_name" class="col-form-label">Gallery Name:</label>
                    <input type="text" class="form-control" name="gallery_name" value="{{$user_exhibition->gallery_name}}" id="gallery_name" required>
                    <span class="error_input gallery_name_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date" class="col-form-label">Start Date:</label>
                    <input type="date" class="form-control" name="start_date" value="{{$user_exhibition->start_date}}" id="start_date" required>
                    <span class="error_input start_date_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date" class="col-form-label">End Date:</label>
                    <input type="date" class="form-control" name="end_date" value="{{$user_exhibition->end_date}}" id="end_date" required>
                    <span class="error_input end_date_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="organization" class="col-form-label">Address:</label>
                    <textarea name="address" class="form-control" id="address" rows="3">{{$user_exhibition->address}}</textarea>
                    <span class="error_input address_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="website" class="col-form-label">https://www.</label>
                    <input type="text" class="form-control" name="website" value="{{$user_exhibition->website}}" id="website" placeholder="yourwebsite.com">
                    <span class="error_input website_error text-danger"></span>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="type" class="col-form-label">Exhibition Type:</label>
                    <select type="text" class="form-control" name="type" id="type">
                        <option value="upcoming" {{$user_exhibition->type == 'upcomming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="past" {{$user_exhibition->type == 'past' ? 'selected' : '' }}>Past</option>
                        <option value="current" {{$user_exhibition->type == 'current' ? 'selected' : '' }}>Current</option>
                    </select>
                    <span class="error_input website_error text-danger"></span>
                </div>
            </div>                   
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
