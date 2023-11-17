<script>
    $("#update_wo_data").on('submit', function(event){
        event.preventDefault();

        let formData = $('#update_wo_data').serialize();
        $.ajax({
            'url' : '<?= base_url('/yw/editing/') ?>',
            'data' : formData,
            'method' : 'POST',
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



    })


</script>