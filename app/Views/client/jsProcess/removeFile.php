<script>
    $(document).ready(function () { });
    $(".removed_doc_ID").on('click', function () {
        const $docID = $(this).data('id1');
        const $who_deleted_id = $(this).data('id2');

        $.ajax({
            "url": "<?php echo base_url('/remove/file/'); ?>",
            "data": { id: $docID, deleted_by: $who_deleted_id },
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