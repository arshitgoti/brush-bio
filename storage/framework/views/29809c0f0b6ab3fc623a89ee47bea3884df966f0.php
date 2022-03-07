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
<?php /**PATH D:\XAMPP\htdocs\brush-bio\resources\views/includes/flash.blade.php ENDPATH**/ ?>