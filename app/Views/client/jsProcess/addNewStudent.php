<script>
    $("#schoolForm").on('submit',(event)=>{
        event.preventDefault();
        const formData = $("#schoolForm").serialize();
        $.ajax({
            "method": "POST",
            "data": formData,
            "url": "<?php echo base_url('/add/student/') ?>",
            beforeSend() {
                $("#addSchoolModal").hide();
                $("#add_SchoolButton").hide();
            },
            success: function (response) {
                $("#add_SchoolButton").show();
                Swal.fire({
                    position: 'middle',
                    icon: response.status,
                    text: response.message,//Teacher Inserted
                    showConfirmButton: true,
                    //timer: 1500
                }).then(function () {
                    location.reload();
                });

            },
            error: function (xhr, status, error) {
                Swal.fire({
                    position: 'middle',
                    icon: error,
                    text: error,//Teacher Inserted
                    showConfirmButton: true,
                    //timer: 1500
                }).then(function () {
                    location.reload();
                });

            }
        })
    })
</script>