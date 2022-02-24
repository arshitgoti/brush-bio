 
<?php $__env->startSection('content'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Manage Galleries
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(url()->previous()); ?>" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="float-right">
                                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.gallery.create')); ?>', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-plus-square"></i> Add New Gallery</a>
                                </div>
                            </div>
                        </div>
                        <div class="tblGalleryList table-responsive" >
                            <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="1">
                                <thead>
                                    <tr>
                                        <!--<th scope="col">#</th>-->
                                        <th scope="col"></th>
                                        <th scope="col">Gallery Name</th>
                                        <!--<th scope="col">Address</th>
                                        <th scope="col">Postal Code</th>
                                        <th scope="col">City, Country</th>-->
                                        <th scope="col">Email</th>
                                        <!--<th scope="col">Phone</th>-->
                                        <th scope="col">Website</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col"></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $__empty_1 = true; $__currentLoopData = $user_galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    
                                        <tr id="sortable">
                                            <!--<td><?php echo e($user_gallery->id); ?></td>-->
                                        <td>
                                            <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.gallery.edit', $user_gallery->id)); ?>', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>
                                        </td>
                                        
                                        <td><!--<i class="fas fa-arrows-alt"></i><br>-->
                                        <?php echo e($user_gallery->name); ?></td>
                                        <!--<td><?php echo e($user_gallery->address); ?></td>
                                        <td><?php echo e($user_gallery->postal_code); ?></td>
                                        <td><?php echo e($user_gallery->city); ?> <?php echo e($user_gallery->country); ?></td>-->
                                        <td><?php echo e($user_gallery->email); ?></td>
                                        <!--<td><?php echo e($user_gallery->phone); ?></td>-->
                                        <td><?php echo e($user_gallery->website); ?></td>
                                        <td><?php echo e($user_gallery->instagram); ?></td>
                                        <td style="display: none;"><?php echo e($user_gallery->id); ?></td>

                                        <td>
                                            <form action="<?php echo e(route('user.gallery.delete', $user_gallery->id)); ?>" class="frmDelete" id="gallery">
                                                    <button class="btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                                </form>
                                        </td>
                                        </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="10" align="center">No Gallery Found</td>
                                        </tr>
                                    <?php endif; ?>
                                    
                                </tbody>

                            </table>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\brush_bio\resources\views/user_gallery/index.blade.php ENDPATH**/ ?>