<?php
	session_start();
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";
    $id=$_POST['id'];
    $type=$_POST['type'];

    function getExtension($str){

        $i = strrpos($str,".");
   		if (!$i) { return ""; } 

   		$l = strlen($str) - $i;
   		$ext = substr($str,$i+1,$l);
   		return $ext;
 	}
?>

<div class="modal fade" id="modal-view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-warning"><img src="<?php echo getIconDetail($type);?>" style="min-width: 20px; height: 30px; max-width:30px; min-height:20px" /> <?php echo getFile($id,"name_file") ?></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="alert-notice" style="overflow: auto;">
                <?php
                	if($type==2){
                		echo "
                		<div class='text-center' style='margin:20px 0'>
                			<img class='img' src='".getFile($id,"url")."' style=\"min-width: 350; height: 450px; max-width:450px; min-height:350\" />
                		</div>
                		";
                	}
                	else if($type==3){
                		$name=getFile($id,"name_file");
                		$ext=pathinfo( getFile($id,"name_file"), PATHINFO_EXTENSION );
                		if(in_array($ext,array("pdf","PDF"))){
                			echo "<div class='text-center' style='margin:20px 0'>
                			<embed src='drive/".getFile($id,"name_file")."' width=\"550\" height=\"600\"> </embed>
                			</div>";
                		}
                		else if(in_array($ext,array("doc","docx","DOC","DOCX"))){
                			echo "<div class='text-center' style='margin:20px 0'>
                			<object type=\"application/msword\" data='drive/".getFile($id,"name_file")."' width=\"550\" height=\"600\"></object>
                			</div>";
                		}
                		else if(in_array($ext,array("xls","xlsx","XLS","XLSX"))){
                			echo "<div class='text-center' style='margin:20px 0'>
                			<object type=\"application/vnd.ms-excel\" data='drive/".getFile($id,"name_file")."' width=\"550\" height=\"600\"></object>
                			</div>";
                		}
                		else if(in_array($ext,array("ppt","pptx","PPT","PPTX"))){
                			echo "<div class='text-center' style='margin:20px 0'>
                			<object type=\"application/vnd.ms-powerpoint\" data='drive/".getFile($id,"name_file")."' width=\"550\" height=\"600\"></object>
                			</div>";
                		}
                	}
                	else if($type==4){
                		echo "<div class='text-center' style='margin:20px 0'>
                			<object type=\"application/vnd.ms-powerpoint\" data='drive/".getFile($id,"name_file")."' width=\"550\" height=\"600\"></object>
                			</div>";
                	}
                	else if($type==5){
                		echo "<div class='text-left' style='padding: 10px;margin:20px 0; border:1px solid #000; border-radius:10px'>";
                		include  "../../drive/".getFile($id,"name_file");
                		echo "</div>";
                	}

                ?>
                </div>
            </div>
        </div>
    </div>
  </div>