<?php if(Session::has('alert-message')): ?>
<script>
	Lobibox.notify('<?php echo e(Session::get("alert-class")); ?>', {
		msg: '<?php echo e(Session::get("alert-message")); ?>',
		title: '<?php echo e(Session::get("alert-title")); ?>',
		sound: false,
		position: 'top center',
		delay: 5000,
		iconSource: "fontAwesome",
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
	});
</script>
<?php endif; ?>
<?php /**PATH /home/k95ehvyw2f5n/public_html/resources/views/includes/flash.blade.php ENDPATH**/ ?>