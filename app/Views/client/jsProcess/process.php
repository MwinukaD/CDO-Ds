<script>
  //UPDATING ACCOUNT PROFILE
     function updateProfileData(event){
        event.preventDefault();
        let data = $('form#profile_form').serialize();
        $.ajax({
          "type" : 'POST',
          "data" : data,
          "url" : "/update/profile/data",
          beforeSend(){
            $("#save_changes").text("Updating....");
            $("#save_changes").attr("disabled","disabled");
          },
          "success" : function(response){
            $("#save_changes").text("Save Changes");
            $("#save_changes").attr("disabled",false);
            if(response.success){
            Swal.fire({
                    position: 'middle',
                    icon: 'success',
                    text: response.success,//Login failed, credentials not correct
                    showConfirmButton: false,
                    timer: 1500
                    });
                  }else{
                    Swal.fire({
                    position: 'middle',
                    icon: 'error',
                    text: response.error,//Login failed, credentials not correct
                    showConfirmButton: false,
                    timer: 1500
                    });


                  }
          },
          "error" : function(xhr, status, error){
            $("#save_changes").text("Save Changes");
            $("#save_changes").attr("disabled",false);
            alert(error);
          }
        })  
      }


//ACCOUNT LOGIN PROCESS
function accountLogin(event){
    event.preventDefault();
        let formData = $("form#account_login").serialize();
        $.ajax({
            'url': "<?= base_url() ?>",
            'method':'POST',
            'data': formData,
            'dataType':'JSON',
            beforeSend(){
                $("#login").text("Processing...!");
                $("#login").attr('disabled','disabled');},
            'success':function(response){
                $("#login").text("Login");
                $("#login").attr('disabled',false);
                if(response.success){
                window.location.href="<?= base_url('home')?>";
                }else{
                    Swal.fire({
                    position: 'middle',
                    icon: 'error',
                    text: response.message,//Login failed, credentials not correct
                    showConfirmButton: false,
                    timer: 1500
                    });
                }
            },
            "error":function(xhr, status, error){
                Swal.fire({
                    position: 'middle',
                    icon: 'error',
                    text: error,//Login failed, Something is wrong
                    showConfirmButton: false,
                    timer: 1500
                    });
                $("#login").text("Login");
                $("#login").attr('disabled',false);
            }
        });
       
}


    </script>