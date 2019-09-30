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
        var t = $('#patient_table').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxdata.getpatientdata') }}",
                "columns":[
                    { "data": "id" , orderable:true},
                    { "data": "patient_name" , orderable:false},
                    { "data": "email" , orderable:false},
                    { "data": "phone" , orderable:false},
                    { "data": "birth" , orderable:false},
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
            $('.select2').select2({ dropdownParent: $('#patientModal') });
    
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
                $('#gender').empty();
                $('#gender').append('<option></option>');
                $('#gender').append('<option value="'+1+'">Male</option>');
                $('#gender').append('<option value="'+0+'">Female</option>');
                $('#blah').attr('src', '../vendors/img/1.jpg');
                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                $('#patientModal').modal('show');
                $('#patient_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Patient Data');
                $('#imgInp').val($(this).data('imgInp'));
            });
        
            $('#patient_form').on('submit', function(event){
                event.preventDefault();
                //var form_data = $(this).serialize();
                var action = $('#button_action').val();
                $.ajax({
                    url:"{{ route('ajaxdata.postpatientdata') }}",
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
                            if (action == 'insert') {
                                toastr.success('Data inserted successfully.', 'Success!', {timeOut: 3000});
                                $('#patient_form')[0].reset();
                                $('#action').val('Add');
                                $('#gender').empty();
                                $('#gender').append('<option></option>');
                                $('#gender').append('<option value="'+1+'">Male</option>');
                                $('#gender').append('<option value="'+0+'">Female</option>');
                                $('.modal-title').text('Add New Patient');
                                $('#button_action').val('insert');
                                $('#patient_table').DataTable().ajax.reload();
                                $('#blah').attr('src', '../vendors/img/1.jpg');
                                $('#active').attr('checked', 'checked');
                                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                            }
                            if (action == 'update') {
                                toastr.success('Data updated successfully.', 'Success!', {timeOut: 3000});
                                $('#patient_table').DataTable().ajax.reload();
                            }
                            
                        }
                    }
                })
            });
        
            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_output').html('');
                $.ajax({
                    url:"{{route('ajaxdata.fetchpatientdata')}}",
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
                        $('#patient_name').val(data.patient_name);
                        $('#patient_name_ar').val(data.patient_name_ar);
                        $('#birth').val(data.birth);
                        $('#address').val(data.address);
                        $('#address_ar').val(data.address_ar);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('#active').val(data.active);
                        $('#wallet').val(data.wallet);
                        $('#rate').val(data.rate);
                        $('#bio').val(data.bio);
                        $('#bio_ar').val(data.bio_ar);
                        $('#bank_acc_num').val(data.bank_acc_num);
                        $('#bank_name').val(data.bank_name);
                        $('#bank_name_ar').val(data.bank_name_ar);
                        $('#facebook').val(data.facebook);
                        $('#twitter').val(data.twitter);
                        $('#linkedin').val(data.linkedin);
                        $('#instagram').val(data.instagram);
                        $('#patient_id').val(id);
                        $('#patientModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Patient Data');
                        $('#button_action').val('update');

                        if(data.image != null){
                            $('#blah').attr('src', '../storage/uploads/patient/'+data.image+'');
                            $('#imgInp').attr('value', data.image);
                        }else{
                            $('#blah').attr('src', '../vendors/img/1.jpg');
                        }

                        if(data.active == 1){
                            $('#active').attr('checked', 'checked');
                            $('.toggle').removeClass("off");
                        }
                        if(data.active == 0){
                            $('#active').removeAttr('checked');
                            $('.toggle').addClass("off");
                        }

                        $('#gender').empty();
                        var gender = 0;
                        if(data.gender == "Male"){
                            gender = 1;
                        }
                        if(data.gender == "Female"){
                            gender = 0;
                        }
                        
                        $('#gender').append('<option value="'+gender+'" selected>'+data.gender+'</option>');
                        $('#gender').append('<option value="'+1+'">Male</option>');
                        $('#gender').append('<option value="'+0+'">Female</option>');
                        
                    }
                });
            });

            $(document).on('click', '.view', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{route('ajaxdata.fetchpatientdata')}}',
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success: function (data) {
                        $('#dataModal').modal('show');
                        $('#patient-name').text('Name:  '+data.patient_name+'');
                        if(data.image != null){
                            $('#patient-image').attr('src', '../storage/uploads/patient/'+data.image+'');
                        }else{
                            $('#patient-image').attr('src', '../vendors/img/1.jpg');
                        }
                        $('#patient-bio').text(''+data.bio+'');
                        $('#patient-address').text(''+data.address+'');
                        $('#patient-email').text(''+data.email+'');
                        $('#patient-phone').text(''+data.phone+'');
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
                    url:"{{route('ajaxdata.removepatientdata')}}",
                    mehtod:"get",
                    data:{id:delete_id},
                    success:function(data)
                    {
                        $('#patient_table').DataTable().ajax.reload();
                    }
                })
                $('#delete-modal').modal('hide');
            });

            $(document).on('click', '#bulk_delete', function(){
                var id = [];
                $('.patient_checkbox:checked').each(function(){
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
                $('.patient_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0){
                    $.ajax({
                        url:"{{ route('ajaxdata.patientmassremove')}}",
                        method:"get",
                        data:{id:id},
                        success:function(data){
                            $('#patient_table').DataTable().ajax.reload();
                        }
                    });
                    $('#multi_delete-modal').modal('hide');
                }else{
                    $('#error-modal').modal('show');
                }
            });
        });
    </script>
@endsection