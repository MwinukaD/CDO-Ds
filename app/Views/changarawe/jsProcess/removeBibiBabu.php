<script>
    $(document).ready(function () { });
    $(".deleted_bibibabu").on('click', function () {
        const $bibibabuID = $(this).data('id1');
        const $deleted_by = $(this).data('id2');

        $.ajax({
            "url": "<?php echo base_url('/delete/bibibabu/'); ?>",
            "data": { id: $bibibabuID, deleted_by: $deleted_by },
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
                }).then(function () {
                    location.reload();
                })

            }
        })
    })
</script>