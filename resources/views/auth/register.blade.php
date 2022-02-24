<!DOCTYPE html>
<html>
	<head>
		<title>Step</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="shortcut icon" href="images/favicon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/front_style.css') }}">
		<script src="{{asset('js/jquery.min.js')}}"></script>
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
      />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
	</head>
	<body>
		<div class="wrapper">
           {{--  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="step-panel">
                    <div class="container">
                        <div class="step-top">
                            <a href="#" class="step-logo"><img src="images/step-logo.png" alt="Artist"></a>
                        </div>
                        <div class="step-slide-panel step_1">
                            <h2>Join the ranks of the hottest artists on the planet.<br><br>Get your custom link today:</h2>

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>

                        <div class="step-slide-panel step_2">

                            <label for="first_name">What is your first name ? *</label>
                            <input type="text" name="first_name" id="first_name"  @error('first_name') class="hasError" @enderror value="{{old('first_name')}}">
                            <br>
                            <label for="last_name">What is your last name? *</label>
                            <input type="text" name="last_name" id="last_name"  @error('last_name') class="hasError" @enderror value="{{old('last_name')}}">

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <!-- <div class="step-slide-panel step_2">

                            <label for="last_name">What is your last name? *</label>
                            <input type="text" name="last_name" id="last_name"  @error('last_name') class="hasError" @enderror value="{{old('last_name')}}">

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div> -->
                        <div class="step-slide-panel step_3">
                            <label for="email">What is your email address ? *</label>
                            <input type="email" name="email" id="email"  @error('email') class="hasError" @enderror value="{{old('email')}}">
                            @error('email')
                                <p class="text-error">{{$errors->first('email')}}</p>
                            @enderror
                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <div class="step-slide-panel step_4">
                            <label for="profile_pic">Profile Picture</label>
                            <input type="file" name="profile_pic" id="profile_pic">

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <div class="step-slide-panel step_5">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" name="dob" id="dob" @error('dob') class="hasError" @enderror value="{{ old('dob') ?? '1975-01-01'}}">

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <div class="step-slide-panel step_6">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" @error('phone_number') class="hasError" @enderror value="{{old('phone_code')}}">
                            <input type="hidden" name="phone_code" id="phone_code" value="{{old('phone_number')}}">
                            @error('phone_code')
                                <p class="text-error">{{$errors->first('phone_code')}}</p>
                            @enderror
                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <div class="step-slide-panel step_7">
                            <label for="bio_content"><span class="registration-bio-label">Bio</span><br><span class="registration-bio-label-desc">keep it short for now, <br>you can change this later</label>
                            <textarea name="bio_content" id="bio_content" @error('bio_content') class="hasError" @enderror rows="5" cols="40">{{old('bio_content')}}</textarea>
                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <!--<div class="step-slide-panel step_8">
                            <label for="website">Lets add your first link.<br>We suggest you start with your website: https://www.</label>
                            <input type="text" name="website" id="website" @error('website') class="hasError" @enderror value="{{old('website')}}" placeholder="yourwebsite.com">

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>-->


                        <div class="step-slide-panel step_8">
                            <label for="website"><span class="registration-website-label">Lets add your first link</span><br><span class="registration-website-label-desc">We suggest you start with your website</span></label>                                                          
                            <div class="custom-input-container">
                                <span class="fixed-label">https://www.</span>
                                <input type="text" name="website" id="website" @error('website') class="hasError" @enderror value="{{old('website')}}" placeholder="yourwebsite.com">
                            </div>                           
                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>


                        <!--<div class="step-slide-panel step_9">
                            <label for="instagram">https://www.instagram.com/</label>
                            <input type="text" name="instagram" id="instagram" @error('instagram') class="hasError" @enderror value="{{old('instagram')}}" placeholder="enter username only">

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>-->

                        <div class="step-slide-panel step_9">
                            <label for="instagram">Instagram Link</label>
                            <div class="custom-input-container">
                                <span class="fixed-label">https://www.instagram.com/</span>
                                    <input type="text" name="instagram" id="instagram" @error('instagram') class="hasError" @enderror value="{{old('instagram')}}" placeholder="enter username only">
                            </div>
                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>

                        <div class="step-slide-panel step_10">
                            <label for="type_of_artist">Artist Type</label>
                            <select class="" name="type_of_artist">
                                @foreach(config('app.artist_types') as $artist_type)
                                    <option value="{{$artist_type}}">{{$artist_type}}</option>
                                @endforeach
                            </select>

                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <span class="step-arr right-arr nextStep"></span>
                            </div>
                        </div>
                        <div class="step-slide-panel step_11">

                            <label for="password">Password *</label>
                            <input type="password" name="password" id="password" @error('password') class="hasError" @enderror required>
                            <i class="bi bi-eye-slash" id="togglePassword"></i>

                            <label for="confirm_password" style="margin-top: 10px;">Confirm Password *</label>
                            <input type="password" name="confirm_password" id="confirm-password" required>
                            <i class="bi bi-eye-slash" id="togglePassword2"></i>                               
                            <div class="step-arrows">
                                <span class="step-arr left-arr prevStep"></span>
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="alert alert-info" style="display: none;"></div>

		</div>

        <script>
            $(document).ready(function(e){
                var currentStep = 1;
                var totalStep = 11;
                var prevStep = 1;

                @if($errors->has('email'))
                    currentStep = 3;
                    prevStep=3;
                @endif

                $('.step-slide-panel').hide();
                $('.step_'+currentStep).show();
                //work on enter btn
               $(document).on("keypress", "input", function(e){
                    if (currentStep != totalStep && e.which == 13) {

                        if (currentStep == 2) {
                            if ($('input[name=first_name]').val() == "") {
                                $('input[name=first_name]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=first_name]').removeClass('hasError');
                            }

                            if ($('input[name=last_name]').val() == "") {
                                $('input[name=last_name]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=last_name]').removeClass('hasError');
                            }
                        }

                        /*if (currentStep == 2) {
                            if ($('input[name=last_name]').val() == "") {
                                $('input[name=last_name]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=last_name]').removeClass('hasError');
                            }
                        }*/

                        if (currentStep == 3) {
                            if ($('input[name=email]').val() == "") {
                                $('input[name=email]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=email]').removeClass('hasError');
                            }
                        }

                        // if (currentStep == 6) {
                        //     if ($('input[name=phone_number]').val() == "") {
                        //         $('input[name=phone_number]').addClass('hasError');
                        //         return ;
                        //     }else{
                        //         $('input[name=phone_number]').removeClass('hasError');
                        //     }
                        // }

                        console.log('next clicked');
                        currentStep = currentStep+1;
                        $('.step_' + prevStep).hide();
                        $('.step_' + currentStep).show();
                        prevStep = currentStep;
                    }
                });
          //work on enter btn
                $('.nextStep').on('click', function(){

                    if (currentStep != totalStep) {

                        if (currentStep == 2) {
                            if ($('input[name=first_name]').val() == "") {
                                $('input[name=first_name]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=first_name]').removeClass('hasError');
                            }

                            if ($('input[name=last_name]').val() == "") {
                                $('input[name=last_name]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=last_name]').removeClass('hasError');
                            }
                        }

                        /*if (currentStep == 2) {
                            if ($('input[name=last_name]').val() == "") {
                                $('input[name=last_name]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=last_name]').removeClass('hasError');
                            }
                        }*/

                        if (currentStep == 3) {
                            if ($('input[name=email]').val() == "") {
                                $('input[name=email]').addClass('hasError');
                                return ;
                            }else{
                                $('input[name=email]').removeClass('hasError');
                            }
                        }

                        // if (currentStep == 6) {
                        //     if ($('input[name=phone_number]').val() == "") {
                        //         $('input[name=phone_number]').addClass('hasError');
                        //         return ;
                        //     }else{
                        //         $('input[name=phone_number]').removeClass('hasError');
                        //     }
                        // }

                        console.log('next clicked');
                        currentStep = currentStep+1;
                        $('.step_' + prevStep).hide();
                        $('.step_' + currentStep).show();
                        prevStep = currentStep;
                    }
                });

                $('.prevStep').on('click', function(){
                    if (prevStep > 1) {
                        console.log('prev clicked');
                        currentStep = currentStep-1;
                        $('.step_' + prevStep).hide();
                        $('.step_' + currentStep).show();
                        prevStep = currentStep;
                    }
                });
            });

            /*Password start*/
            const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#password');
                togglePassword.addEventListener('click', function (e) {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('bi-eye');
            });
            /*Password end*/

                /*Confirm password start*/
                const togglePassword2 = document.querySelector('#togglePassword2');
                const password2 = document.querySelector('#confirm-password');
                togglePassword2.addEventListener('click', function (e) {
                const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                password2.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                });
        </script>
         <script>
            const phoneInputField = document.querySelector("#phone_number");
            const phoneCode = document.querySelector("#phone_code");
            const phoneInput = window.intlTelInput(phoneInputField, {
              utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });
            const info = document.querySelector(".alert-info");
            phoneInputField.addEventListener('keyup', function(){
                const phoneNumber = phoneInput.getNumber();
                phoneCode.value = phoneNumber;
            });
          </script>

	</body>
</html>
