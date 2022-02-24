<tr>
<td class="header">
    <a href="<?php echo e($url); ?>" style="display: inline-block;">
        <?php if(trim($slot) === 'Laravel'): ?>
            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
        <?php else: ?>
            <div>
                <img src="<?php echo e(asset('images/email-logo.png')); ?>" alt="<?php echo e($slot); ?>" class="logo" style="width:50%;height:auto;"> <!--<p><?php echo e($slot); ?></p>-->
            </div>
        <?php endif; ?>
    </a>
</td>
</tr>
<?php /**PATH D:\XAMPP\htdocs\brush_bio\resources\views/vendor/mail/html/header.blade.php ENDPATH**/ ?>