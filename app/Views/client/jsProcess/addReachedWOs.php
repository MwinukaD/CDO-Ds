<script>
    $("#wardForm").on('submit',(event)=>{
        event.preventDefault();
        let formData = $('#wardForm').serialize();

        $.ajax({
            'url' : '<?= base_url('/submit/WO/data/') ?>',
            'method' : 'POST',
            'data' : formData,
            'success' : function(response){
                Swal.fire({
                    position: 'middle',
                    icon: response.status,
                    text: response.message,//Teacher Inserted
                    showConfirmButton: true,
                    //timer: 1500
                }).then(function(){
                    location.reload();
                });
            },
            'error' : function (xhr, status, error){
                Swal.fire({
                    position: 'middle',
                    icon: response.status,
                    text: response.message,//Teacher Inserted
                    showConfirmButton: true,
                    //timer: 1500
                });
            }
        });


    });


</script>