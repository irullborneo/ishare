<style type="text/css">
    .btn-toolbar{
        margin: 0 5px;
    }
    .list-active{
        background-color:#E6E9ED;
    }
    .list-files{
        cursor: pointer;
    }
</style>
<?php
session_start();
?>
<script type="text/javascript">
    $(document).ready(function(e){
        $(".list-files").click(function(e){
            $(".list-files").removeClass("list-active");
            $(".list-file").removeClass("list-active");
            $(this).addClass("list-active");
            $("#toolbar-rename").attr("id-file",$(this).attr("id-file"));
            $("#toolbar-rename").attr("id-type",$(this).attr("id-type"));
            $("#toolbar-delete").attr("id-file",$(this).attr("id-file"));
            $("#toolbar-delete").attr("id-type",$(this).attr("id-type"));
            $("#toolbar-move").attr("id-file",$(this).attr("id-file"));
            $("#toolbar-move").attr("id-type",$(this).attr("id-type"));
            $("#toolbar-mail").attr("id-file",$(this).attr("id-file"));
            $("#toolbar-mail").attr("id-type",$(this).attr("id-type"));
            var datakirim={
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type"),
            }
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/file_detail.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#detail-file").html(response);
                    }
                }
            });
        });

        $(".list-file").click(function(e){
            $(".list-files").removeClass("list-active");
            $(".list-file").removeClass("list-active");
            $(this).addClass("list-active");
            $("#toolbar-download").removeClass("disabled");
            $("#toolbar-delete").removeClass("disabled");
            $("#toolbar-mail").removeClass("disabled");
            $("#toolbar-move").addClass("disabled");
            $("#toolbar-rename").addClass("disabled");

            $("#toolbar-delete").attr("id-file",$(this).attr("id-file"));
            $("#toolbar-delete").attr("id-type",$(this).attr("id-type"));
            $("#toolbar-mail").attr("id-file",$(this).attr("id-file"));
            $("#toolbar-mail").attr("id-type",$(this).attr("id-type"));

            var datakirim={
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type"),
            }
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/getUrl.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#toolbar-download").attr("href",response);
                    }
                }
            });

            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/file_detail.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#detail-file").html(response);
                    }
                }
            });

        });

        $(".list-file").mouseover(function(e){
            var datakirim={
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type"),
            }
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/view.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#palace-view").html(response);
                    }
                }
            });
        });

        $(".list-file").dblclick(function(e){
            $("#modal-view").modal("show");
        });

        $(".list-files").dblclick(function(){
            var datakirim={
                dir:$(this).attr("id-file"),
            }
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/folder_content.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#content-folder").html(response);
                    }
                }
            });
        });

        $(".toolbar-trigger").click(function(e){
            $("#toolbar-delete").removeClass("disabled");
            $("#toolbar-move").removeClass("disabled");
            $("#toolbar-rename").removeClass("disabled");
            $("#toolbar-mail").removeClass("disabled");
            $("#toolbar-download").addClass("disabled");
        });

        $('[data-toggle=offcanvas]').click(function () {
            $('.row-offcanvas').toggleClass('active');
            $(this).toggleClass('fa-angle-double-left fa-angle-double-right');
        });

        $("#drive-0").click(function(e){
            $.ajax({
                type:"POST",
                url:"module/folder/folder_content.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#content-folder").html(response);
                    }
                }
            });
        });

        $(".breadcrumb-click").click(function(e){
            var datakirim={
                dir:$(this).attr("breadcrumb-id"),
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/folder_content.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#content-folder").html(response);
                    }
                }
            });
        });

        $("#toolbar-delete").mouseover(function(e){
            var datakirim={
                dir:$(this).attr("direction"),
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type")
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/delete_file.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#palace-delete").html(response);
                    }
                }
            });
        });

        $("#toolbar-move").mouseover(function(e){
            var datakirim={
                dir:$(this).attr("direction"),
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type")
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/move_file.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                       $("#palace-move").html(response);
                    }
                }
            });
        });

        $("#toolbar-rename").mouseover(function(e){
            var datakirim={
                dir:$(this).attr("direction"),
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type")
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/rename_file.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#palace-rename").html(response);
                    }
                }
            });
        });

        $("#toolbar-mail").mouseover(function(e){
            var datakirim={
                dir:$(this).attr("direction"),
                id:$(this).attr("id-file"),
                type:$(this).attr("id-type")
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/folder/mail_file.php",
                timeout:10000,
                error: function(jqXHR, textStatus){
                    $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                    $('#modal-alert').modal('show');
                },
                success: function(response){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                        $("#capacity-info").load("capacity.php");
                        $("#palace-mail").html(response);
                    }
                }
            });
        });

        $(".btn-toolbar").click(function(e){
            var id=$(this).attr("id");
            id=id.split("-");
            if(id[1]=="folder"){
                $("#folder-name").focus();
            }
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
<?php
    
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";

    if(isset($_POST['dir'])){
        $dir="direction='$_POST[dir]'";
        $id_induk=$_POST['dir'];
    }
    else{
        $dir="direction='0'";
        $id_induk=0;
    }
?>
<div class="panel-heading">
        
    <table cellpadding="0" cellspacing="0">
        <tbody>
           <tr>
                <td><h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a></h3></td>
                <td><button type="button" id="toolbar-folder" class="btn btn-sm btn-toolbar btn-success" data-toggle="modal" data-target="#modal-folder"><span class="fa fa-folder"></span> Create Folder</button></td>
                <td><button type="button" id="toolbar-file" class="btn btn-sm btn-toolbar btn-success" data-toggle="modal" data-target="#modal-file"><span class="glyphicon glyphicon-plus"></span> Add Files</button></td>
                <td><button <?php echo $dir ?> type="button" id="toolbar-delete" class="btn btn-sm btn-toolbar btn-danger disabled" data-toggle="modal" data-target="#modal-delete"><span class="fa fa-trash"></span> Delete</button></td>
                <td><button <?php echo $dir ?> type="button" id="toolbar-move" class="btn btn-sm btn-toolbar btn-info disabled" data-toggle="modal" data-target="#modal-move"><span class="glyphicon glyphicon-move"></span> Move</button></td>
                <td><button <?php echo $dir ?> type="button" id="toolbar-rename" class="btn btn-sm btn-toolbar btn-info disabled" data-toggle="modal" data-target="#modal-rename"><span class="glyphicon glyphicon-edit"></span> Rename</button></td>
                <td><a id="toolbar-download" class="btn btn-sm btn-toolbar btn-primary disabled"><span class="glyphicon glyphicon-download"></span> Download</a></td>
                <td><button <?php echo $dir ?> type="button" id="toolbar-mail" class="btn btn-sm btn-toolbar btn-primary disabled" data-toggle="modal" data-target="#modal-mail"><span class="fa fa-envelope-o"></span> Send Mail</button></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="panel-body">
    <div class="content-row">
        <div class="row" style="margin-top: -15px">
            <div class="col-sm-9" style="padding-top: 15px">
                <ol class="breadcrumb" style="background-color: #fff;">
                    <li><a href="#" id='drive-0'>Drive 0</a></li>
                    <?php
                        $batasbread=$id_induk;
                        $idbreadcrumb='';
                        if($batasbread!="0"){
                            $true=true;
                            while($true){
                                $cariid=mysql_fetch_array(mysql_query("SELECT id_induk FROM folder WHERE id='$batasbread'"));
                                $idbreadcrumb.=$batasbread."-";
                                $batasbread=$cariid[0];
                                if($batasbread=="0"){
                                    $true=false;
                                }
                            }
                        }
                        
                            
                        $idbred=explode("-",$idbreadcrumb);
                        for($i=count($idbred)-2;$i>=0;$i--){
                            echo "<li><a href='#' class='breadcrumb-click' breadcrumb-id='$idbred[$i]'>".getFolder($idbred[$i], "name_folder")."</a></li>";
                        }
                        
                    ?>
                </ol>
                <table class="table table-hover">
                    <thead style="background-color: #E6E9ED">
                        <tr>
                            <th class="col-md-5">Name</th>
                            <th>Date Create</th>
                            <th>Date Modified</th>
                            <th>Type</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $getFolder=getDirFolderSource("1", $id_induk, $_SESSION['id_user']);
                            while($folder=mysql_fetch_array($getFolder)){
                                $getIcon=getIcon($folder[2]);
                                echo"
                                    <tr class='list-files toolbar-trigger' id-file='$folder[0]' id-type='$folder[2]'>
                                        <td>$getIcon $folder[1]</td>
                                        <td>$folder[5]</td>
                                        <td>$folder[7]</td>
                                        <td>".getTypeFile($folder[2])."</td>
                                        <td>-</td>
                                    </tr>
                                ";
                            }
                           $getfile=getDirFileSource($id_induk, $_SESSION['id_user']);
                           while($file=mysql_fetch_array($getfile)){
                            $getIcon=getIcon($file[2]);
                                echo "
                                    <tr class='list-file' id-file='$file[0]' id-type='$file[2]' style='cursor:pointer'>
                                        <td>$getIcon $file[1]</td>
                                        <td>$file[8]</td>
                                        <td>-</td>
                                        <td>".getTypeFile($file[2])."</td>
                                        <td>".getSizeFile($file[0])."</td>
                                    </tr>
                                ";
                           }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="col-sm-3" style="padding-top: 15px; border-left: 3px solid #E6E9ED; min-height: 455px;" id="detail-file">
                
            </div>
        </div>
    </div><!--END OF CONTENT-->
</div>

<!-- START : Modal Create Folder-->
<script type="text/javascript">
    $(document).ready(function(e){
        $("#btn-folder").click(function(e){
            var datakirim={
                folder:$("#folder-name").val(),
                dir:$(this).attr("direction")
            };
            $.ajax({
                type:"POST",
                data:datakirim,
                url:"module/kirim/kirim.php?kirim=newfolder&aksi=tambah",
                timeout:10000,
                error:function(jqXHR, textStatus){
                    $('#modal-folder').modal('hide');
                    setTimeout(function(){
                        $("#alert-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
                        $('#modal-alert').modal('show');
                    },1000);
                },
                success:function(res){
                    var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
                    $('#modal-folder').modal('hide');
                    setTimeout(function(){
                        if(res==""){
                            $.ajax({
                                type:"POST",
                                data:datakirim,
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
</script>
<div class="modal fade" id="modal-folder" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="fa fa-folder"></span> Create Folder</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" class="form-horizontal">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="folder-name" class="control-label col-sm-3">Folder Name :</label> 
                            <div class="col-sm-9">
                                <input type="text" name="folder-name" id="folder-name" maxlength="115" class="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button <?php echo $dir ?> type="button" class="btn btn-primary" id="btn-folder"><span class="fa fa-save"></span> Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- END : Modal Create Folder-->

<!-- START : Modal Add Files-->
<script type="text/javascript">
     $(document).ready(function(e) { 
        var options={
            beforeSend: function(){
                var id=$("#btn-file").attr("id-upload");
                $("#list-upload").append("<li class=\"list-group-item text-left\" id='progress-"+id+"'><img src='asset/img/loader.gif' style='width:100%; height:20px' /></li>");
            
            },
            success:function(response) {
                var id=$("#btn-file").attr("id-upload");
                if(response=="error1"){
                    $("#progress-"+id).empty();
                    $("#progress-"+id).html("<div class='alert alert-danger'><strong>ERROR : </strong> There is no file</div>");
                }
                else if(response=="error2"){
                    $("#progress-"+id).empty();
                    $("#progress-"+id).html("<div class='alert alert-danger'><strong>ERROR : </strong> This file type can't upload</div>");
                }
                else if(response=="error3"){
                    $("#progress-"+id).empty();
                    $("#progress-"+id).html("<div class='alert alert-danger'><strong>ERROR : </strong> The file size is more than 50MB</div>");
                }
                else if(response=="error4"){
                    $("#progress-"+id).empty();
                    $("#progress-"+id).html("<div class='alert alert-danger'><strong>ERROR : </strong> System can't upload this file</div>");
                }
                else if(response=="error5"){
                    $("#progress-"+id).empty();
                    $("#progress-"+id).html("<div class='alert alert-danger'><strong>ERROR : </strong> Capacity is full</div>");
                }
                else{
                    $("#progress-"+id).html(response);
                }
                id++;
                $("#btn-file").attr("id-upload",id);
            }
        };
        var iduser="<?=$_SESSION['id_user']?>";
                    if(iduser==""){
                        $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                        $('#modal-alert').modal('show');
                        setTimeout(function(){
                            window.location="./";
                        },2000);

                    }
                    else{
        $("#fileform").ajaxForm(options);

        $("#id-close-file").click(function(e){
            var iduser="<?=$_SESSION['id_user']?>";
            if(iduser==""){
                $("#alert-notice").html("<b class='text-waring'>ERROR</b> : You're Not Login.");
                $('#modal-alert').modal('show');
                setTimeout(function(){
                    window.location="./";
                },2000);

            }
            else{
            var datakirim={
                    dir:$("#btn-file").attr("direction")
                };
            $("#modal-file").modal('hide');
            setTimeout(function(){
                $.ajax({
                    type:"POST",
                    data:datakirim,
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
                        
            },1000);
            }

        });
        }
     });
</script>
<div class="modal fade" id="modal-file" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Files</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="fileform" method="post" enctype="multipart/form-data" action='module/kirim/kirim.php?kirim=upload-file&folder=<?=$id_induk?>'>
                        <div class="alert alert-warning">
                            <strong>Note : </strong> The File that can upload is just document, compress zip, and picture. The size must less than 15MB
                        </div>
                        <h4 style="margin:0;padding:0">Select Files From Your Computer</h4>
                        <div id='filebutton' style="margin-top: 10px">
                            <input type="file" name="file" id="file" multipart />
                        </div>
                        <div style="margin: 10px 0">
                            <button <?php echo $dir ?> id-upload="1" type="submit" class="btn btn-primary" id="btn-file"><span class=" glyphicon glyphicon-upload"></span> Upload</button>
                        </div>
                    </form>

                    
                </div>
            </div>
            <div class="modal-footer">
                <ul class="list-group" id="list-upload">
                        
                </ul>
                <button type="button" class="btn btn-danger" id="id-close-file"><span class="glyphicon glyphicon-remove" ></span> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END : Modal Add Files-->

<!-- START : Modal Delete Files-->
<div id="palace-delete"></div>
<!-- END : Modal Delete Files-->

<!-- START : Modal Move Files-->
<div id="palace-move"></div>
<!-- END : Modal Move Files-->

<!-- START : Modal Rename Files-->
<div id="palace-rename"></div>
<!-- END : Modal Rename Files-->

<!-- START : Modal Rename Files-->
<div id="palace-mail"></div>
<!-- END : Modal Rename Files-->

<div id="palace-view"></div>


<div class="modal fade" id="modal-alert" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-warning"><span class="glyphicon glyphicon-alert"></span> ALERT</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="alert-notice">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary " data-dismiss="modal"><span class=" glyphicon glyphicon-ok"></span> OK</button>
            </div>
        </div>
    </div>
  </div>