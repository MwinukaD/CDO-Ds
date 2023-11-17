<script>
    $(document).ready(function () { });
    $(".removedYW").on('click', function () {
        let ywID = $('.removedYW').attr('id');
        $.ajax({
            "url": "<?php echo base_url('/remove-yw/'); ?>",
            "data": { id: ywID },
            "method": "POST",
            beforeSend() {
                $(".removedYW").hide();
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

    })


</script>