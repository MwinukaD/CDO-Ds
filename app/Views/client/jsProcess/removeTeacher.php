<script>
    $(document).ready(function () { });
    $(".removed_teacher").on('click', function () {
        $teacherID = $(this).attr('id');

        $.ajax({
            "url": "<?php echo base_url('/remove/teacher/'); ?>",
            "data": { id: $teacherID },
            "method": "POST",
            beforeSend() {
                $(".removed_teacher").hide();
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