<script>
$(".clicked_project").on("click",function(){
   let projectID = $(this).attr("id");
   $.ajax({
    "type" : "POST",
    "url" : "/project/data/",
    "data" : projectID,
    success :function(){
        
    }
   })

})
    
</script>