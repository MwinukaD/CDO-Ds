
<script>
//$(documen)
   function clientSignupForm(event){
        event.preventDefault();
        //Get the inputs from the signup form
        var data = {
            'fullname':$('.fullname').val(),
            'email':$('.email').val(),
            'password1':$('.password1').val(),
            'password2':$('.password2').val(),
        }
        $.ajax({
            type:'POST',
            url:'/client/signup',
            data: data,
            //beforeSend(){
                //$("#client-signup-button").attr('Loading...!');
            //},
            success:function(response){
                $("#clientSignupForm").find('input').val('');
                //$("#client-signup-button").attr('Submit');
                alert(response);
            },
            error:function(xhr, status, error){
                alert(error);

            }
        })
        //alert('Default Submission has been stoped');
    

   }
     
</script>