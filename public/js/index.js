const customerInfoContainer = document.getElementById('customerInfo');

const employeesList = document.querySelector('.employees-list');

function buildEmployee(employees){
    if(employees.length != 0){
        employeesList.innerHTML = employees.map((customer, i) => {
            return `
            <tr>
            <td>${customer.last_name}, ${customer.first_name}</td>
            <td style="max-width:250px;">${customer.address}, ${customer.brgy}, ${customer.city_num}</td>
            <td>
                <a href="javascript:;" 
                    class="btn btn-icon btn-primary add_customer"
                    data-customer_id="${customer.id}"
                    data-customer_name="${customer.last_name}, ${customer.first_name}"
                    data-customer_address="${customer.address}"
                    data-customer_points="${customer.points}"
                    ><i class="fa fa-plus"></i></a>
            </td>
            </tr>
              `;
        }).join('');  
    }
    else {
        employeesList.innerHTML = "<tr><td class='text-danger'><em>No results found...</em></td></tr>"; 
    }
}

function searchScanEmployee(employee_id){
    //console.log('I am working');
    $.ajax({
        type: 'get',
        url: '/panel/employee/scan/' + employee_id,
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

});
// Scanning Customer

function onScanSuccess(decodedText, decodedResult) {
    //console.log(`Scan result: ${decodedText}`, decodedResult);
    searchScanCustomers(decodedText);
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
//html5QrcodeScanner.render(onScanSuccess);
const html5QrCode = new Html5Qrcode(/* element id */ "reader");
function initializeScan(){
    html5QrcodeScanner.render(onScanSuccess);
};

//scan_customer.addEventListener('click', initializeScan);
populateOrdersList(ordersParse, ordersList);