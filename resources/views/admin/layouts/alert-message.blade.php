<script>
    @if(Session::has('alert-success'))
    toastr.success("{{Session::get('alert-success')}}", "Success", {
        progressBar: true,
        timeOut: 15000,
    });
    @endif
    @if(Session::has('alert-warning'))
    toastr.warning("{{Session::get('alert-warning')}}", "Warning", {
        progressBar: true,
        timeOut: 15000,
    });
    @endif
    @if(Session::has('alert-danger'))
    toastr.error("{{Session::get('alert-danger')}}", "Error", {
        progressBar: true,
        timeOut: 15000,
    });
    @endif
</script>