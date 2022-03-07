<?php $__env->startSection('page-title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<style type="text/css">



    .input--file {
  position: relative;
  color: #7f7f7f;
}

.input--file input[type="file"] {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.cutome-border {
    border:2px dashed rgba(0,0,0,.6)!important;
    border-radius: 12px!important;
}
.cutome-border i {
    margin-right: 7px;
}
a.btn.btn-primary.col-lg-5.col-md-6.col-xs-12.btn-block.m-2.mx-4.p-3.active-btn{
    border-radius: 12px!important;
}
.input--file{

    background-color: #FFFFFF;
    width: 40px;
    height: 40px;
}
.input--file svg{
    margin: 5px;
    font-size: 50px;
}
.step-panel
{
    /*background-color: #f7c1c5;*/
   /* min-height: 100vh;
    overflow: auto;
     text-align: center; 
    position: relative*/
}
.step-panel:after
{
/*content: '';
    position: absolute;
    right: 0px;
    top: 0px;
    background-image: url(../images/step-spot-top.png);
    background-repeat: no-repeat;
    width: 188px;
    height: 285px;
    display: inline-block;*/
}
.row{
  justify-content: center;
}
.active-btn{
    background-color: #e4aa9c !important; border: 3px solid #e4aa9c!important;
}
.dorp-color{
    background-color: #f7c1c5 !important;
}

/*image uploaD*/
body {
  background-color: #efefef;
}

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
body {
  background-color: #ffff;
}
.py-4{
    background-color: white;
}

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 1000px !important;
    overflow: hidden;
    width: 150px;
    height: 150px;
    border: 8px solid rgba(255, 255, 255, 0.7);
    //position: absolute;
    top: 72px;
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  //position: absolute;
  top: 167px !important;
  right: 30px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
}
.columns {
    position: relative;
    padding-left: 0.9375rem;
    padding-right: 0.9375rem;
    float: left;
}

a.btn.btn-primary.col-lg-5.col-md-6.col-xs-12.btn-block.m-2.mx-4.p-3.active-btn,
a.btn.cutome-border.col-lg-5.col-md-6.col-xs-12.m-2.mx-4.p-3
{
    font-size: 18px;
    font-family:'niveau_grotesklight';
}

i.fa.fa-camera.upload-button {
    position: absolute;
    margin: -66px 52px;
    font-size: 20px;
    background: white;
    border: 1px solid gray;
    border-radius: 53px;
    padding: 7px;
    cursor:pointer;
}
a#navbarDropdown, #mylink {
    color: inherit;
}
.manage-profile{font-family:'niveau_grotesklight';}

</style>

<?php $__env->startSection('content'); ?>
    <div class="container actions-container">
        

  


          <div class="row">
     <div class="columns">
         <div class="circle">
             <?php if($user->profile_pic): ?>
                    <!-- User Profile Image -->
                    <img width="300" height="300" style="background-repeat: no-repeat; object-fit: cover;" class="profile-pic1" src="<?php echo e(asset('user_profile_pics/'.$user->profile_pic)); ?>">
                    <!-- <i class="fa fa-user fa-5x"></i> -->        
             <?php else: ?>
                <div class="userprofile-img"><img src="https://www.brush.bio/user_profile_pics/default-profile-pic.png" alt=""></div>
             <?php endif; ?>
       
     </div>
     <div class="p-image" style="margin-inline: 58px;">
        <form id="profile_image_form" action="<?php echo e(route('user.update.profile.image')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" id="profile_image" name="img" type="file" accept="image/"/>
        </form>
     </div> 
     </div>

</div>

        <div class="row">
            <h1 class="manage-profile">Manage your profile</h1>
        </div>

        <div class="row">
                         <?php if($user->exists()): ?>
                                    <a class="btn btn-primary col-lg-5 col-md-6 col-xs-12 btn-block  m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.vcard.edit', $user->id)); ?>', 'Edit Portfolio Urls')">Edit About me</a>

                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.vcard.create')); ?>', 'Add Portfolio Url(s)')"><i class="fa fa-plus"></i>Add About me</a>
                                <?php endif; ?>
                        
        </div>
            <div class="row">
                               <?php if($user->user_social_url()->exists()): ?>
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.social.url.edit', $user->user_social_url->id)); ?>', 'Edit Portfolio Urls')"> Edit Social Media links</a>
                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.social.url.create')); ?>', 'Add Portfolio Url(s)')"><i class="fa fa-plus"></i> Social Media links</a>
                                <?php endif; ?>
            
        </div>
            <div class="row">
                                <?php if($user->portfolio_urls()->exists()): ?>
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.portfolio.url.edit', $user->id)); ?>', 'Edit Portfolio Urls')"> Edit Links</a>
                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.portfolio.url.create')); ?>', 'Add Portfolio Url(s)')"><i class="fa fa-plus"></i>Add Links</a>
                                <?php endif; ?>
            
        </div>
    
        <div class="row">
                               <?php if($user->user_galleries()->exists()): ?>
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" href="<?php echo e(route('user.gallery')); ?>"> Edit Gallery Representation</a>
                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="<?php echo e(route('user.gallery')); ?>"><i class="fa fa-plus"></i> Add Gallery Representation</a>
                                <?php endif; ?>
        </div>
        
         <div class="row">
                          <?php if($user->user_exhibitions()->exists()): ?>
                               <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" href="<?php echo e(route('user.exhibition')); ?>"> Edit Exhibitions</a>
                                    <?php else: ?>
                                      <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="<?php echo e(route('user.exhibition')); ?>"><i class="fa fa-plus"></i>Add Exhibitions</a>

                                    <?php endif; ?>
                          
            
        </div>
        <div class="row">
             <a class="btn col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="<?php echo e(route('user.mailable')); ?>"></i>Manage Mailing List</a>
            
        </div>
               <!--  <div class="row" >
                 <button type="button" class="btn btn-primary btn-lg btn-block w-25 m-1 active-btn">Block level button</button>       
        </div>
                <div class="row"  >
                 <button type="button" class="btn cutome-border w-25 m-1">Block level button</button>       
        </div> -->
      
      
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\brush-bio\resources\views/dashboard/index.blade.php ENDPATH**/ ?>