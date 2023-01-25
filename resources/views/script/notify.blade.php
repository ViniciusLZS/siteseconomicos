	<!-- Notification -->
@if (session('sucess'))
	<script>
		$.notify({
			icon: 'flaticon-alarm-1',
			title: 'Notificação',
			message: "{{ session('sucess') }}",
		},{
			type: 'success',
			placement: {
				from: "bottom",
				align: "right"
			},
			time: 1000,
		});
	</script>
@endif