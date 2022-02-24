  

  
       <div class="row">
     <div class="columns">
         <div class="circle">
       <!-- User Profile Image -->
       <img width="300" height="300" style="background-repeat: no-repeat; object-fit: cover;" class="profile-pic1" src="<?php echo e(asset('user_profile_pics/'.$user->profile_pic)); ?>">
       <!-- <i class="fa fa-user fa-5x"></i> -->
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
                                    <a class="btn btn-primary col-lg-5 col-md-6 col-xs-12 btn-block  m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.vcard.edit', $user->id)); ?>', 'Edit Portfolio Urls')" title="Data added">Edit About me</a>

                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.vcard.create')); ?>', 'Add Portfolio Url(s)')" title="No data added"><i class="fa fa-plus"></i>Add About me</a>
                                <?php endif; ?>
                        
        </div>
            <div class="row">
                               <?php if($user->user_social_url()->exists()): ?>
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.social.url.edit', $user->user_social_url->id)); ?>', 'Edit Portfolio Urls')" title="Data added"> Edit Social Media links</a>
                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.social.url.create')); ?>', 'Add Portfolio Url(s)')" title="No data added"><i class="fa fa-plus"></i> Social Media links</a>
                                <?php endif; ?>
            
        </div>
            <div class="row">
                                <?php if($user->portfolio_urls()->exists()): ?>
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.portfolio.url.edit', $user->id)); ?>', 'Edit Portfolio Urls')" title="Data added"> Edit Links</a>
                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.portfolio.url.create')); ?>', 'Add Portfolio Url(s)')" title="No data added"><i class="fa fa-plus"></i>Add Links</a>
                                <?php endif; ?>
            
        </div>
    
        <div class="row">
                               <?php if($user->user_galleries()->exists()): ?>
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" href="<?php echo e(route('user.gallery')); ?>" title="Data added"> Edit Gallery representation</a>
                                <?php else: ?>
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="<?php echo e(route('user.gallery')); ?>" title="No data added"><i class="fa fa-plus"></i> Add Gallery representation</a>
                                <?php endif; ?>
        </div>
        
         <div class="row">
                          <?php if($user->user_exhibitions()->exists()): ?>
                               <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" href="<?php echo e(route('user.exhibition')); ?>" title="Data added"> Edit Exhibitions</a>
                                    <?php else: ?>
                                      <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="<?php echo e(route('user.exhibition')); ?>" title="No data added"><i class="fa fa-plus"></i>Add Exhibitions</a>

                                    <?php endif; ?>
                          
            
        </div>
        <div class="row">
             <a class="btn col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="<?php echo e(route('user.mailable')); ?>" title="No data added"></i>Manage Mailable</a>
            
        </div>
               <!--  <div class="row" >
                 <button type="button" class="btn btn-primary btn-lg btn-block w-25 m-1 active-btn">Block level button</button>       
        </div>
                <div class="row"  >
                 <button type="button" class="btn cutome-border w-25 m-1">Block level button</button>       
        </div> -->
      
      
      
      <?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/dashboard/ajax/index.blade.php ENDPATH**/ ?>