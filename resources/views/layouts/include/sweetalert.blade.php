<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // sweetAlertInitialize();
    @if (session('success'))
        Swal.fire({
            title: 'Success',
            icon: 'success',
            text: "{{ session('Success') }}",
        })
    @endif

    @if (session('error'))
        Swal.fire({
            title: 'Error',
            icon: 'error',
            text: "{{ session('error') }}",
        })
    @endif

    @if (session('warning'))
        Swal.fire({
            title: 'Warning',
            icon: 'warning',
            text: "{{ session('warning') }}",
        })
    @endif

    @if (session('info'))
        Swal.fire({
            title: 'Info',
            icon: 'info',
            text: "{{ session('info') }}",
        })
    @endif
</script>