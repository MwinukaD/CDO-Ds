<script>
    $(document).ready(function () { });
    $(".removed_student_id").on('click', function () {
        $studentID = $(this).attr('id');

        $.ajax({
            "url": "<?php echo base_url('/remove/student/'); ?>",
            "data": { id: $studentID },
            "method": "POST",
            beforeSend() {
                $(".student_school_id").hide();
            },

            success: function (response) {
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
                })

            }
        })
        //alert($schoolID);
    })


</script>