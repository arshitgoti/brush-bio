<form method="post" action="{{ route('user.vcard.update', $user->id) }}" id="frmStoreUserVcard" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Update about me</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <row><h5 class="my-information-div">My Information</h5></row>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first-name" class="col-form-label">First Name:</label>
                    <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" id="first-name" readonly>
                    <span class="error_input first_name_error text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last-name" class="col-form-label">Last Name:</label>
                    <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" id="last-name" readonly>
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
                    <label for="type_of_artist" class="col-form-label">Artist Type:</label>
                    <select class="form-control select2" id="type_of_artist" name="type_of_artist">
                        @foreach(config('app.artist_types') as $artist_type)
                        <option {{$user->type_of_artist == $artist_type ? 'selected' : ''}} value="{{$artist_type}}">{{$artist_type}}</option>
                        @endforeach
                    </select>
                    <span class="error_input type_of_artist_error text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <!--<div class="col-md-6">
                <div class="form-group">
                    <label for="first-name" class="col-form-label">Embed VIDEO Link:</label>
                    <textarea type="url" class="form-control" name="embend_link" id="first-name" >{{$user->embend_link}}</textarea>
                    <span class="error_input first_name_error text-danger"></span>
                </div>
            </div>-->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="last-name" class="col-form-label">Upload CV:</label>
                    <input type="file" class="form-control" name="cv" id="last-name" accept="application/pdf">
                    @if($user->cv)
                    <div class="btn-toolbar m-1 cvdiv">
                        <a class="btn btn-outline-success mx-1" href="{{asset('user_cvs/'.$user->cv)}}" >Download CV</a>
                    <button class="btn btn-danger" type="button" id="deletecv"><i class="fa fa-trash"></i></button>
                    </div>
                    @endif
                    <span class="error_input cv_error text-danger"></span>
                </div>
            </div>
        </div>

        <row><h5 class="contact-information-div">Contact Card Details</h5></row>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_contact"  {{$user->is_contact=='show' ? '' :'checked'}}>
                               <span>
                                Allow potential clients to contact you directly from your profile page using a contact card (vCard).
                            </span>
                      </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-inline">
                        <label for="email" class="col-form-label">Email:</label>
                    </div>
                    <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email">
                    <span class="error_input email_error text-danger"></span>

                    <div class="form-check user-concent-features">
                        <input class="form-check-input" type="checkbox" name="is_email"  {{$user->is_email=='show' ? '' :'checked'}}>
                        <span>
                            (I prefer to keep my email private)
                        </span>
                </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-inline">
                        <label for="phone_number" class="col-form-label">Phone</label>
                    </div>

                <input type="text" class="form-control" value="{{$user->phone_number}}" name="phone_number" id="phone_number">
                <input type="hidden" name="phone_code" id="phone_code" value="{{$user->phone_number}}">
                <span class="error_input email_error text-danger"></span>

                <div class="form-check user-concent-features">
                    <input class="form-check-input" type="checkbox" name="is_phone"  {{$user->is_phone=='show' ? '' :'checked'}}>
                    <span>
                        (The contact card is great, but I prefer to keep my phone number private)
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="website" class="col-form-label">Your profile</label>
                <input type="text" class="form-control" value="{{$user->website}}" id="website" name="website" placeholder="yourwebsite.com">
                <span class="error_input website_error text-danger"></span>
            </div>
        </div>

    </div>
    <div class="row justify-content-start">
        <!--<div class="col-md-6">
            <div class="form-group">
               <label for="website" class="col-form-label">Portfolio</label>
                <input type="text" class="form-control" value="" name="website" id="website" placeholder="yourwebsite.com">
                <span class="error_input website_error text-danger"></span>
            </div>
        </div>-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="dob" class="col-form-label">Date of Birth:</label>
                <input type="date" class="form-control" value="{{$user->dob}}" name="dob" id="dob">
                <span class="error_input dob_error text-danger"></span>
            </div>
        </div>
<!--         <div class="col-md-6">
            <div class="form-group">
                <label for="profile_pic" class="col-form-label">Profile Picture:</label>
                <input type="file" name="profile_pic" id="profile_pic">
                <span class="error_input profile_pic_error text-danger"></span>
                @if ($user->profile_pic != "")
                <p class="backend-profile-pic"><img src="{{asset('user_profile_pics/'.$user->profile_pic); }}" width="50" ><a href="{{asset('user_profile_pics/'.$user->profile_pic); }}" target="_blank">View current profile picture</a></p>
                @endif
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5>Address</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="addr_work_street" class="col-form-label">Street:</label>
                <input type="text" class="form-control" value="{{$address_work[2] ?? ''}}" name="addr_work_street" id="addr_work_street">
                <span class="error_input addr_work_street_error text-danger"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="addr_work_postal_code" class="col-form-label">Postal Code:</label>
                <input type="text" class="form-control" value="{{$address_work[5] ?? ''}}" name="addr_work_postal_code" id="addr_work_postal_code">
                <span class="error_input addr_work_postal_code_error text-danger"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="addr_work_city" class="col-form-label">City:</label>
                <input type="text" class="form-control" value="{{$address_work[3] ?? ''}}" name="addr_work_city" id="addr_work_city">
                <span class="error_input addr_work_city_error text-danger"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="addr_work_state" class="col-form-label">State:</label>
                <input type="text" class="form-control" value="{{$address_work[4] ?? ''}}" name="addr_work_state" id="addr_work_state">
                <span class="error_input addr_work__error text-danger"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="addr_work_country" class="col-form-label">Country:</label>
                <select class="form-control select2" name="addr_work_country" id="addr_work_country">
                    <option value="">Select Country</option>
                    @foreach(config('app.countries') as $country)
                    <option {{($address_work[6] ?? '') == $country ? 'selected' : ''}} value="{{$country}}">{{$country}}</option>
                    @endforeach
                </select>
                <span class="error_input addr_work_country_error text-danger"></span>
            </div>
        </div>
        <div class="col-md-4">
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
        const phoneInputField = document.querySelector("#phone_number");
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
@push('scripts')
<script>
    $('.select2').select2();
    $('#type_of_artist').on('change', function() {
          alert( this.value );
        });
    function selectchange()
    {
        alert('hi');
        $("#type_of_artist").change();
    }
</script>
@endpush
