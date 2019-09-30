@section('scripts')

    <script src="{{asset('vendors/site/EN/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('vendors/site/EN/js/owl.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/select2.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/daterangepicker.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/scripts.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/html5lightbox.js')}}"></script>

    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{asset('vendors/site/EN/js/infobox.min.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/markerclusterer.js')}}"></script>
    <script src="{{asset('vendors/site/EN/js/maps.js')}}"></script>

    <script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>

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

            $('#patient_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.postdata') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:"json",
                    cache: false,
                    contentType : false,
                    processData: false,
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                toastr.error(data.error[count], 'Error!', {timeOut: 3000});
                            }
                        }
                        else
                        {
                            toastr.success('Data updated successfully.', 'Success!', {timeOut: 3000});
                        }
                    }
                })
            });

        });
    </script>
@endsection