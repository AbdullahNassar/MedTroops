@section('scripts')
    <script src="{{asset('vendors/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('vendors/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('vendors/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('vendors/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('vendors/lib/moment/moment.js')}}"></script>
    <script src="{{asset('vendors/lib/bootstrap-summernote/summernote.min.js')}}"></script>
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
        var t = $('#post_table').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxdata.getpostdata') }}",
                "columns":[
                    { "data": "id" , orderable:true},
                    { "data": "title_en" , orderable:false},
                    { "data": "head_en" , orderable:false},
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
            $('.select2').select2({ dropdownParent: $('#postModal') });
    
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
                $('.summernote').summernote({height: 150});
                $("#content_ar").summernote("reset");
                $("#content_en").summernote("reset");
                $('#cat_id').empty();
                $('#cat_id').append('<option>             </option>');
                $.ajax({
                    url:"{{route('ajaxdata.cat')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, catObj){
                            $('#cat_id').append('<option value="'+catObj.cat_id+'">'+catObj.name_en+'</option>')
                        });
                    }
                });
                $('#blah').attr('src', '../vendors/img/1.jpg');
                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                $('#postModal').modal('show');
                $('#post_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add post Data');
                $('#imgInp').val($(this).data('imgInp'));
            });
        
            $('#post_form').on('submit', function(event){
                event.preventDefault();
                //var form_data = $(this).serialize();
                var action = $('#button_action').val();
                $.ajax({
                    url:"{{ route('ajaxdata.postpostdata') }}",
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
                                $('#post_form')[0].reset();
                                $('.summernote').summernote({height: 150});
                                $("#content_ar").summernote("reset");
                                $("#content_en").summernote("reset");
                                $('#action').val('Add');
                                $('.modal-title').text('Add New post');
                                $('#button_action').val('insert');
                                $('#post_table').DataTable().ajax.reload();
                                $('#active').attr('checked', 'checked');
                                $('#blah').attr('src', '../vendors/img/1.jpg');
                                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                                $('#cat_id').empty();
                                $('#cat_id').append('<option>             </option>');
                                $.ajax({
                                    url:"{{route('ajaxdata.cat')}}",
                                    method:'get',
                                    dataType:'json',
                                    success:function(data)
                                    {
                                        $.each(data, function(index, catObj){
                                            $('#cat_id').append('<option value="'+catObj.cat_id+'">'+catObj.name_en+'</option>')
                                        });
                                    }
                                });
                            }
                            if (action == 'update') {
                                toastr.success('Data updated successfully.', 'Success!', {timeOut: 3000});
                                $('#post_table').DataTable().ajax.reload();
                            }
                        }
                    }
                })
            });
        
            $(document).on('click', '.edit', function(){
                $('.summernote').summernote({height: 150});
                $("#content_ar").summernote("reset");
                $("#content_en").summernote("reset");
                var id = $(this).attr("id");
                $('#form_output').html('');
                $.ajax({
                    url:"{{route('ajaxdata.fetchpostdata')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success:function(data)
                    {
                        $('.pmd-textfield').addClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                        $('#imgInp').val($(this).data('imgInp'));
                        $('#title_ar').val(data.title_ar);
                        $('#title_en').val(data.title_en);
                        $('#head_ar').val(data.head_ar);
                        $('#head_en').val(data.head_en);
                        $('#content_ar').summernote('code', data.content_ar);
                        $('#content_en').summernote('code', data.content_en);
                        $('#active').val(data.active);
                        $('#post_id').val(id);
                        $('#postModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit post Data');
                        $('#button_action').val('update');

                        if(data.image != null){
                            $('#blah').attr('src', '../storage/uploads/post/'+data.image+'');
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

                        $('#cat_id').empty();
                        $('#cat_id').append('<option>             </option>');
                        $.ajax({
                            url:"{{route('ajaxdata.postcat')}}",
                            method:'get',
                            data:{id:id},
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, catObj){
                                    $('#cat_id').append('<option value="'+catObj.cat_id+'" selected>'+catObj.name_en+'</option>')
                                });
                            }
                        });
                        
                    }
                });
            });

            $(document).on('click', '.view', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{route('ajaxdata.fetchpostdata')}}',
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success: function (data) {
                        $('#dataModal').modal('show');
                        $('#post-name').text('Post Title:  '+data.title_en+'');
                        if(data.image != null){
                            $('#post-image').attr('src', '../storage/uploads/post/'+data.image+'');
                        }else{
                            $('#post-image').attr('src', '../vendors/img/slide1-man.png');
                        }
                        $('#post-header').text(''+data.head_en+'');
                    }
                });
                $.ajax({
                    url:"{{route('ajaxdata.postcat')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, catObj){
                            $('#post-cat').text(''+catObj.name_en+'');
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
                    url:"{{route('ajaxdata.removepostdata')}}",
                    mehtod:"get",
                    data:{id:delete_id},
                    success:function(data)
                    {
                        $('#post_table').DataTable().ajax.reload();
                    }
                })
                $('#delete-modal').modal('hide');
            });

            $(document).on('click', '#bulk_delete', function(){
                var id = [];
                $('.post_checkbox:checked').each(function(){
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
                $('.post_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length == 0){
                    $('#error-modal').modal('show');
                }else{
                    $.ajax({
                        url:"{{ route('ajaxdata.postmassremove')}}",
                        method:"get",
                        data:{id:id},
                        success:function(data){
                            $('#post_table').DataTable().ajax.reload();
                        }
                    });
                    $('#multi_delete-modal').modal('hide');
                }
            });
        });
    </script>
@endsection