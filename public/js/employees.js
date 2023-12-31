const employeeList = document.querySelector('.employees-list');
const employeeSearchKey = document.getElementById('search_employees');
let url = '';
function buildEmployees(employees){
    //console.log(employees);
    if(employees.length != 0){
        let content = '';
        let status ='';
        employeeList.innerHTML = employees.map((employee, i) => {   
                if(employee.status === 'active'){
                    status = `
                    <a href="javascript:;" id="modifyemployee${employee.id}" class="btn btn-sm btn-warning modify-employee"
                        data-employee_id="${employee.id}"
                        data-employee_status="inactive">
                        <i class="far fa-eye-slash"></i>
                    </a>
                    `;
                }else {
                    status = `<a href="javascript:;" id="modifybank${employee.id}" class="btn btn-sm btn-info modify-employee"
                    data-employee_id="${employee.id}"
                    data-employee_status="active">
                    <i class="far fa-eye"></i>
                </a>`;
                }   
                
                content =  `
                <tr class="row${employee.id}">
                    <td>${employee.id_number}</td>
                    <td>
                        <a href="/panel/admin/employees/${employee.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${employee.lname}, ${employee.fname} ${employee.mname}</a>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${employee.position}</span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${employee.department}</span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${employee.status}</span>
                        
                    </td>
                    
                    <td class="pr-0 text-right">
                        <a href="/panel/admin/employees/${employee.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-employee"
                        data-employee_id="${employee.id}"
                        data-employee_id_number="${employee.id_number}"
                        data-employee_mname="${employee.mname}"
                        data-employee_fname="${employee.fname}"
                        data-employee_lname="${employee.lname}"
                        data-employee_position="${employee.position}"
                    ><i class="fas fa-pen"></i></a>
                   ${status}
                    </td>
                </tr>
                    `;
           
            return `${content}`;
        }).join('');  
    }
    else {
        employeeList.innerHTML = "<tr><td class='text-danger'><em>No results found...</em></td></tr>"; 
    }
}
function employeeSearch(){
    url = $('input[name=url]').val();
    $.ajax({
        type: 'post',
        url: '/panel/admin/employees/search',
        data: {
            '_token': $('input[name=_token]').val(),
            'search_query': $('input[name=search_employees]').val()
        },
        success: function(employees) {
            
            buildEmployees(employees);
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
}
employeeSearchKey.addEventListener('keyup', employeeSearch);
$(document).ready(function() {
    $(document).on('click', '.add-employee', function() {
        $('#addEmployeeModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-employee', function() {
        $('#employee_modify_id').val($(this).data('employee_id'));
        $('#employee_modify_status').val($(this).data('employee_status'));
        $('#modifyEmployeeModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyEmployee', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/employees/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'employee_id': $('input[name=employee_modify_id]').val(),
                'employee_status': $('input[name=employee_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyEmployeeModal').modal('toggle');
                $('#modifyEmployeeModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-employee', function() {
        $('#edit_employee_fname').val($(this).data('employee_fname'));
        $('#edit_employee_lname').val($(this).data('employee_lname'));
        $('#edit_employee_mname').val($(this).data('employee_mname'));
        $('#edit_employee_id_number').val($(this).data('employee_id_number'));
        $('#edit_employee_position').val($(this).data('employee_position'));
        $('#edit_employee_id').val($(this).data('employee_id'));
        $('#editEmployeeModal').modal('show');
    });
    $('.modal-footer').on('click', '#editEmployee', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/employees/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'employee_fname': $('input[name=edit_employee_fname]').val(),
                  'employee_mname': $('input[name=edit_employee_mname]').val(),
                  'employee_id_number': $('input[name=edit_employee_id_number]').val(),
                  'employee_lname': $('input[name=edit_employee_lname]').val(),
                  'employee_position': $('input[name=edit_employee_position]').val(),
                  'employee_department': $('select[name=edit_employee_department]').val(),
                  'employee_id': $('input[name=edit_employee_id]').val()
              },
              success: function(data) {
                $('#editEmployeeModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td>${data.id_number}</td>
                    <td>
                        <a href="/panel/admin/employees/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.lname}, ${data.fname} ${data.mname}</a>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.position}</span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.department}</span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                        
                    </td>
                    
                    <td class="pr-0 text-right">
                        <a href="/panel/admin/employees/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-employee"
                        data-employee_id="${data.id}"
                        data-employee_fname="${data.fname}"
                        data-employee_lname="${data.lname}"
                        data-employee_position="${data.position}"
                        data-department="${data.department}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifyemployee${data.id}" class="btn btn-sm btn-warning modify-employee"
                        data-employee_id="${data.id}"
                        data-employee_status="inactive">
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
                toastr.success("Employee updated...");
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
    
    $(document).on('submit', '#addEmployeeForm', function(e) {
        e.preventDefault();
          $.ajax({
              type: 'post',
              url: '/panel/admin/employees/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'employee_fname': $('input[name=employee_fname]').val(),
                  'employee_lname': $('input[name=employee_lname]').val(),
                  'employee_mname': $('input[name=employee_mname]').val(),
                  'employee_department': $('select[name=employee_department]').val(),
                  'employee_id_number': $('input[name=employee_id_number]').val(),
                  'employee_position': $('input[name=employee_position]').val()
              },
              success: function(data) {
                $('#employeeTable').append(`
                    <tr class="row${data.id}">
                        <td>${data.id_number}</td>
                        <td>
                            <a href="/panel/admin/employees/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.lname}, ${data.fname} ${data.mname} </a>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.position}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.department}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/employees/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-employee"
                            data-employee_id="${data.id}"
                            data-employee_id_number="${data.id_number}"
                            data-employee_mname="${data.mname}"
                            data-employee_fname="${data.fname}"
                            data-employee_lname="${data.lname}"
                            data-employee_position="${data.position}"
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifyemployee${data.id}" class="btn btn-sm btn-warning modify-employee"
                            data-employee_id="${data.id}"
                            data-employee_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#employee_id_number').val('');
                $('#employee_fname').val('');
                $('#employee_mname').val('');
                $('#employee_lname').val('');
                $('#addEmployeeModal').modal('toggle');
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
                toastr.success("Employee added");
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

  