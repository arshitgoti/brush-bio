<?php $__env->startSection('page-title'); ?>
    Welcom Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <img src="images/main-logo.png" class="register-logo">
    </div>
    




<?php if(auth()->guard()->guest()): ?>
    <div class="welcome-heading1">
        One link at the center of your art career.
    </div>
    <div class="welcome-heading2">
        Provide potential clients instant access to all your information, available artwork and social media channels</div>

    <div class="welcome-heading3">Already on Brush.bio? <a href="https://brush.bio/login">Log in</a></div>

     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Register')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('user.set.slug')); ?>" id="user-name-check-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="isSimpleForm" value="yes">

                        <div class="form-group row username-container">
                            <div for="user_name" class="col-md-4 col-form-label text-md-right website-label">Brush.bio /</div>

                            <div class="col-md-6 custom-welcome-container">
                                <div class="user-input-container">
                                    <input placeholder="Username" id="user_name" type="text" class="username-input form-control <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_name" value="<?php echo e(old('user_name')); ?>" required autocomplete="user_name" autofocus>
                                    <span class="invalid-feedback invalid_user_name_feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSubmitRegister">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php else: ?>

    <div class="welcome-heading1">It seems that you are already Logged in. <a href="https://www.brush.bio/me/dashboard">Click here to go to the dashboard.</a></div>

<?php endif; ?>    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>