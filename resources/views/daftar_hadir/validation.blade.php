<script>
	if ('{{ session()->has('alert-success') }}') {
		swal({
			title: "{{ session()->get('alert-success') }}", 
		  	html: "Terimakasi atas kehadiran di stand kami <br /> Arion Indonesia | matakota | duaz solusi",  
		  	type: 'success',
		});
	}
</script>