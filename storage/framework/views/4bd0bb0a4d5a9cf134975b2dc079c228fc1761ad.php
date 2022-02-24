<table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <!--<th scope="col">#</th>-->
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Postal Code</th>
            <th scope="col">City, Country</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Website</th>
            <th scope="col">Instagram</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $user_galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <!--<td><?php echo e($user_gallery->id); ?></td>-->
                <td><i class="fas fa-arrows-alt"></i><br><?php echo e($user_gallery->name); ?></td>
                <td><?php echo e($user_gallery->address); ?></td>
                <td><?php echo e($user_gallery->postal_code); ?></td>
                <td><?php echo e($user_gallery->city); ?> <?php echo e($user_gallery->country); ?></td>
                <td><?php echo e($user_gallery->email); ?></td>
                <td><?php echo e($user_gallery->phone); ?></td>
                <td><?php echo e($user_gallery->website); ?></td>
                <td><?php echo e($user_gallery->instagram); ?></td>
                <td style="display: none;"><?php echo e($user_gallery->id); ?></td>

                <td>
                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.gallery.edit', $user_gallery->id)); ?>', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>

                    <form action="<?php echo e(route('user.gallery.delete', $user_gallery->id)); ?>" class="frmDelete">
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


<?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/user_gallery/ajax/index.blade.php ENDPATH**/ ?>