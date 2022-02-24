@extends('layouts.frontend')
@section('title', $user->first_name." ".$user->last_name)
<style>
.modal-open {
    overflow: scroll!important;
}
.modal-header .close {
    padding: 1rem 1.4rem!Important;
}
.modal-newsletter .modal-content{
    position: fixed;
    bottom: 0;
    /*padding: 3px 9px 0 0!important;
    width: 96%;*/
}
.modal-dialog{
    margin: 0!important;
}
.modal-backdrop{
    background:none!important;
}
.top-contact-info a:hover, .links-btns a:hover{
    background-color: rgb(51, 51, 51);
    color: rgb(255, 255, 255);
}



.modal-newsletter .modal-content {
    background: #3F3F3F;
}
.modal-newsletter h4{color:#fff;}
.modal-newsletter .close{color:#fff;}
.modal-newsletter {
    color: #999;
    width: 625px;
    max-width: 625px;
    font-size: 15px;
}
.modal-newsletter .modal-content {
    padding: 8px 30px 15px 30px;
    border-radius: 0;
    border: none;
}
.modal-newsletter .modal-header {
    border-bottom: none;
    position: relative;
    border-radius: 0;
}
.modal-newsletter h4 {
    color: #fff;
    font-size: 35px;
    margin: 0;
    font-family: 'cormorant_garamondregular';
}
.modal-newsletter .close {
    position: absolute;
    top: 11px;
    right: -7px;
    text-shadow: none;
    opacity: 0.3;
    font-size: 24px;
}
.modal-newsletter .close:hover {
    opacity: 0.8;
}
.modal-newsletter .icon-box {
    color: #7265ea;
    display: inline-block;
    z-index: 9;
    text-align: center;
    position: relative;
    margin-bottom: 10px;
}
.modal-newsletter .icon-box i {
    font-size: 110px;
}
.modal-newsletter .form-control, .modal-newsletter .btn {
    min-height: 46px;
    border-radius: 0;
}
.modal-newsletter .form-control {
    box-shadow: none;
    border-color: #dbdbdb;
}
.modal-newsletter .form-control:focus {
    border-color: #f95858;
    box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
}
.modal-newsletter .btn {
    color: #fff;
    background: #6FC8CE;
    text-decoration: none;
    transition: all 0.4s;
    line-height: normal;
    padding: 6px 20px;
    min-width: 120px;
    border: none;
    margin-top: 20px;
    border-radius: 21px;
    font-size: 18px;
}
.modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
    box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
    background: #f72222;
    outline: none;
}
/*.modal-newsletter .input-group {
    margin-top: 30px;
}*/
.hint-text {
    margin: 100px auto;
    text-align: center;
}

@media only screen and (min-width: 768px) {
    .modal-newsletter .modal-content{
        width: auto;
        margin-left: 70px;
    }
    .modal-dialog{
        margin:1.75rem auto!important;
    }
}

</style>
@section('content')

<div class="wrapper">
    <div class="top-scn">
        <div class="container">
            <div class="user-profile">

                @if ($user->profile_pic)
                    <!--<div class="userprofile-img"><img src="{{ Storage::url($user->profile_pic); }}" alt=""></div>-->

                    <div class="userprofile-img"><img src="https://www.brush.bio/user_profile_pics/{{$user->profile_pic}}" alt=""></div>
                @else
                    <div class="userprofile-img"><img src="https://www.brush.bio/user_profile_pics/default-profile-pic.png" alt=""></div>
                @endif

                <div class="roy-ockers">
                    <h1>{{$user->first_name}} {{$user->last_name}}</h1>
                    <span class="artist-txt">{{$user->type_of_artist}} <br>
                        @if($user->address_parts()[0] != "")
                        {{$user->address_parts()[6]}}
                        @endif
                        </span>
                    @if($user->dob)
                        <span class="artist-txt"><br>B {{date('Y', strtotime($user->dob))}}</span>
                    @endif
                </div>
            </div>
           @if($user->is_contact=='hide' || $user->is_phone=='show' || $user->is_email=='show')
            <div class="top-contact-info">
                 @if($user->is_contact!='show')
                <a href="{{route('user.vcard.download.guest', $user->id)}}" class="cmn-btn save-contact">Save Contact</a>
                @endif
                 @if($user->is_phone=='show' || $user->is_email=='show')
                <div class="contact-info-link">
                    @if($user->is_phone=='show')
                    <a href="tel:{{$user->phone_number}}"  class="telnumber"></a>
                    @endif
                    @if($user->is_email=='show')
                    <a href="mailto:{{$user->email}}" class="email"></a>
                    @endif
                </div>
                @endif
            </div>
            @endif

            <div class="top-socialmedia">
                @if ($socialUrls)
                 @for($i=$socialUrls->min_val;$i<=$socialUrls->max_val;$i++)
                   @if($i==4)
                   @break;
                   @endif
                   @if ($socialUrls->facebook != ''  && $socialUrls->fb_l==$i)

                        <a href="https://www.facebook.com/{{$socialUrls->facebook}}" target="_blank" class="facebook-icon"></a>
                    @endif

                    @if ($socialUrls->twitter != ''  && $socialUrls->tw_l==$i)
                        <a href="https://twitter.com/{{$socialUrls->twitter}}" target="_blank" class="twitter-link"></a>
                    @endif

                    @if ($socialUrls->linkedin != ''  && $socialUrls->ln_l==$i)
                        <a href="https://www.linkedin.com/in/{{$socialUrls->linkedin}}" target="_blank" class="linkedin-icon"></a>
                    @endif

                    @if ($socialUrls->instagram != ''  && $socialUrls->in_l==$i)
                        <a href="https://www.instagram.com/{{$socialUrls->instagram}}" target="_blank" class="instgram-link"></a>
                    @endif

                    @if ($socialUrls->youtube != ''  && $socialUrls->yu_l==$i)
                        <a href="https://www.youtube.com/channel/{{$socialUrls->youtube}}" target="_blank" class="youtube-link"></a>
                    @endif

                    @if ($socialUrls->behance != ''  && $socialUrls->be_l==$i)
                        <a href="https://www.behance.net/{{$socialUrls->behance}}" target="_blank" class="be-icon"></a>
                    @endif

                    @if ($socialUrls->whatsapp != ''  && $socialUrls->wt_l==$i)
                        <a href="https://wa.me/{{$socialUrls->whatsapp}}" target="_blank" class="whatsapp-link"></a>
                    @endif

                    @if ($socialUrls->skype != ''  && $socialUrls->skp_l==$i)
                        <a href="skype:{{$socialUrls->skype}}?chat" target="_blank" class="skype-link"></a>
                    @endif

                    @if ($socialUrls->snapchat != '' && $socialUrls->snapchat_is_featured)
                        <!-- <a href="{{$socialUrls->snapchat}}" target="_blank" class="snapchat-link"></a> -->
                    @endif
                    @endfor
                @endif
            </div>
        </div>
    </div>
    <div class="tabbing-panel">
        <div class="container">
            <div class="tabbing-list">
                <span class="tabbing-item active" data-tab="about-me">About Me</span>
                @if ($user->user_galleries()->exists() || $user->cv || $user->user_exhibitions('current')->exists() || $user->user_exhibitions('upcoming')->exists() || $user->user_exhibitions('past')->exists())
                    <span class="tabbing-item" data-tab="my-profile">My Profile</span>
                @endif
                <!--<span class="tabbing-item" data-tab="artwork">Artwork</span>-->
            </div>
        </div>
    </div>
    <div class="tabbing-cont-panel">

        <div id="about-me" class="tabbing-cont aboutme-cont tabbing-cont-show">
            <div class="container">
                @if ($user->user_bio)
                    <div class="bio-part">
                        <span class="tab-title">Bio</span>
                        <div> {!! nl2br($user->user_bio->bio_content) !!} </div>
                    </div>
                @endif




                @if ( $user->portfolio_urls()->exists() || $user->website )
                    <div class="links">
                        <span class="tab-title">Links</span>
                        <div class="links-btns">
                            <!--@if ($user->website)
                                <a target="_blank" href="https://www.{{$user->website}}" class="cmn-btn my-website-btn">Website</a>
                            @endif-->
                            @foreach ($user->portfolio_urls as $url)
                                <a target="_blank" href="https://www.{{$url->url}}" class="cmn-btn my-website-btn">{{$url->title}}</a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="about-social">
                    @if ($socialUrls)
                     @for($j=$i;$j<=$socialUrls->max_val;$j++)
                        @if ($socialUrls->facebook != '' && !$socialUrls->facebook_is_featured && $socialUrls->fb_l==$j)

                            <a href="https://www.facebook.com/{{$socialUrls->facebook}}" target="_blank" class="facebook-icon"></a>
                        @endif

                        @if ($socialUrls->twitter != '' && !$socialUrls->twitter_is_featured && $socialUrls->tw_l==$j)
                            <a href="https://twitter.com/{{$socialUrls->twitter}}" target="_blank" class="twitter-link"></a>
                        @endif

                        @if ($socialUrls->linkedin != '' && !$socialUrls->linkedin_is_featured && $socialUrls->ln_l==$j)
                            <a href="https://www.linkedin.com/in/{{$socialUrls->linkedin}}" target="_blank" class="linkedin-icon"></a>
                        @endif

                        @if ($socialUrls->instagram != '' && !$socialUrls->instagram_is_featured && $socialUrls->in_l==$j)
                            <a href="https://www.instagram.com/{{$socialUrls->instagram}}" target="_blank" class="instgram-link"></a>
                        @endif

                        @if ($socialUrls->youtube != '' && !$socialUrls->youtube_is_featured && $socialUrls->yu_l==$j)
                            <a href="https://www.youtube.com/channel/{{$socialUrls->youtube}}" target="_blank" class="youtube-link"></a>
                        @endif

                        @if ($socialUrls->behance != '' && !$socialUrls->behance_is_featured && $socialUrls->be_l==$j)
                            <a href="https://www.behance.net/{{$socialUrls->behance}}" target="_blank" class="be-icon"></a>
                        @endif

                        @if ($socialUrls->whatsapp != '' && !$socialUrls->whatsapp_is_featured && $socialUrls->wt_l==$j)
                            <a href="https://wa.me/{{$socialUrls->whatsapp}}" target="_blank" class="whatsapp-link"></a>
                        @endif

                        @if ($socialUrls->snapchat != '' && !$socialUrls->snapchat_is_featured && $socialUrls->fb_l==$j)
                            <!-- <a href="{{$socialUrls->snapchat}}" target="_blank" class="snapchat-link"></a> -->
                        @endif

                        @if ($socialUrls->skype != '' && !$socialUrls->skype_is_featured && $socialUrls->skp_l==$j)
                            <a href="skype:{{$socialUrls->skype}}?chat" target="_blank" class="skype-link"></a>
                        @endif
                       @endfor
                    @endif

                </div>
            </div>
        </div>
        <div id="my-profile" class="tabbing-cont myprofile-cont">
            <div class="container">
                <div class="represented">
                    @if ($user->user_galleries()->exists())
                        <span class="tab-title">Represented by</span>
                        @foreach ($user->user_galleries->sortBy('position_id') as $userGallery)
                            <p class="gallery_loop"><span class="name-txt">{{$userGallery->name}}</span> <br>
                            @if ($userGallery->address != "")
                                {{$userGallery->address}}
                                <br>
                             @endif
                             {{$userGallery->postal_code}}<br>{{$userGallery->city}}, {{$userGallery->country}}
                                <!--<br> <a href="{{$userGallery->website}}">{{$userGallery->website}}<a> <br> <a href="https://instagram.com/{{$userGallery->instagram}}">Instagram @ {{$userGallery->instagram}}<a> -->
                            </p>
                            <div class="links my-profile-link">
                                <div class="links-btns">

                                    @if ($userGallery->email != "")
                                        <a href="mailto:{{$userGallery->email}}" class="cmn-btn email-btn">Email</a>
                                    @endif

                                    @if ($userGallery->phone != "")
                                        <a href="tel:{{$userGallery->phone}}" class="cmn-btn my-number-btn">{{$userGallery->phone}}</a>
                                    @endif

                                    @if ($userGallery->website != "")
                                        <a href="https://{{$userGallery->website}}" target="_blank" class="cmn-btn website-btn">Website</a>
                                    @endif

                                    @if ($userGallery->instagram != "")
                                        <a href="https://instagram.com/{{$userGallery->instagram}}" target="_blank" class="cmn-btn instgram-btn">@ {{$userGallery->instagram}}</a>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if ($user->user_galleries()->exists() && $user->cv)
                <div style="border-top: #808080 1px solid;"></div>
                @endif

                @if ($user->cv)
                <div class="my-profile-list cv-list">
                    <span class="tab-title">CV</span>
                    <a href="{{asset('user_cvs/'.$user->cv)}}" target="_blank" class="cv-pdf">Download CV</a>
                </div>
                @endif
                 <!-- <div class="my-profile-list current-exhibitions">
                    <span class="tab-title">Current Exhibitions</span>
                    <p>18.12.2019 - 18.12.2022 <br>The Royal Danish Embassy, Koninginnegracht 30, 2514 AB Hague, the Netherlands</p>
                </div> -->

                @if ($user->current_exhibitions()->exists())
                <div style="border-top: #808080 1px solid;"></div>
                @endif


                @if ($user->current_exhibitions()->exists())
                <div class="my-profile-list current-exhibitions">
                    <span class="tab-title">Current Exhibitions</span>
                    @foreach ($user->current_exhibitions as $exhibition)
                        <p>{{date('d.m.Y', strtotime($exhibition->start_date))}} - {{date('d.m.Y', strtotime($exhibition->end_date))}} <br>
                        <i>{{$exhibition->exhibition_name}}</i>, <a href="http://www.{{$exhibition->website}}">{{$exhibition->gallery_name}}</a>, {{$exhibition->address}}</p>
                    @endforeach
                </div>
                @endif

                @if ($user->upcoming_exhibitions()->exists())
                <div style="border-top: #808080 1px solid;"></div>
                @endif


                @if ($user->upcoming_exhibitions()->exists())
                <div class="my-profile-list upcoming-exhibitions">
                    <span class="tab-title">Upcoming Exhibitions</span>
                    @foreach ($user->upcoming_exhibitions as $exhibition)
                        <p>{{date('d.m.Y', strtotime($exhibition->start_date))}} - {{date('d.m.Y', strtotime($exhibition->end_date))}} <br>
                        <i>{{$exhibition->exhibition_name}}</i>, <a href="http://www.{{$exhibition->website}}">{{$exhibition->gallery_name}}</a>, {{$exhibition->address}}</p>
                    @endforeach
                </div>
                @endif

                @if ($user->past_exhibitions()->exists())
                <div style="border-top: #808080 1px solid;"></div>
                @endif

                @if ($user->past_exhibitions()->exists())
                <div class="my-profile-list upcoming-exhibitions">
                    <span class="tab-title">Past Exhibitions</span>
                    @foreach ($user->past_exhibitions as $exhibition)
                        <p>{{date('d.m.Y', strtotime($exhibition->start_date))}} - {{date('d.m.Y', strtotime($exhibition->end_date))}} <br>
                        <i>{{$exhibition->exhibition_name}}</i>, <a href="http://www.{{$exhibition->website}}">{{$exhibition->gallery_name}}</a>, {{$exhibition->address}}</p>
                    @endforeach
                </div>
                @endif
                {{-- @if ($user->user_exhibitions()->exists())
                <div class="my-profile-list past-exhibitions">
                    <span class="tab-title">Exhibitions</span>

                    @foreach (\App\Models\UserExhibition::where('user_id',$user->id)->get() as $exhibition)
                        <p>{{date('d.m.Y', strtotime($exhibition->start_date))}} - {{date('d.m.Y', strtotime($exhibition->end_date))}} <br>
                        <i>{{$exhibition->exhibition_name}}</i>, <a href="http://www.{{$exhibition->website}}">{{$exhibition->gallery_name}}</a>, {{$exhibition->address}}</p>
                    @endforeach
                </div>
                @endif --}}

            </div>
        </div>
        <!--@guest
        <p style="text-align: center;width: 100%;"><a href="{{route('slug.login', $user->slug)}}" >Login</a></p>
        @endguest-->
        <div style="text-align: center;width: 100%;margin-top: 70px;" class="web-author">Made on&nbsp<a href="https://www.brush.bio" class="branding-text-link">Brush.bio</a>
        </div>
        <header class="header">
            <a href="https://www.brush.bio" class="logo">
                <img src="images/frontend-bottom-logo.png" alt="Artist">
            </a>
        </header>
        <!--<div id="artwork" class="tabbing-cont artwork-cont">
            <div class="container">
                <span class="tab-title">Artwork</span>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.
                    Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.
                    Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
                Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>
            </div>
        </div>-->
    </div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-newsletter modal-dialog-centered">
        <div class="modal-content" >
            <form action="{{route('user.view.profile')}}" method="get" class="subscriber">
                <div class="modal-header">
                    <h4>Join my mailing list</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--<p>Signup for our weekly newsletter to get the latest news, updates and amazing offers delivered directly in your inbox.</p>-->
                    <input type="hidden" name="slug" value="{{$user->slug}}">
                    <div class="alert alert-success" id="message" style="display: none;">
                        Thank you for subscribing.
                    </div>
                    <div class="">
                        <input type="email" class="form-control" placeholder="Email Address" name="email" required id="email">

                            <input type="submit" class="btn btn-primary" id="subscribe-button">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <p class="hint-text"><strong>Note:</strong> Please refresh the page or run the code to reload the modal.</p> -->

<script src="js/jquery.min.js"></script>

<script>
/*apply yello object in front-end*/
$(document).ready(function(){
    var doc_height = $("html").height();
    var final_css_height = (doc_height - 780);
    $('.header').append('<style>.tabbing-cont:before{top:' +final_css_height+ 'px;height:350px;}</style>');
});
/*apply yello object in front-end*/
</script>

<script type="text/javascript">
/*Tabbing Code*/
    $('.tabbing-list .tabbing-item').click(function(e) {
        $('.tabbing-list .tabbing-item').removeClass('active');
        $(this).addClass('active');
        var tab = $(this).attr('data-tab');
        $('.tabbing-cont').removeClass('tabbing-cont-show')
        $('#'+tab).addClass('tabbing-cont-show')
        });
</script>
<script type="text/javascript">
$(window).bind("load", function() {
    setTimeout(function() {
        <?php if(\App\Models\Setting::find(1)->is_mail==1){ if(Cookie::get('Subscription')=='Subscription'){?>
           $('#modal').modal('hide');
          <?php }else { ?>
            $("#myModal").modal('show');
        <?php }}?>
    }, 3000);


    $(".close").click(function(){
         $.ajax({
                    url: "/close-popup",
                    type: "GET",
                    success: function (data) {
                     $("#myModal").modal('hide');
                    }
                });
                return false;
    });
});




    $(document).on('submit', '.subscriber', function (e) {
        e.preventDefault();
                $.ajax({
                    url: "{{route('user.view.profile')}}",
                    type: "GET",
                    data: $(".subscriber").serialize(),
                    success: function (data) {
                        $("#message").show();
                        $("#email").val("");
                        $("#email").css("display","none");
                        $("#subscribe-button").css("display","none");
                    },
                    error: function (data) {
                        console.log(data);
                        // showToast('danger', 'Something went wrong please try again');
                    },
                    complete: function(){
                        // setLoader(false);
                        // refreshDashboardActions();
                    }
                });
                return false;

    });
</script>
@endsection
