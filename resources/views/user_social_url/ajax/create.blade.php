<form method="post" action="{{ route('user.social.url.store') }}" id="frmStoreUserSocialUrls" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Add Social Media links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="social-main-modal">
{{--        <p class="text text-info"><strong>NOTE:</strong> The first 4 socials will be highlighted on top of your profile. You can rearrange the order by moving them around.</p>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">https://www.facebook.com/</span>
                    </div>
                    <input type="text" class="form-control" name="facebook" aria-label="user_facebook_url" aria-describedby="user_facebook_url" placeholder="enter username only">
                    <span class="error_input facebook_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="facebook_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="facebook_is_featured" id="facebook_is_featured" value="1" checked placeholder="enter username only">
                </div>
            </div>           
        </div>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="user_twitter_url">https://twitter.com/</span>
                    </div>
                    <input type="text" class="form-control" name="twitter" aria-label="user_twitter_url" aria-describedby="user_twitter_url" placeholder="enter username only">
                    <span class="error_input twitter_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="twitter_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="twitter_is_featured" id="twitter_is_featured" value="1" checked placeholder="enter username only">
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_linkedin_url">https://www.linkedin.com/in/</span>
                    </div>
                    <input type="text" class="form-control" name="linkedin" aria-label="user_linkedin_url" aria-describedby="user_linkedin_url" placeholder="enter username only">
                    <span class="error_input linkedin_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="linkedin_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="linkedin_is_featured" id="linkedin_is_featured" value="1" placeholder="enter username only">
                </div>
            </div>            
        </div>


       <div class="row">
            <div class="form-group col-12">
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_instagram_url">https://www.instagram.com/</span>
                    </div>
                    <input type="text" class="form-control" name="instagram" aria-label="user_instagram_url" aria-describedby="user_instagram_url" placeholder="enter username only" {{Auth::user()->user_social_urls->exists() ? Auth::user()->user_social_urls->instagram : ''}}>
                    <span class="error_input instagram_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="instagram_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="instagram_is_featured" id="instagram_is_featured" value="1" checked placeholder="enter username only">
                </div>
            </div>            
        </div>

        <!-- <div class="row">
            <div class="form-group col-12">
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_snapchat_url">Snapchat</span>
                    </div>
                    <input type="text" class="form-control" name="snapchat" aria-label="user_snapchat_url" aria-describedby="user_snapchat_url">
                    <span class="error_input snapchat_error text-danger"></span>
                </div>
            </div>
            <div class="form-inline form-group">
                <label for="snapchat_is_featured" class="mr-2">Featured : </label>
                <input type="checkbox" class="featured_url" name="snapchat_is_featured" id="snapchat_is_featured" value="1"/>
            </div>
        </div> -->

        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_youtube_url">https://www.youtube.com/channel/</span>
                    </div>
                    <input type="text" class="form-control" name="youtube" aria-label="user_youtube_url" aria-describedby="user_youtube_url" placeholder="enter username only">
                    <span class="error_input youtube_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="youtube_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="youtube_is_featured" id="youtube_is_featured" value="1" placeholder="enter username only">
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url">https://www.behance.net/</span>
                    </div>
                    <input type="text" class="form-control" name="behance" aria-label="user_behance_url" aria-describedby="user_behance_url" placeholder="enter username only">
                    <span class="error_input behance_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="behance_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="behance_is_featured" id="behance_is_featured" value="1" placeholder="enter username only">
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_whatsapp_url">WhatsApp</span>
                    </div>
                    <input type="text" class="form-control" name="whatsapp" aria-label="user_whatsapp_url" aria-describedby="user_whatsapp_url" placeholder="enter whatsapp number only" id="whatsapp_number" style="padding-left:65px!important;">
                    <input type="hidden" name="whatsapp_number_code" id="whatsapp_number_code" >
                    <span class="error_input whatsapp_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="whatsapp_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="whatsapp_is_featured" id="whatsapp_is_featured" value="1" checked placeholder="enter whatsapp number only">
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_skype_url">Skype</span>
                    </div>
                    <input type="text" class="form-control" name="skype" aria-label="user_skype_url" aria-describedby="user_skype_url" placeholder="enter skype username only">
                    <span class="error_input skype_error text-danger"></span>
                </div>
                <div class="form-inline form-group">
                    <label for="skype_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="skype_is_featured" id="skype_is_featured" value="1" placeholder="enter skype number only">
                </div>
            </div>            
        </div> --}}
        <ul id="sortable" style="list-style-type:none;">
        <p class="text text-info"><strong>NOTE:</strong> The first 4 socials will be highlighted on top of your profile. You can rearrange the order by moving them around.</p>
        <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-align-justify my-handle "></i></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="fb_l">
                    <input type="text"  class="form-control" name="facebook" aria-label="user_facebook_url" aria-describedby="user_facebook_url" placeholder="enter username only">
                    <span class="error_input facebook_error text-danger"></span>
                </div>            
                {{-- <div class="form-inline form-group">
                    <label for="facebook_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->facebook_is_featured ? 'checked': ''}} name="facebook_is_featured" id="facebook_is_featured" value="1" />
                </div> --}}
            </div>
        </div>
        </li>
        
         <li >
       <div class="row">
            <div class="form-group col-12">
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_instagram_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_instagram_url"><i class="fab fa-instagram"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="in_l">
                    <input type="text"  class="form-control" name="instagram" aria-label="user_instagram_url" aria-describedby="user_instagram_url" placeholder="enter username only">
                    <span class="error_input instagram_error text-danger"></span>
                </div>
               {{-- <div class="form-inline form-group">
                    <label for="instagram_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" name="instagram_is_featured" id="instagram_is_featured" value="1" placeholder="enter username only" {{$user_social_url->instagram_is_featured ? 'checked': ''}}/>
                </div> --}}
            </div>            
        </div>

         {{-- <div class="row">
            <div class="form-group col-12">
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_snapchat_url">Snapchat</span>
                    </div>
                    <input type="text" value="{{$user_social_url->snapchat}}" class="form-control" name="snapchat" aria-label="user_snapchat_url" aria-describedby="user_snapchat_url">
                    <span class="error_input snapchat_error text-danger"></span>
                </div>
            </div>
            <div class="form-inline form-group col-2 col-2">
                <label for="snapchat_is_featured" class="mr-2">Featured : </label>
                <input type="checkbox" class="featured_url"  {{$user_social_url->snapchat_is_featured ? 'checked': ''}} name="snapchat_is_featured" id="snapchat_is_featured" value="1"/>
            </div>
        </div> --}}
    </li>
    
        <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_whatsapp_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_whatsapp_url"><i class="fab fa-whatsapp"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="wt_l">
                    <input type="text"  class="form-control" name="whatsapp" aria-label="user_whatsapp_url" aria-describedby="user_whatsapp_url" placeholder="enter whatsapp number only" id="whatsapp_number">
                    <input type="hidden" name="whatsapp_number_code" id="whatsapp_number_code">
                    <span class="error_input whatsapp_error text-danger"></span>
                </div>
                {{-- <div class="form-inline form-group">
                    <label for="whatsapp_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter whatsapp number only" {{$user_social_url->whatsapp_is_featured ? 'checked': ''}} name="whatsapp_is_featured" id="whatsapp_is_featured" value="1"/>
                </div> --}}
            </div>            
        </div>
        </li>
        
        <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_youtube_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_youtube_url"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="yu_l">
                    <input type="text"  class="form-control" name="youtube" aria-label="user_youtube_url" aria-describedby="user_youtube_url" placeholder="enter username only">
                    <span class="error_input youtube_error text-danger"></span>
                </div>
                {{-- <div class="form-inline form-group">
                    <label for="youtube_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->youtube_is_featured ? 'checked': ''}} name="youtube_is_featured" id="youtube_is_featured" value="1"/>
                </div> --}}
            </div>            
        </div>
    </li>
    
        <li > 
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="user_twitter_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="user_twitter_url"><i class="fab fa-twitter"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="tw_l">
                    <input type="text"  class="form-control" name="twitter" aria-label="user_twitter_url" aria-describedby="user_twitter_url" placeholder="enter username only">
                    <span class="error_input twitter_error text-danger"></span>
                </div>            
                {{--<div class="form-inline form-group">
                    <label for="twitter_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->twitter_is_featured ? 'checked': ''}} name="twitter_is_featured" id="twitter_is_featured" value="1"/>
                </div>--}}
            </div>
        </div>
        </li>
        <li >
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_linkedin_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="user_linkedin_url"><i class="fab fa-linkedin"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="ln_l">
                    <input type="text" class="form-control" name="linkedin" aria-label="user_linkedin_url" aria-describedby="user_linkedin_url" placeholder="enter username only">
                    <span class="error_input linkedin_error text-danger"></span>
                </div>
                {{--<div class="form-inline form-group">
                    <label for="linkedin_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->linkedin_is_featured ? 'checked': ''}} name="linkedin_is_featured" id="linkedin_is_featured" value="1"/>
                </div>--}}
            </div>            
        </div>
     </li>
      
    
    
    
        
        <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_skype_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_skype_url"><i class="fab fa-skype"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="skp_l">
                    <input type="text"  class="form-control" name="skype" aria-label="user_skype_url" aria-describedby="user_skype_url" placeholder="enter skype username only">
                    <span class="error_input skype_error text-danger"></span>
                </div>
               {{-- <div class="form-inline form-group">
                    <label for="skype_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter skype number only" {{$user_social_url->skype_is_featured ? 'checked': ''}} name="skype_is_featured" id="skype_is_featured" value="1"/>
                </div> --}}
            </div>            
        </div>
        </li>
        
        <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url"><i class="fab fa-behance"></i></span>
                    </div>
                    <input type="hidden" id="liposition" name="be_l">
                    <input type="text"  class="form-control" name="behance" aria-label="user_behance_url" aria-describedby="user_behance_url" placeholder="enter username only">
                    <span class="error_input behance_error text-danger"></span>
                </div>
                {{-- <div class="form-inline form-group">
                    <label for="behance_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->behance_is_featured ? 'checked': ''}} name="behance_is_featured" id="behance_is_featured" value="1"/>
                </div> --}}
            </div>            
        </div>
    </li>
     <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url"><img src="https://storage.googleapis.com/opensea-static/Logomark/Logomark-Blue.png" width="25"></span>
                    </div>
                    <input type="hidden" id="liposition" name="open_l">
                    <input type="text"  class="form-control" name="open" aria-label="user_behance_url" aria-describedby="user_behance_url" placeholder="enter username only">
                    <span class="error_input behance_error text-danger"></span>
                </div>
                {{-- <div class="form-inline form-group">
                    <label for="behance_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->behance_is_featured ? 'checked': ''}} name="behance_is_featured" id="behance_is_featured" value="1"/>
                </div> --}}
            </div>            
        </div>
    </li>
         <li>
        <div class="row">
            <div class="form-group col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url"><i class="fas fa-align-justify my-handle"></i></span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="user_behance_url"><img src="https://docs.knownorigin.io/press-kit/Grey-blue-ko-icn.png" width="25"></span>
                    </div>
                    <input type="hidden" id="liposition" name="known_l">
                    <input type="text"  class="form-control" name="known" aria-label="user_behance_url" aria-describedby="user_behance_url" placeholder="enter username only">
                    <span class="error_input behance_error text-danger"></span>
                </div>
                {{-- <div class="form-inline form-group">
                    <label for="behance_is_featured" class="mr-2">Featured : </label>
                    <input type="checkbox" class="featured_url" placeholder="enter username only" {{$user_social_url->behance_is_featured ? 'checked': ''}} name="behance_is_featured" id="behance_is_featured" value="1"/>
                </div> --}}
            </div>            
        </div>
    </li>
    
    </ul>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
<script>
    if (typeof phoneInputField === 'undefined') {
        const phoneInputField = document.querySelector("#whatsapp_number");
        const phoneCode = document.querySelector("#whatsapp_number_code");
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
<style>
    .fab{margin-bottom:0!important;width:20px;}
    .iti__selected-flag{height: 46px;margin-top: -1px;width: 80px;border:1px solid #ced4da;border-left: 0;}
</style>

