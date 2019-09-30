@section('scripts')

    <script src="{{asset('vendors/site/EN/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('vendors/site/EN/js/owl.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/scripts.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/html5lightbox.js')}}"></script>

    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{asset('vendors/site/EN/js/infobox.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/markerclusterer.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/maps.js')}}"></script>

    <script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>

    <script type="text/javascript">
        /* Nice Scroll */
        $(document).ready(function() {

            "use strict";

            $("html").niceScroll({
                scrollspeed: 60,
                mousescrollstep: 35,
                cursorwidth: 5,
                cursorcolor: '#0f89d1',
                cursorborder: 'none',
                background: 'rgba(15, 137, 209, 0.37)',
                cursorborderradius: 3,
                autohidemode: false,
                cursoropacitymin: 0.1,
                cursoropacitymax: 1,
                zindex: "999",
                horizrailenabled: false
            });

        });
    </script>
@endsection