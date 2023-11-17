<script>
    $(document).ready(function () { });
    $(".removed_ward_officer").on('click', function () {
        var $officerID = $(this).attr('id');
        $.ajax({
            "url": "<?php echo base_url('/remove-officer/'); ?>",
            "data": { id: $officerID },
            "method": "POST",
            beforeSend() {
                $(".removed_ward_officer").hide();
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


        //alert($officerID);
    })


</script>