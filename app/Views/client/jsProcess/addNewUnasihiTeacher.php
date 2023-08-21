<script>
$(document).ready(function(){
    $("form#addunasihiteacher").on("submit", function(event){
        event.preventDefault();
        let form_data = $(this).serialize();

        $.ajax({
            "method" : "POST",
            "data" : form_data,
            "url" : "<?php echo base_url('/add/unasihi/teacher/') ?>",
            beforeSend(){
                $("#addTeacherModal").hide();
            },
            success :function(response){
                        Swal.fire({
                            position: 'middle',
                            icon: response.status,
                            text: response.message,//Teacher Inserted
                            showConfirmButton: true,
                            //timer: 1500
                            }).then(function(){
                                location.reload();
                            });
                //location.reload();
            },
            error :function(xhr, status, error){
                Swal.fire({
                            position: 'middle',
                            icon: 'error',
                            text: error,//Teacher Inserted
                            showConfirmButton: false,
                            timer: 1500
                            });
              }

        })
//%%%%%%%%%%%%%Thanks for your time %%%%%%%%%

    })
})
</script>