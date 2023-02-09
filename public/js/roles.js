$(document).ready(function() {

    $(document).on('click', '.add-role', function() {
        console.log('dsads');
        $('#addRoleModal').modal('show');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-role', function() {

        $('#id').val($(this).data('id'));
        $('#user_modify_id').val($(this).data('user_id'));
        $('#user_modify_status').val($(this).data('user_status'));
        $('#modifyuserModal').modal('show');
    });
    $('.modal-footer').on('click', '#modifyuser', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/accounts/users/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'user_id': $('input[name=user_modify_id]').val(),
                'user_status': $('input[name=user_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyuserModal').modal('toggle');
                $('#modifyuserSuccess').modal('show');
                
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
    
    $("#add_user").on('submit',function(event) {
        event.preventDefault();
        var role= [];
        $("input:checkbox[name=roles]:checked").each(function(){
            role.push($(this).val()); 
        });
        
        $("#loading_submit").css("display", "block");
        $('#adduser').attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: '/panel/accounts/users/add',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=name]').val(),
                    'email': $('input[name=email]').val(),
                    'username': $('input[name=username]').val(),
                    'password': $('input[name=password]').val(),
                    'roles': role
                },
              success: function(data) {
                $('#adduserModal').modal('toggle');
                $('#adduserModalSuccess').modal('show');
                $("#loading_submit").css("display", "none");
              },
              error: function(data){
                var errors = data.responseJSON.errors;
                var errormessage = '';
                $("#loading_submit").css("display", "none");
                $('#adduser').attr('disabled',false);
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
  