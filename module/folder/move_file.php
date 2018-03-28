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
        $(".list-move").click(function(e){
            $("#folder-on").html($(this).attr("name-folder"));
            $("#btn-move").attr("id-folder",$(this).attr("id-folder"));
        });
        $("#btn-move").click(function(e){
            var datakirim={
                folder:$(this).attr("id-folder"),
                dir:$(this).attr("direction"),
                id:<?=$id?>
            };
            var datadir={
                dir:$(this).attr("direction"),
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/kirim/kirim.php?kirim=move_file&type=<?=$type?>",
                timeout:10000,
                error:function(jqXHR, textStatus){
                    $('#modal-move').modal('hide');
                    setTimeout(function(){
                        $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                        $('#modal-alert').modal('show');
                    },1000);
                },
                success:function(res){
                    $('#modal-move').modal('hide');
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
    });
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
<div class="modal fade" id="modal-move" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-move"></span> Move Files</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="move-file" class="control-label col-sm-3">Move To :</label> 
                            <div class="col-sm-9">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="fa fa-folder-open" id="folder-on"> 
                                    <?php
                                        if($dir=='0'){
                                            echo "Drive 0";
                                        } 
                                        else{
                                            echo getFolder($dir, "name_folder");
                                        }
                                        
                                    ?>
                                        </span><span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" style="max-height: 350px; overflow: auto;">
                                        <li><a href='#' class='list-move' id-folder='0' name-folder='Drive 0'><span class='fa fa-folder-open'></span> Drive 0</a>
                                        <ul>
                                    <?php
                                        $sql=mysql_query("SELECT * FROM folder WHERE id_induk='0' AND create_by='$_SESSION[id_user]' ORDER BY name_folder ASC");
                                        while($f=mysql_fetch_array($sql)){
                                            if($f['id']==$id){
                                                continue;
                                            }
                                            echo "<li><a href='#' class='list-move' id-folder='$f[id]' name-folder='$f[name_folder]'><span class='fa fa-folder-open'></span> $f[name_folder]</a>";
                                            $cekchild=mysql_num_rows(mysql_query("SELECT * FROM folder WHERE id_induk='$f[id]' AND create_by='$_SESSION[id_user]'"));
                                            if($cekchild>0){
                                                $txt="";
                                                echo findFolderChild($f['id'],$_SESSION['id_user'],$txt, $id);
                                            }
                                            echo "</li>";
                                        }
                                    ?>
                                        </ul>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button direction='<?php echo $dir?>' type="button" class="btn btn-primary" data-dismiss="modal" id="btn-move"><span class="glyphicon glyphicon-ok"></span> Confirm</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>