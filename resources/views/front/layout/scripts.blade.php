<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('frontend/assets/js/animation.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/toastr/toastr.min.js') }}" type="text/javascript"></script>

<script>
    @php
        $success = '';
        if(\Session::has('success'))
            $success = \Session::get('success');

        $error = '';
        if(\Session::has('error'))
            $error = \Session::get('error');
    @endphp

    var success = "{{ $success }}";
    var error = "{{ $error }}";

    if(success != ''){
        toastr.success(success, 'Success');
    }

    if(error != ''){
        toastr.error(error, 'error');
    }
</script>