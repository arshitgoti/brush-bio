<form method="post" action="{{ route('user.gallery.store') }}" id="frmStoreUserBio" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                    <span class="error_input name_error text-danger"></span>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="link" class="col-form-label">Link:</label>
                    <input type="text" class="form-control" name="link" id="link">
                    <span class="error_input link_error text-danger"></span>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="organization" class="col-form-label">Address:</label>
                    <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                    <span class="error_input address_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="postal_code" class="col-form-label">Postal Code:</label>
                    <input type="text" class="form-control" name="postal_code" id="postal_code" required>
                    <span class="error_input postal_code_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city" class="col-form-label">City:</label>
                    <input type="text" class="form-control" name="city" id="city" required>
                    <span class="error_input city_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="country" class="col-form-label">Country:</label>
                      <select class="form-control select2"  name="country" id="country" required >
                    <option value="">Select Country</option>
                    @foreach(config('app.countries') as $country)
                    <option {{($address_work[6] ?? '') == $country ? 'selected' : ''}} value="{{$country}}">{{$country}}</option>
                    @endforeach
                </select>
                    <span class="error_input country_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <span class="error_input email_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone" class="col-form-label">Phone:</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                    <input type="hidden" name="phone_code" id="phone_code" value="">
                    <span class="error_input phone_error text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="website" class="col-form-label">http://www.</label>
                    <input type="text" class="form-control" name="website" id="website" placeholder="yourwebsite.com">
                    <span class="error_input website_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instagram" class="col-form-label">https://www.instagram.com/</label>
                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="enter username only">
                    <span class="error_input instagram_error text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
<script>
    if (typeof phoneInputField === 'undefined') {
        const phoneInputField = document.querySelector("#phone");
        const phoneCode = document.querySelector("#phone_code");
        const phoneInput = window.intlTelInput(phoneInputField, {
        separateDialCode: true,
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const info = document.querySelector(".alert-info");
        phoneInputField.addEventListener('keyup', function(){
            const phoneNumber = phoneInput.getNumber();
            phoneCode.value = phoneNumber;
        });
    }
</script>
