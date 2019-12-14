    <!-- Jquery JS -->
    <script src="{{ URL::asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- Proper JS -->
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <!-- Video popup Js -->
    <script src="{{ URL::asset('js/magnific-popup.min.js') }}"></script>
    <!-- Waypoint Up Js -->
    <script src="{{ URL::asset('js/waypoints.min.js') }}"></script>
    <!-- Counter Up Js -->
    <script src="{{ URL::asset('js/counterup.min.js') }}"></script>
    <!-- Meanmenu Js -->
    <script src="{{ URL::asset('js/meanmenu.min.js') }}"></script>
    <!-- Animation Js -->
    <script src="{{ URL::asset('js/aos.min.js') }}"></script>
    <!-- Filtering Js -->
    <script src="{{ URL::asset('js/isotope.min.js') }}"></script>
    <!-- Background Move Js -->
    <script src="{{ URL::asset('js/jquery.backgroundMove.js') }}"></script>
    <!-- Slick Carousel Js -->
    <script src="{{ URL::asset('js/slick.min.js') }}"></script>
    <!-- ScrollUp Js -->
    <script src="{{ URL::asset('js/scrollUp.js') }}"></script>
    <!-- Main Js -->
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    }
    function isValidName(name) {
        var pattern = /^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$/i;
        return pattern.test(name);
    }
    function isValidPassword(password) {
        var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        return pattern.test(password);
    }
    function isValidPhone(phone) {
        var pattern = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/i;
        return pattern.test(phone);
    }
    </script>