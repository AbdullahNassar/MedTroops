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
        var t = $('#cat_table').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxdata.getcatdata') }}",
                "columns":[
                    { "data": "cat_id" , orderable:true},
                    { "data": "name_en" , orderable:false},
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
            $('.select2').select2({ dropdownParent: $('#catModal') });
    
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
                $('#catModal').modal('show');
                $('#cat_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Data');
            });
        
            $('#cat_form').on('submit', function(event){
                event.preventDefault();
                //var form_data = $(this).serialize();
                var action = $('#button_action').val();
                $.ajax({
                    url:"{{ route('ajaxdata.postcatdata') }}",
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
                                //console.log($('#imgInp').val());
                            }
                        }
                        else
                        {
                            if (action == 'insert') {
                                toastr.success('Data inserted successfully.', 'Success!', {timeOut: 3000});
                                $('#cat_form')[0].reset();
                                $('#action').val('Add');
                                $('.modal-title').text('Add Data');
                                $('#button_action').val('insert');
                                $('#active').attr('checked', 'checked');
                                $('#cat_table').DataTable().ajax.reload();
                                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                            }
                            if (action == 'update') {
                                toastr.success('Data updated successfully.', 'Success!', {timeOut: 3000});
                                $('#cat_table').DataTable().ajax.reload();
                            }
                            
                        }
                    }
                })
            });
        
            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_output').html('');
                $.ajax({
                    url:"{{route('ajaxdata.fetchcatdata')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success:function(data)
                    {
                        $('.pmd-textfield').addClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                        $.each(data, function(index, catObj){
                            $('#name_en').val(catObj.name_en);
                            $('#name_ar').val(catObj.name_ar);
                            if(catObj.active == 1){
                                $('#active').attr('checked', 'checked');
                                $('.toggle').removeClass("off");
                            }else{
                                $('#active').removeAttr('checked');
                                $('.toggle').addClass("off");
                            }
                        });
                        $('#cat_id').val(id);
                        $('#catModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Data');
                        $('#button_action').val('update');
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
                    url:"{{route('ajaxdata.removecatdata')}}",
                    mehtod:"get",
                    data:{id:delete_id},
                    success:function(data)
                    {
                        $('#cat_table').DataTable().ajax.reload();
                    }
                })
                $('#delete-modal').modal('hide');
            });

            $(document).on('click', '#bulk_delete', function(){
                var id = [];
                $('.cat_checkbox:checked').each(function(){
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
                $('.cat_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0){
                    $.ajax({
                        url:"{{ route('ajaxdata.catmassremove')}}",
                        method:"get",
                        data:{id:id},
                        success:function(data){
                            $('#cat_table').DataTable().ajax.reload();
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