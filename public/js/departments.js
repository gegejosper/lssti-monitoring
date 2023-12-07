$(document).ready(function() {
    $(document).on('click', '.add-department', function() {
        //debugger;
        $('#addDepartmentModal').modal('show');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-department', function() {
        $('#department_modify_id').val($(this).data('department_id'));
        $('#department_modify_status').val($(this).data('department_status'));
        $('#modifyDepartmentModal').modal('show');
    });
    $(document).on('click', '.edit-department', function() {
        $('#edit_department_name').val($(this).data('department_name'));
        $('#edit_department_code').val($(this).data('department_code'));
        $('#edit_department_id').val($(this).data('department_id'));
        $('#editDepartmentModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyDepartment', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/department/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'department_id': $('input[name=department_modify_id]').val(),
                'department_status': $('input[name=department_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyDepartmentModal').modal('toggle');
                $('#modifyDepartmentModalSuccess').modal('show');
                
            },
            
            error: function(data){
              var errors = data.responseJSON.errors;
              var errormessage = '';
              Object.keys(errors).forEach(function(key) {
                  errormessage += errors[key] + '<br />';
                  $('.errors').html('');
                  $('.errors').append(`
                  <div class="alert alert-danger" role="alert"> ${errormessage} </div>
                  `);
              });
            }
        });
    });


    
    $('.modal-footer').on('click', '#editDepartment', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/department/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'department_name': $('input[name=edit_department_name]').val(),
                  'department_code': $('input[name=edit_department_code]').val(),
                  'department_id': $('input[name=edit_department_id]').val()
              },
              success: function(data) {
                $('#editDepartmentModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td>${data.department_name} </td>
                    <td>
                        <strong>${data.department_code}</strong>
                    </td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0">
                   
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-department"
                        data-department_id="${data.id}"
                        data-department_name="${data.department_name}"
                        data-department_code="${data.department_code}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifydepartment${data.id}" class="btn btn-sm btn-warning modify-department"
                        data-department_id="${data.id}"
                        data-department_status="inactive">
                        <i class="far fa-eye-slash"></i>
                    </a>
                    
                    </td>
                </tr>
                `);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toastr-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                toastr.success("Department updated...");
              },
              
              error: function(data){
                var errors = data.responseJSON.errors;
                var errormessage = '';
                Object.keys(errors).forEach(function(key) {
                    errormessage += errors[key] + '<br />';
                    $('.errors').html('');
                    $('.errors').append(`
                    <div class="alert alert-danger" role="alert"> ${errormessage} </div>
                    `);
                });
              }
          });
    });
    
    $("#addDepartment").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/department/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'department_name': $('input[name=department_name]').val(),
                  'department_code': $('input[name=department_code]').val()
              },
              success: function(data) {
                $('#departmentTable').append(`
                    <tr class="row${data.id}">
                        <td>
                            <strong>${data.department_name}</strong>
                        </td>
                        <td>
                            <strong>${data.department_code}</strong>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                    
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-department"
                            data-department_id="${data.id}"
                            data-department_name="${data.department_name}"
                            data-department_code="${data.department_code}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifydepartment${data.id}" class="btn btn-sm btn-warning modify-department"
                            data-department_id="${data.id}"
                            data-department_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#department').val('');

                $('#addDepartmentModal').modal('toggle');
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toastr-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success("New Department added");
              },
              error: function(data){
                var errors = data.responseJSON.errors;
                var errormessage = '';
                Object.keys(errors).forEach(function(key) {
                    errormessage += errors[key] + '<br />';
                    $('.errors').html('');
                    $('.errors').append(`
                    <div class="alert alert-danger" role="alert"> ${errormessage} </div>
                    `);
                });
              }
  
          });
    });
   
  });
  