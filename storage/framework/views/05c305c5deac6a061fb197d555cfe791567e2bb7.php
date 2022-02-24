<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <!--<th scope="col">#</th>-->
            <th scope="col">Name</th>
            <th scope="col">Gallery Name</th>
            <th scope="col">Address</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $user_exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_exhibition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <!--<td><?php echo e($user_exhibition->id); ?></td>-->
                <td><?php echo e($user_exhibition->exhibition_name); ?></td>
                <td><?php echo e($user_exhibition->gallery_name); ?></td>
                <td><?php echo e($user_exhibition->address); ?></td>
                <td><?php echo e($user_exhibition->start_date); ?></td>
                <td><?php echo e($user_exhibition->end_date); ?></td>
                <td><?php echo e($user_exhibition->website); ?></td>
                <td>
                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('<?php echo e(route('user.exhibition.edit', $user_exhibition->id)); ?>', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>

                    <form action="<?php echo e(route('user.exhibition.delete', $user_exhibition->id)); ?>" class="frmDelete">
                       <button class="btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8" align="center">No Exhibition Found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/user_exhibition/ajax/index.blade.php ENDPATH**/ ?>