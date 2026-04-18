<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
  title: 'Success',
  text: '{{ session('success') }}',
  icon: 'success',
  confirmButtonColor: '#4caf50',
  width: '300px',
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
  title: 'Warning',
  text: '{{ session('error') }}',
  icon: 'warning',
  confirmButtonColor: '#f44336',
  width: '300px',
});
</script>
@endif
