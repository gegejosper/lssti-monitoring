$(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
    $("#item_pic").change(function() {
        readURL(this);
    });
    $(document).on('click', '.add-user', function() {
        //console.log('dsads');
        $('#adduserModal').modal('show');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-user', function() {

        $('#id').val($(this).data('id'));
        $('#user_modify_id').val($(this).data('user_id'));
        $('#user_modify_status').val($(this).data('user_status'));
        $('#modifyUserModal').modal('show');
    });
    $('.modal-footer').on('click', '#modifyuser', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/settings/users/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'user_id': $('input[name=user_modify_id]').val(),
                'user_status': $('input[name=user_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyUserModal').modal('toggle');
                $('#modifyUserModalSuccess').modal('show');
                // $('#modify-success').removeClass('alert-danger');
                // $('#modify-success').addClass('alert-success');
                // $('#modify-success').text('Successfully updated');
                // $('.modal-footer').toggle();
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
                url: '/panel/admin/settings/users/add',
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
  