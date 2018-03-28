<?php
    session_start();
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";
    $id=$_POST['id'];
    $dir=$_POST['dir'];
    $type=$_POST['type'];
    $name=getNameFile($id, $type);
?>
<script type="text/javascript">
    $(document).ready(function(e){
        $("#btn-rename").click(function(e){
            var datakirim={
                file:$("#rename-file").val(),
                dir:$(this).attr("direction"),
                id:<?=$id?>
            };
            var datadir={
                dir:$(this).attr("direction"),
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/kirim/kirim.php?kirim=rename_file&type=<?=$type?>",
                timeout:10000,
                error:function(jqXHR, textStatus){
                    $('#modal-rename').modal('hide');
                    setTimeout(function(){
                        $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                        $('#modal-alert').modal('show');
                    },1000);
                },
                success:function(res){
                    $('#modal-rename').modal('hide');
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                    setTimeout(function(){
                        if(res==""){
                            $.ajax({
                                type:"POST",
                                data:datadir,
                                url:"module/folder/folder_content.php",
                                timeout:10000,
                                error: function(jqXHR, textStatus){
                                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                                    $('#modal-alert').modal('show');
                                },
                                success: function(response){
                                    $("#capacity-info").load("capacity.php");
                                    $("#content-folder").html(response);
                                }
                            });
                        }
                        else{
                            $("#alert-notice").html("<b class='text-waring'>ERROR </b> : "+res);
                            $('#modal-alert').modal('show');
                        }
                    },1000);
                    }
                }
            });
            $("#folder-name").val("");
        });
    })
    function getStatus(s){
        switch(s){
          case 0 :
            return "Network Problem";
            break;
          case 404 :
            return "Requested page not found.";
            break;
          case 500 :
            return "Internal Server Error ";
            break;
        
        }
    }
</script>
<div class="modal fade" id="modal-rename" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Rename Files</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="rename-file" class="control-label col-sm-3">Rename Files :</label> 
                            <div class="col-sm-9">
                                <input type="text" name="rename-file" id="rename-file" maxlength="115" class="form-control" value="<?php echo $name?>" />
                            </div>
                        </div>
                    </form>
                     
                </div>
            </div>
            <div class="modal-footer">
                <button direction='<?php echo $dir?>' type="button" class="btn btn-primary" data-dismiss="modal" id="btn-rename"><span class="glyphicon glyphicon-ok"></span> Confirm</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>