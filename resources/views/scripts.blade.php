@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
         $('#doctor_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('ajaxdata.getdata') }}",
            "columns":[
                { "data": "email" },
                { "data": "phone" },
                { "data": "action", orderable:false, searchable: false},
                { "data":"checkbox", orderable:false, searchable:false}
            ]
         });
    
        $('#add_data').click(function(){
            $('#doctorModal').modal('show');
            $('#doctor_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
            $('.modal-title').text('Add Data');
        });
    
        $('#doctor_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{ route('ajaxdata.postdata') }}",
                method:"POST",
                data:form_data,
                dataType:"json",
                success:function(data)
                {
                    if(data.error.length > 0)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                        $('#doctor_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Data');
                        $('#button_action').val('insert');
                        $('#doctor_table').DataTable().ajax.reload();
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
                success:function(data)
                {
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#doctor_id').val(id);
                    $('#doctorModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Data');
                    $('#button_action').val('update');
                }
            })
        });
        var delete_id = 0;
        
        $(document).on('click', '.btndelet', function(){
            delete_id = $(this).attr("id");
            $('#delete-modal').modal('show');
            $('.modal-title').text('Are you sure you want to Delete this data?');
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
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $('.doctor_checkbox:checked').each(function(){
                id.push($(this).val());
            });
            if(id.length > 0)
            {
                $.ajax({
                    url:"{{ route('ajaxdata.massremove')}}",
                    method:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#doctor_table').DataTable().ajax.reload();
                    }
                });
            }
            else
            {
                alert("Please select atleast one checkbox");
            }
        }
    });
    });
    </script>
@endsection