
 
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        My Information       
                        <div class="float-right">
                            <a class="btn btn-primary" href="https://www.brush.bio/me/dashboard" title="Go back"><i class="fas fa-arrow-left"></i> Return to dashboard</a>
                        </div>
                    </div>
                    <div class="card-body">
                      	<div class="row">
						  <div class="col-sm-12">
						    <div class="">
						      <div class="">						        
								<form action="<?php echo e(route('user.update.detail')); ?>" method="post" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>					
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="inputEmail4">First Name</label>
								      <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" name="first_name" value="<?php echo e(Auth::user()->first_name); ?>">
								      <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								    <small class="text-danger"><?php echo e($message); ?></small>
								    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								    </div>
								    <div class="form-group col-md-6">
								      <label for="inputPassword4">Last Name</label>
								      <input type="text" class="form-control" id="inputPassword4" placeholder="Last Name" name="last_name" value="<?php echo e(Auth::user()->last_name); ?>">
								       <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								    <small class="text-danger"><?php echo e($message); ?></small>
								    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								    </div>
								</div>
								<div class="form-row">
								    <div class="form-group col-md-6">
									    <label for="inputAddress2">Email</label>
									    <input type="email" class="form-control" id="inputAddress2" placeholder="Email.." value="<?php echo e(Auth::user()->email); ?>" name="email"></textarea>
									     <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									    <small class="text-danger"><?php echo e($message); ?></small>
									    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								  	</div>
								</div>
								  
								  
									<div class="form-group">
										<button class="btn btn-primary">Submit</button>
									</div>
								</form>							  
						      </div>
						    </div>
						</div>					  
					</div>               
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <!--<div class="card-header">
                        Account actions                         
                    </div>-->
                    <div class="card-body">
                      	<div class="row">
							<div class="col-sm-12">
							    <div class="">
							      <div class="">
							      	<a class="btn btn-primary" href="https://www.brush.bio/password/reset" title="Reset Password">Reset Password</a>
							      </div>
							    </div>
							</div>
							<div class="col-sm-12 mt-3">
							    <div class="">
							      <div class="">
							      <div class="text-danger" onclick="delAccount()" style="cursor:pointer;">Delete Account</div>
							      	<!--<button class="btn btn-danger" onclick="delAccount()"  title="Delete Account"><i class="fas fa-trash"></i> Delete Account</button>-->
							      </div>
							    </div>
							</div>										  
						</div>               
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    	function delAccount(){
    		 
						Swal.fire({ 
						  title: 'Are you sure you want to proceed?',
						  text:'This will permanently delete your account.',
						  icon:'warning',
						  showDenyButton: false,
						  showCancelButton: true,
						  confirmButtonColor: 'red',
						  confirmButtonText: 'Delete',
						}).then((result) => {
						  /* Read more about isConfirmed, isDenied below */
						  if (result.isConfirmed) {
						    $.ajax({
						    	type:'GET',
						    	url:'<?php echo e(route('user.delete')); ?>',
						    	success:function(res){
						    		window.location.href=window.location.origin;

						    	}
						    	});
						  }
						})
    	}
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/dashboard/about.blade.php ENDPATH**/ ?>