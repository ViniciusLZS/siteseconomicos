	<!-- Notification -->

@foreach (session()->all() as $msg)

	@if ($msg == session('success'))
		<script>
		{{-- console.log("{{$msg}}"); --}}
			$.notify({
				icon: 'flaticon-alarm-1',
				title: 'Notificação',
				message: "{{ session('success') }}",
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

	@if ($msg == session('warning'))
		<script>
			$.notify({
				icon: 'flaticon-alarm-1',
				title: 'Notificação',
				message: "{{ session('warning') }}",
			},{
				type: 'warning',
				placement: {
					from: "bottom",
					align: "right"
				},
				time: 1000,
			});
		</script>
	@endif

	@if ($msg == session('danger'))
		<script>
			$.notify({
				icon: 'flaticon-alarm-1',
				title: 'Notificação',
				message: "{{ session('danger') }}",
			},{
				type: 'danger',
				placement: {
					from: "bottom",
					align: "right"
				},
				time: 1000,
			});
		</script>
	@endif
@endforeach