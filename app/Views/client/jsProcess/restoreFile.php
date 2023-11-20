<script>
    $(document).ready(function () { });
    $(".removed_doc_ID").on('click', function () {
        let docID = $(this).data('id1');

        $.ajax({
            "url": "<?php echo base_url('/restore/file/'); ?>",
            "data": { id: docID },
            "method": "POST",
            beforeSend() {
                $(".removed_doc_ID").attr('disabled', 'disabled');
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
                }).then(function () {
                    location.reload();
                })

            }
        })

    })


</script>