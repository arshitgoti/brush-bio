<form method="post" action="{{ route('user.vcard.store') }}" id="frmStoreUserVcard" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add about me</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first-name" class="col-form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first-name" value="{{$user->first_name}}" readonly>
                    <span class="error_input first_name_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last-name" class="col-form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last-name" readonly>
                    <span class="error_input last_name_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last-name" class="col-form-label">Artist Bio:</label>
                    <textarea class="form-control" name="bio_content" id="last-name">{{$user->user_bio->bio_content}}</textarea>
                        <span class="error_input last_name_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first-name" class="col-form-label">Artist Type:</label>
                    <input type="text" class="form-control" name="type_of_artist" id="first-name" >
                    <span class="error_input first_name_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <!--<div class="col-md-6">
                <div class="form-group">
                    <label for="first-name" class="col-form-label">Embed VIDEO Link:</label>
                    <input type="url" class="form-control" name="video_link" id="first-name" >
                    <span class="error_input first_name_error text-danger"></span>
                </div>
            </div>-->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="last-name" class="col-form-label">Upload CV:</label>
                    <input type="file" class="form-control" name="cv" id="last-name">
                    <span class="error_input last_name_error text-danger"></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="organization" class="col-form-label">Organization:</label>
                    <input type="text" class="form-control" name="organization" id="organization">
                    <span class="error_input organization_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <span class="error_input title_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="note" class="col-form-label">Note:</label>
                    <input type="text" class="form-control" name="note" id="note">
                    <span class="error_input note_error text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telephone_home" class="col-form-label">Telephone (Home):</label>
                    <input type="tel" class="form-control" name="telephone_home" id="telephone_home">
                    <span class="error_input telephone_home_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telephone_work" class="col-form-label">Telephone (Work):</label>
                    <input type="tel" class="form-control" name="telephone_work" id="telephone_work">
                    <span class="error_input telephone_work_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telephone_mobile" class="col-form-label">Telephone (Mobile):</label>
                    <input type="tel" class="form-control" name="telephone_mobile" id="telephone_mobile">
                    <span class="error_input telephone_mobile_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="other_url" class="col-form-label">URL:</label>
                    <input type="text" class="form-control" name="other_url" id="other_url">
                    <span class="error_input other_url_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email_work" class="col-form-label">Email (Work):</label>
                    <input type="email" class="form-control" name="email_work" id="email_work">
                    <span class="error_input email_work_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email_home" class="col-form-label">Email (Home):</label>
                    <input type="email" class="form-control" name="email_home" id="email_home">
                    <span class="error_input email_home_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dob" class="col-form-label">Date of Birth:</label>
                    <input type="date" class="form-control" name="dob" id="dob">
                    <span class="error_input dob_error text-danger"></span>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="photo" class="col-form-label">Profile Picture:</label>
                    <input type="file" name="photo" id="photo">
                    <span class="error_input photo_error text-danger"></span>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Address (Home)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_home_street" class="col-form-label">Street:</label>
                    <input type="text" class="form-control" name="addr_home_street" id="addr_home_street">
                    <span class="error_input addr_home_street_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_home_city" class="col-form-label">City:</label>
                    <input type="text" class="form-control" name="addr_home_city" id="addr_home_city">
                    <span class="error_input addr_home_city_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_home_state" class="col-form-label">State:</label>
                    <input type="text" class="form-control" name="addr_home_state" id="addr_home_state">
                    <span class="error_input addr_home__error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_home_postal_code" class="col-form-label">Postal Code:</label>
                    <input type="text" class="form-control" name="addr_home_postal_code" id="addr_home_postal_code">
                    <span class="error_input addr_home_postal_code_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_home_country" class="col-form-label">Country:</label>
                    <input type="text" class="form-control" name="addr_home_country" id="addr_home_country">
                    <span class="error_input addr_home_country_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Address (Work)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_work_street" class="col-form-label">Street:</label>
                    <input type="text" class="form-control" name="addr_work_street" id="addr_work_street">
                    <span class="error_input addr_work_street_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_work_city" class="col-form-label">City:</label>
                    <input type="text" class="form-control" name="addr_work_city" id="addr_work_city">
                    <span class="error_input addr_work_city_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_work_state" class="col-form-label">State:</label>
                    <input type="text" class="form-control" name="addr_work_state" id="addr_work_state">
                    <span class="error_input addr_work__error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_work_postal_code" class="col-form-label">Postal Code:</label>
                    <input type="text" class="form-control" name="addr_work_postal_code" id="addr_work_postal_code">
                    <span class="error_input addr_work_postal_code_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="addr_work_country" class="col-form-label">Country:</label>
                    <input type="text" class="form-control" name="addr_work_country" id="addr_work_country">
                    <span class="error_input addr_work_country_error text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
