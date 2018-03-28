<script type="text/javascript">
    $(document).ready(function(e){
        $.ajax({
            type:"POST",
            url:"module/folder/folder_content.php",
            timeout:10000,
            error: function(jqXHR, textStatus){
                alert(textStatus);
            },
            success: function(response){
                $("#content-folder").html(response);
            }
        });
    })
</script>
<div class="panel panel-default" id="content-folder" style="min-height: 455px;">
    
</div>