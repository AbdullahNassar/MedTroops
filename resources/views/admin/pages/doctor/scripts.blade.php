@section('scripts')
    <script src="{{asset('vendors/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('vendors/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('vendors/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('vendors/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('vendors/lib/moment/moment.js')}}"></script>
    <script src="{{asset('vendors/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('vendors/lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
    <script src="{{asset('vendors/lib/peity/jquery.peity.js')}}"></script>
    <script src="{{asset('vendors/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('vendors/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendors/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('vendors/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('vendors/lib/jt.timepicker/jquery.timepicker.js')}}"></script>
    <script src="{{asset('vendors/lib/spectrum/spectrum.js')}}"></script>
    <script src="{{asset('vendors/lib/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('vendors/lib/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('vendors/lib/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('vendors/js/bootstrap-toggle.min.js')}}"></script>
    <script src="{{asset('vendors/js/bracket.js')}}"></script>
    <script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('vendors/js/float-labels.js')}}"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var t = $('#doctor_table').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxdata.getdata') }}",
                "columns":[
                    { "data": "id" , orderable:true},
                    { "data": "doctor_name" , orderable:false},
                    { "data": "email" , orderable:false},
                    { "data": "phone" , orderable:false},
                    { "data": "price" , orderable:false},
                    { "data": "wallet" , orderable:false},
                    { "data": "action", orderable:false, searchable: false},
                    { "data":"checkbox", orderable:false, searchable:false}
                ],
                "language": {
                    "searchPlaceholder": "Search...",
                    "sSearch": "",
                    "lengthMenu": "show _MENU_ items",
                },
                "order": [[ 0, 'asc' ]]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                });
            }).draw();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            
            $('.form-layout .form-control').on('focusin', function(){
                $(this).closest('.form-group').addClass('form-group-active');
            });
    
            $('.form-layout .form-control').on('focusout', function(){
                $(this).closest('.form-group').removeClass('form-group-active');
            });

            // Select2
            $('.select2').select2({ dropdownParent: $('#doctorModal') });
    
            // Input Masks
            $('#dateMask').mask('99/99/9999');
    
            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });
    
            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });
    
            // Time Picker
            $('#tpBasic').timepicker();

            $('#add_data').click(function(){
                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                $('#doctorModal').modal('show');
                $('#doctor_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Data');
                $('#imgInp').val($(this).data('imgInp'));
                $('#specialty').empty();
                $('#area').empty();
                $('#specialty').append('<option>             </option>');
                $.ajax({
                    url:"{{route('ajaxdata.special')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, specialtyObj){
                            $('#specialty').append('<option value="'+specialtyObj.special_id+'">'+specialtyObj.special_name+'</option>')
                        });
                    }
                });
                $.ajax({
                    url:"{{route('ajaxdata.area')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, areaObj){
                            $('#area').append('<option value="'+areaObj.areas_id+'">'+areaObj.area_name+'</option>')
                        });
                    }
                });
            });
        
            $('#doctor_form').on('submit', function(event){
                event.preventDefault();
                //var form_data = $(this).serialize();
                var action = $('#button_action').val();
                $.ajax({
                    url:"{{ route('ajaxdata.postdata') }}",
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
                            toastr.success('Process Done', 'Success!', {timeOut: 3000});
                            if (action == 'insert') {
                                toastr.success('Data inserted successfully.', 'Success!', {timeOut: 3000});
                                $('#doctor_form')[0].reset();
                                $('#action').val('Add');
                                $('.modal-title').text('Add Data');
                                $('#button_action').val('insert');
                                $('#active').attr('checked', 'checked');
                                $('#doctor_table').DataTable().ajax.reload();
                                $('#specialty').empty();
                                $('#area').empty();
                                $('#specialty').append('<option>             </option>');
                                $('#blah').attr('src', '../vendors/img/1.jpg');
                                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                                $.ajax({
                                    url:"{{route('ajaxdata.special')}}",
                                    method:'get',
                                    dataType:'json',
                                    success:function(data)
                                    {
                                        $.each(data, function(index, specialtyObj){
                                            $('#specialty').append('<option value="'+specialtyObj.special_id+'">'+specialtyObj.special_name+'</option>')
                                        });
                                    }
                                });
                                $.ajax({
                                    url:"{{route('ajaxdata.area')}}",
                                    method:'get',
                                    dataType:'json',
                                    success:function(data)
                                    {
                                        $.each(data, function(index, areaObj){
                                            $('#area').append('<option value="'+areaObj.areas_id+'">'+areaObj.area_name+'</option>')
                                        });
                                    }
                                });
                            }
                            if (action == 'update') {
                                toastr.success('Data updated successfully.', 'Success!', {timeOut: 3000});
                                $('#doctor_table').DataTable().ajax.reload();
                            }
                            
                        }
                    }
                })
            });
        
            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_output').html('');

                $.ajax({
                    url:"{{route('ajaxdata.fetchdata')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success:function(data)
                    {
                        $('.pmd-textfield').addClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                        $('#imgInp').val($(this).data('imgInp'));
                        $('#username').val(data.username);
                        $('#password').val(data.password);
                        $('#doctor_name').val(data.doctor_name);
                        $('#doctor_name_ar').val(data.doctor_name_ar);
                        $('#birth').val(data.birth);
                        $('#address').val(data.address);
                        $('#address_ar').val(data.address_ar);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('#active').val(data.active);
                        $('#price').val(data.price);
                        $('#percent').val(data.percent);
                        $('#wallet').val(data.wallet);
                        $('#balance').val(data.balance);
                        $('#rate').val(data.rate);
                        $('#bio').val(data.bio);
                        $('#bio_ar').val(data.bio_ar);
                        $('#bank_acc_num').val(data.bank_acc_num);
                        $('#bank_name').val(data.bank_name);
                        $('#bank_name_ar').val(data.bank_name_ar);
                        $('#doctor_id').val(id);
                        if(data.active == 1){
                            $('#active').attr('checked', 'checked');
                            $('.toggle').removeClass("off");
                        }
                        if(data.active == 0){
                            $('#active').removeAttr('checked');
                            $('.toggle').addClass("off");
                        }
                        if(data.image != null){
                            $('#blah').attr('src', '../storage/uploads/doctor/'+data.image+'');
                        }else{
                            $('#blah').attr('src', '../vendors/img/1.jpg');
                        }
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Data');
                        $('#button_action').val('update');
                        $('#doctorModal').modal('show');
                    }
                });
                $('#specialty').empty();
                $.ajax({
                    url:"{{route('ajaxdata.doctorspecial')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, doctorspecialObj){
                            $('#specialty').append('<option value="'+doctorspecialObj.special_id+'" selected>'+doctorspecialObj.special_name+'</option>')
                        });
                    }
                });
                $('#area').empty();
                $.ajax({
                    url:"{{route('ajaxdata.doctorarea')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, doctorareaObj){
                            $('#area').append('<option value="'+doctorareaObj.area_id+'" selected>'+doctorareaObj.area_name+'</option>')
                        });
                    }
                });
                
                $.ajax({
                    url:"{{route('ajaxdata.special')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, specialtyObj){
                            $('#specialty').append('<option value="'+specialtyObj.special_id+'">'+specialtyObj.special_name+'</option>')
                        });
                    }
                });
                $.ajax({
                    url:"{{route('ajaxdata.area')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, areaObj){
                            $('#area').append('<option value="'+areaObj.areas_id+'">'+areaObj.area_name+'</option>')
                        });
                    }
                });
            });

            $(document).on('click', '.view', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{route('ajaxdata.fetchdata')}}',
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success: function (data) {
                        $('#dataModal').modal('show');
                        $('#doctor-name').text('Name:  '+data.doctor_name+'');
                        $('#doctor-image').attr('src', '../storage/uploads/doctor/'+data.image+'');
                        $('#doctor-bio').text(''+data.bio+'');
                        $('#doctor-address').text(''+data.address+'');
                        $('#doctor-email').text(''+data.email+'');
                        $('#doctor-phone').text(''+data.phone+'');
                        $('#doctor-price').text(''+data.price+'');
                    }
                });
                $.ajax({
                    url: '{{route('ajaxdata.doctorspecial')}}',
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, doctorspecialObj){
                            $('#doctor-title').text('Specialty:  '+doctorspecialObj.special_name+'');
                        });
                    }
                });
            });

            var delete_id = 0;
            
            $(document).on('click', '.btndelet', function(){
                delete_id = $(this).attr("id");
                $('#delete-modal').modal('show');
            });
        
            $(document).on('click', '.btndelete', function(){
                
                console.log(delete_id);
                $.ajax({
                    url:"{{route('ajaxdata.removedata')}}",
                    mehtod:"get",
                    data:{id:delete_id},
                    success:function(data)
                    {
                        $('#doctor_table').DataTable().ajax.reload();
                    }
                })
                $('#delete-modal').modal('hide');
            });

            $(document).on('click', '#bulk_delete', function(){
                var id = [];
                $('.doctor_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0){
                    $('#multi_delete-modal').modal('show');
                }else{
                    $('#error-modal').modal('show');
                }
            });

            $(document).on('click', '.multideletebtn', function(){
                var id = [];
                $('.doctor_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0){
                    $.ajax({
                        url:"{{ route('ajaxdata.massremove')}}",
                        method:"get",
                        data:{id:id},
                        success:function(data){
                            $('#doctor_table').DataTable().ajax.reload();
                        }
                    });
                    $('#multi_delete-modal').modal('hide');
                }
            });
        });
    </script>
@endsection