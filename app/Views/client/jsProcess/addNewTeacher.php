<script>
    $("#schoolForm").on('submit', function (event) {
        event.preventDefault();
        const data = $(this).serialize();
        // alert(data);
        $.ajax({
            "method": "POST",
            "data": data,
            "url": "<?php echo base_url('/add/teacher/') ?>",
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