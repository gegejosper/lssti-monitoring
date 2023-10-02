const customerInfoContainer = document.getElementById('customerInfo');

const employeesList = document.querySelector('.employees-list');

function buildEmployee(employees){
    if(employees.length != 0){
        const employee = employees[0];
        $('#employeeModalSearch').modal('hide');
        $('#employee_id_number').val(employee.id_number);
        $('#employee_name').val(employee.lname + ', ' + employee.fname);
        $('#employee_id').val(employee.id);
        $('#employeeLogModal').modal('show');
        // employeesList.innerHTML = employees.map((employee, i) => {
        //     $('#employeeModalSearch').modal('toggle');
        //     $('#employee_id_number').val(employee.id_number);
        //     $('#employee_name').val(employee.lname +', '+ employee.fname);
        //     $('#employee_id').val(employee.id);
        //     $('#employeeLogModal').modal('show');
        // });
            //     return `
        //     <tr>
        //     <td>${employee.id_number}</td>
        //     <td>${employee.lname}, ${employee.fname}</td>
           
        //     <td>
        //         <a href="javascript:;" 
        //             class="btn btn-icon btn-primary add_employee_log"
        //             data-employee_id="${employee.id}"
        //             data-employee_id_number="${employee.id_number}"
        //             data-employee_name="${employee.lname}, ${employee.fname}"
        //             ><i class="fa fa-forward"></i></a>
        //     </td>
        //     </tr>
        //       `;
        // }).join('');  
    }
    else {
        employeesList.innerHTML = "<tr><td class='text-danger'><em>No results found...</em></td></tr>"; 
    }
}

function searchScanEmployee(employee_id){
    //console.log('I am working');
    $.ajax({
        type: 'get',
        url: '/scan/employee/' + employee_id,
        data: {
            'employee_id': employee_id
        },
        success: function(employees) {
            //console.log(customers);
            buildEmployee(employees);
            
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

$(document).ready(function() {
    $(document).on('click', '#search_employee_modal', function() {
        initializeScan();
        $('#employeeModalSearch').modal('show');
    });
    $(document).on('click', '#visitor_logbook', function() {
        $('#visitorsLogModal').modal('show');
    });
    $(document).on('click', '.return_employee', function() {
        $.ajax({
            type: 'post',
            url: '/employee/return',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).data('log_id')
            },
            success: function(data) {
                // Replace 'totalSeconds' with the number of seconds you want to convert
                let totalSeconds = data.time_consumed; // Example: 3600 seconds = 1 hour
                console.log(data.time_consumed);
                // Calculate hours and remaining seconds
                let hours = Math.floor(totalSeconds / 3600);
                let remainingSeconds = totalSeconds % 3600;

                // Format the result as "X hours Y minutes Z seconds"
                let result = hours + ' hours ' + Math.floor(remainingSeconds / 60) + ' minutes ' + (remainingSeconds % 60) + ' seconds';

                // Update the HTML element with the result
            $("#row_time_back_"+data.id).text(data.time_back);
            $("#row_time_consumed_"+data.id).text(result);
            $("#row_status_"+data.id).text(data.status);
            $("#row_action_"+data.id).text('');
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
              toastr.success("Employee's returned...");
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
    $(document).on('click', '.add_employee_log', function() {
        $('#employeeModalSearch').modal('toggle');
        $('#employee_id_number').val($(this).data('employee_id_number'));
        $('#employee_name').val($(this).data('employee_name'));
        $('#employee_id').val($(this).data('employee_id'));
        $('#employeeLogModal').modal('show');
    });
    $("#visitors_log_form").on('submit',function(event) {
        event.preventDefault();
        $('#save_record').attr('disabled','disabled');
        $.ajax({
            type: 'post',
            url: '/save/record',
            data: {
                '_token': $('input[name=_token]').val(),
                'fname': $('input[name=visitors_fname]').val(),
                'lname': $('input[name=visitors_lname]').val(),
                'contact_number': $('input[name=contact_number]').val(),
                'address': $('input[name=address]').val(),
                'purpose': $('input[name=purpose]').val()
            },
            success: function(data) {
            $('#save_record').attr('disabled',false);
              $('#visitors-table').prepend(`
                  <tr class="row${data.id}">
                      <td>${data.time_visit}</td>
                      <td>
                          ${data.lname}, ${data.fname}
                      </td>
                      <td>
                          ${data.contact_number}
                      </td>
                      <td>
                          ${data.address}
                      </td>
                      <td>${data.purpose}
                      </td>
                  </tr>
              `);
              $('#visitors_fname').val('');
              $('#visitors_lname').val('');
              $('#contact_number').val('');
              $('#address').val('');
              $('#purpose').val('');
              $('#visitorsLogModal').modal('toggle');
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
              toastr.success("Visitor's Info recorded...");
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
    $("#employees_log_form").on('submit',function(event) {
        event.preventDefault();
        $('#save_employee_log').attr('disabled','disabled');
        $.ajax({
            type: 'post',
            url: '/save/employee/log',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('input[name=employee_id]').val(),
                'purpose': $('input[name=employee_purpose]').val()
            },
            success: function(data) {
                

            $('#save_employee_log').attr('disabled',false);
            $('#employee-tab').click();
              $('#employees-table').prepend(`
                  <tr class="row${data.id}">
                      <td>${data.time_out}</td>
                      <td id="row_time_back_${data.id}">${data.time_back}</td>
                      <td id="row_time_consumed_${data.id}">${data.time_consumed}</td>
                      <td>
                          ${data.name}
                      </td>
                      <td>
                          ${data.purpose}
                      </td>
                      <td id="row_status_${data.id}">
                          ${data.status}
                      </td>
                      <td id="row_action_${data.id}">
                        <a href="javascript:;" 
                                class="btn btn-icon btn-primary return_employee"
                                data-log_id="${data.id}"
                                ><i class="fa fa-reply"></i></a>
                        </td>
                  </tr>
              `);
              $('#employee_id').val('');
              $('#employee_name').val('');
              $('#employee_id_number').val('');
              $('#employee_purpose').val('');
              $('#employeeLogModal').modal('toggle');
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
              toastr.success("Employee's log recorded...");
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
// Scanning Customer

function onScanSuccess(decodedText, decodedResult) {
    console.log(`Scan result: ${decodedText}`, decodedResult);
    searchScanEmployee(decodedText);
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
//html5QrcodeScanner.render(onScanSuccess);
const html5QrCode = new Html5Qrcode(/* element id */ "reader");
function initializeScan(){
    html5QrcodeScanner.render(onScanSuccess);
};

//scan_customer.addEventListener('click', initializeScan);
//populateOrdersList(ordersParse, ordersList);