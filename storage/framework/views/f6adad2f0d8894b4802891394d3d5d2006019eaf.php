<?php $__env->startSection('title', $user->first_name." ".$user->last_name); ?>
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

@media  only screen and (min-width: 768px) {
    .modal-newsletter .modal-content{
        width: auto;
        margin-left: 70px;
    }
    .modal-dialog{
        margin:1.75rem auto!important;
    }
}

</style>
<?php $__env->startSection('content'); ?>

<div class="wrapper">
    <div class="top-scn">
        <div class="container">
            <div class="user-profile">

                <?php if($user->profile_pic): ?>
                    <!--<div class="userprofile-img"><img src="<?php echo e(Storage::url($user->profile_pic)); ?>" alt=""></div>-->

                    <div class="userprofile-img"><img src="https://www.brush.bio/user_profile_pics/<?php echo e($user->profile_pic); ?>" alt=""></div>
                <?php else: ?>
                    <div class="userprofile-img"><img src="https://www.brush.bio/user_profile_pics/default-profile-pic.png" alt=""></div>
                <?php endif; ?>

                <div class="roy-ockers">
                    <h1><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h1>
                    <span class="artist-txt"><?php echo e($user->type_of_artist); ?> <br>
                        <?php if($user->address_parts()[0] != ""): ?>
                        <?php echo e($user->address_parts()[6]); ?>

                        <?php endif; ?>
                        </span>
                    <?php if($user->dob): ?>
                        <span class="artist-txt"><br>B <?php echo e(date('Y', strtotime($user->dob))); ?></span>
                    <?php endif; ?>
                </div>
            </div>
           <?php if($user->is_contact=='hide' || $user->is_phone=='show' || $user->is_email=='show'): ?>
            <div class="top-contact-info">
                 <?php if($user->is_contact!='show'): ?>
                <a href="<?php echo e(route('user.vcard.download.guest', $user->id)); ?>" class="cmn-btn save-contact">Save Contact</a>
                <?php endif; ?>
                 <?php if($user->is_phone=='show' || $user->is_email=='show'): ?>
                <div class="contact-info-link">
                    <?php if($user->is_phone=='show'): ?>
                    <a href="tel:<?php echo e($user->phone_number); ?>"  class="telnumber"></a>
                    <?php endif; ?>
                    <?php if($user->is_email=='show'): ?>
                    <a href="mailto:<?php echo e($user->email); ?>" class="email"></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="top-socialmedia">
                <?php if($socialUrls): ?>
                 <?php for($i=$socialUrls->min_val;$i<=$socialUrls->max_val;$i++): ?>
                   <?php if($i==4): ?>
                   <?php break; ?>;
                   <?php endif; ?>
                   <?php if($socialUrls->facebook != ''  && $socialUrls->fb_l==$i): ?>

                        <a href="https://www.facebook.com/<?php echo e($socialUrls->facebook); ?>" target="_blank" class="facebook-icon"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->twitter != ''  && $socialUrls->tw_l==$i): ?>
                        <a href="https://twitter.com/<?php echo e($socialUrls->twitter); ?>" target="_blank" class="twitter-link"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->linkedin != ''  && $socialUrls->ln_l==$i): ?>
                        <a href="https://www.linkedin.com/in/<?php echo e($socialUrls->linkedin); ?>" target="_blank" class="linkedin-icon"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->instagram != ''  && $socialUrls->in_l==$i): ?>
                        <a href="https://www.instagram.com/<?php echo e($socialUrls->instagram); ?>" target="_blank" class="instgram-link"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->youtube != ''  && $socialUrls->yu_l==$i): ?>
                        <a href="https://www.youtube.com/channel/<?php echo e($socialUrls->youtube); ?>" target="_blank" class="youtube-link"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->behance != ''  && $socialUrls->be_l==$i): ?>
                        <a href="https://www.behance.net/<?php echo e($socialUrls->behance); ?>" target="_blank" class="be-icon"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->whatsapp != ''  && $socialUrls->wt_l==$i): ?>
                        <a href="https://wa.me/<?php echo e($socialUrls->whatsapp); ?>" target="_blank" class="whatsapp-link"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->skype != ''  && $socialUrls->skp_l==$i): ?>
                        <a href="skype:<?php echo e($socialUrls->skype); ?>?chat" target="_blank" class="skype-link"></a>
                    <?php endif; ?>

                    <?php if($socialUrls->snapchat != '' && $socialUrls->snapchat_is_featured): ?>
                        <!-- <a href="<?php echo e($socialUrls->snapchat); ?>" target="_blank" class="snapchat-link"></a> -->
                    <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="tabbing-panel">
        <div class="container">
            <div class="tabbing-list">
                <span class="tabbing-item active" data-tab="about-me">About Me</span>
                <?php if($user->user_galleries()->exists() || $user->cv || $user->user_exhibitions('current')->exists() || $user->user_exhibitions('upcoming')->exists() || $user->user_exhibitions('past')->exists()): ?>
                    <span class="tabbing-item" data-tab="my-profile">My Profile</span>
                <?php endif; ?>
                <!--<span class="tabbing-item" data-tab="artwork">Artwork</span>-->
            </div>
        </div>
    </div>
    <div class="tabbing-cont-panel">

        <div id="about-me" class="tabbing-cont aboutme-cont tabbing-cont-show">
            <div class="container">
                <?php if($user->user_bio): ?>
                    <div class="bio-part">
                        <span class="tab-title">Bio</span>
                        <div> <?php echo nl2br($user->user_bio->bio_content); ?> </div>
                    </div>
                <?php endif; ?>




                <?php if( $user->portfolio_urls()->exists() || $user->website ): ?>
                    <div class="links">
                        <span class="tab-title">Links</span>
                        <div class="links-btns">
                            <!--<?php if($user->website): ?>
                                <a target="_blank" href="https://www.<?php echo e($user->website); ?>" class="cmn-btn my-website-btn">Website</a>
                            <?php endif; ?>-->
                            <?php $__currentLoopData = $user->portfolio_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a target="_blank" href="https://www.<?php echo e($url->url); ?>" class="cmn-btn my-website-btn"><?php echo e($url->title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="about-social">
                    <?php if($socialUrls): ?>
                     <?php for($j=$i;$j<=$socialUrls->max_val;$j++): ?>
                        <?php if($socialUrls->facebook != '' && !$socialUrls->facebook_is_featured && $socialUrls->fb_l==$j): ?>

                            <a href="https://www.facebook.com/<?php echo e($socialUrls->facebook); ?>" target="_blank" class="facebook-icon"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->twitter != '' && !$socialUrls->twitter_is_featured && $socialUrls->tw_l==$j): ?>
                            <a href="https://twitter.com/<?php echo e($socialUrls->twitter); ?>" target="_blank" class="twitter-link"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->linkedin != '' && !$socialUrls->linkedin_is_featured && $socialUrls->ln_l==$j): ?>
                            <a href="https://www.linkedin.com/in/<?php echo e($socialUrls->linkedin); ?>" target="_blank" class="linkedin-icon"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->instagram != '' && !$socialUrls->instagram_is_featured && $socialUrls->in_l==$j): ?>
                            <a href="https://www.instagram.com/<?php echo e($socialUrls->instagram); ?>" target="_blank" class="instgram-link"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->youtube != '' && !$socialUrls->youtube_is_featured && $socialUrls->yu_l==$j): ?>
                            <a href="https://www.youtube.com/channel/<?php echo e($socialUrls->youtube); ?>" target="_blank" class="youtube-link"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->behance != '' && !$socialUrls->behance_is_featured && $socialUrls->be_l==$j): ?>
                            <a href="https://www.behance.net/<?php echo e($socialUrls->behance); ?>" target="_blank" class="be-icon"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->whatsapp != '' && !$socialUrls->whatsapp_is_featured && $socialUrls->wt_l==$j): ?>
                            <a href="https://wa.me/<?php echo e($socialUrls->whatsapp); ?>" target="_blank" class="whatsapp-link"></a>
                        <?php endif; ?>

                        <?php if($socialUrls->snapchat != '' && !$socialUrls->snapchat_is_featured && $socialUrls->fb_l==$j): ?>
                            <!-- <a href="<?php echo e($socialUrls->snapchat); ?>" target="_blank" class="snapchat-link"></a> -->
                        <?php endif; ?>

                        <?php if($socialUrls->skype != '' && !$socialUrls->skype_is_featured && $socialUrls->skp_l==$j): ?>
                            <a href="skype:<?php echo e($socialUrls->skype); ?>?chat" target="_blank" class="skype-link"></a>
                        <?php endif; ?>
                       <?php endfor; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div id="my-profile" class="tabbing-cont myprofile-cont">
            <div class="container">
                <div class="represented">
                    <?php if($user->user_galleries()->exists()): ?>
                        <span class="tab-title">Represented by</span>
                        <?php $__currentLoopData = $user->user_galleries->sortBy('position_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="gallery_loop"><span class="name-txt"><?php echo e($userGallery->name); ?></span> <br>
                            <?php if($userGallery->address != ""): ?>
                                <?php echo e($userGallery->address); ?>

                                <br>
                             <?php endif; ?>
                             <?php echo e($userGallery->postal_code); ?><br><?php echo e($userGallery->city); ?>, <?php echo e($userGallery->country); ?>

                                <!--<br> <a href="<?php echo e($userGallery->website); ?>"><?php echo e($userGallery->website); ?><a> <br> <a href="https://instagram.com/<?php echo e($userGallery->instagram); ?>">Instagram @ <?php echo e($userGallery->instagram); ?><a> -->
                            </p>
                            <div class="links my-profile-link">
                                <div class="links-btns">

                                    <?php if($userGallery->email != ""): ?>
                                        <a href="mailto:<?php echo e($userGallery->email); ?>" class="cmn-btn email-btn">Email</a>
                                    <?php endif; ?>

                                    <?php if($userGallery->phone != ""): ?>
                                        <a href="tel:<?php echo e($userGallery->phone); ?>" class="cmn-btn my-number-btn"><?php echo e($userGallery->phone); ?></a>
                                    <?php endif; ?>

                                    <?php if($userGallery->website != ""): ?>
                                        <a href="https://<?php echo e($userGallery->website); ?>" target="_blank" class="cmn-btn website-btn">Website</a>
                                    <?php endif; ?>

                                    <?php if($userGallery->instagram != ""): ?>
                                        <a href="https://instagram.com/<?php echo e($userGallery->instagram); ?>" target="_blank" class="cmn-btn instgram-btn">@ <?php echo e($userGallery->instagram); ?></a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <?php if($user->user_galleries()->exists() && $user->cv): ?>
                <div style="border-top: #808080 1px solid;"></div>
                <?php endif; ?>

                <?php if($user->cv): ?>
                <div class="my-profile-list cv-list">
                    <span class="tab-title">CV</span>
                    <a href="<?php echo e(asset('user_cvs/'.$user->cv)); ?>" target="_blank" class="cv-pdf">Download CV</a>
                </div>
                <?php endif; ?>
                 <!-- <div class="my-profile-list current-exhibitions">
                    <span class="tab-title">Current Exhibitions</span>
                    <p>18.12.2019 - 18.12.2022 <br>The Royal Danish Embassy, Koninginnegracht 30, 2514 AB Hague, the Netherlands</p>
                </div> -->

                <?php if($user->current_exhibitions()->exists()): ?>
                <div style="border-top: #808080 1px solid;"></div>
                <?php endif; ?>


                <?php if($user->current_exhibitions()->exists()): ?>
                <div class="my-profile-list current-exhibitions">
                    <span class="tab-title">Current Exhibitions</span>
                    <?php $__currentLoopData = $user->current_exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e(date('d.m.Y', strtotime($exhibition->start_date))); ?> - <?php echo e(date('d.m.Y', strtotime($exhibition->end_date))); ?> <br>
                        <i><?php echo e($exhibition->exhibition_name); ?></i>, <a href="http://www.<?php echo e($exhibition->website); ?>"><?php echo e($exhibition->gallery_name); ?></a>, <?php echo e($exhibition->address); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <?php if($user->upcoming_exhibitions()->exists()): ?>
                <div style="border-top: #808080 1px solid;"></div>
                <?php endif; ?>


                <?php if($user->upcoming_exhibitions()->exists()): ?>
                <div class="my-profile-list upcoming-exhibitions">
                    <span class="tab-title">Upcoming Exhibitions</span>
                    <?php $__currentLoopData = $user->upcoming_exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e(date('d.m.Y', strtotime($exhibition->start_date))); ?> - <?php echo e(date('d.m.Y', strtotime($exhibition->end_date))); ?> <br>
                        <i><?php echo e($exhibition->exhibition_name); ?></i>, <a href="http://www.<?php echo e($exhibition->website); ?>"><?php echo e($exhibition->gallery_name); ?></a>, <?php echo e($exhibition->address); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <?php if($user->past_exhibitions()->exists()): ?>
                <div style="border-top: #808080 1px solid;"></div>
                <?php endif; ?>

                <?php if($user->past_exhibitions()->exists()): ?>
                <div class="my-profile-list upcoming-exhibitions">
                    <span class="tab-title">Past Exhibitions</span>
                    <?php $__currentLoopData = $user->past_exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e(date('d.m.Y', strtotime($exhibition->start_date))); ?> - <?php echo e(date('d.m.Y', strtotime($exhibition->end_date))); ?> <br>
                        <i><?php echo e($exhibition->exhibition_name); ?></i>, <a href="http://www.<?php echo e($exhibition->website); ?>"><?php echo e($exhibition->gallery_name); ?></a>, <?php echo e($exhibition->address); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                

            </div>
        </div>
        <!--<?php if(auth()->guard()->guest()): ?>
        <p style="text-align: center;width: 100%;"><a href="<?php echo e(route('slug.login', $user->slug)); ?>" >Login</a></p>
        <?php endif; ?>-->
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
            <form action="<?php echo e(route('user.view.profile')); ?>" method="get" class="subscriber">
                <div class="modal-header">
                    <h4>Join my mailing list</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--<p>Signup for our weekly newsletter to get the latest news, updates and amazing offers delivered directly in your inbox.</p>-->
                    <input type="hidden" name="slug" value="<?php echo e($user->slug); ?>">
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
                    url: "<?php echo e(route('user.view.profile')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\brush_bio\resources\views/home.blade.php ENDPATH**/ ?>