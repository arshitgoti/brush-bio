<?php $__env->startComponent('mail::message'); ?>
<?php if($details['ref']=='w_report'): ?>
<p>Dear Artist,</p>
<p>Your subscriber list has grown!</p>
<p>This week <?php echo e($details['count']); ?> people subscribed to your mailing list. That brings your total to <?php echo e($details['count']); ?>. Keep up the good work! </p>
<p>You can view your list <a href="https://www.brush.bio/me/user-mailable">here</a>.</p>

<?php else: ?>
<p>Dear Artist,</p>
<p>You have a new subscriber to your profile! <a href="https://www.brush.bio/me/user-mailable">Click here</a> to view.</p>
<?php endif; ?>


<!-- <?php $__env->startComponent('mail::button', ['url' => '']); ?>
Button Text
<?php echo $__env->renderComponent(); ?> -->

Regards,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/emails/senduserdetail.blade.php ENDPATH**/ ?>