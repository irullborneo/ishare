<?php
    session_start();
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";
    $id=$_POST['id'];
    $dir=$_POST['dir'];
    $type=$_POST['type'];
?>
<script type="text/javascript">
    $(document).ready(function(e){
        $("#btn-mail").click(function(e){
            var datakirim={
                subject:$("#subject-mail").val(),
                dir:$(this).attr("direction"),
                id:<?=$id?>
            };
            var datadir={
                dir:$(this).attr("direction"),
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/kirim/kirim.php?kirim=send_file&type=<?=$type?>",
                timeout:10000,
                error:function(jqXHR, textStatus){
                    $('#modal-mail').modal('hide');
                    setTimeout(function(){
                        $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                        $('#modal-alert').modal('show');
                    },1000);
                },
                success:function(res){
                    $('#modal-mail').modal('hide');
                    window.location=res;
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
<div class="modal fade" id="modal-mail" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="fa fa-envelope-o"></span> Send Mail</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="subject-mail" class="control-label col-sm-3">Subject :</label> 
                            <div class="col-sm-9">
                                <input type="text" name="subject-mail" id="subject-mail" maxlength="115" class="form-control" autocomplete='off' />
                            </div>
                        </div>
                    </form>
                     
                </div>
            </div>
            <div class="modal-footer">
                <button direction='<?php echo $dir?>' type="button" class="btn btn-primary" data-dismiss="modal" id="btn-mail"><span class="glyphicon glyphicon-send"></span> Send</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>