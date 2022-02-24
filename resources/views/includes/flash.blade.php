@if(Session::has('alert-message'))
<script>
	Lobibox.notify('{{Session::get("alert-class")}}', {
		msg: '{{Session::get("alert-message")}}',
		title: '{{Session::get("alert-title")}}',
		sound: false,
		position: 'top center',
		delay: 5000,
		iconSource: "fontAwesome",
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
	});
</script>
@endif
