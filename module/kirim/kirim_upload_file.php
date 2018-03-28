<?php // You need to add server side validation and better error handling here
	function getExtension($str){

        $i = strrpos($str,".");
   		if (!$i) { return ""; } 

   		$l = strlen($str) - $i;
   		$ext = substr($str,$i+1,$l);
   		return $ext;
 	}
	$uploaddir = '../../drive/';
	$format= array("png", "gif", "PNG","GIF","jpg","jpeg","JPG","JPEG","pdf","PDF","doc","docx","DOC","DOCX","xls","xlsx","XLS","XLSX","ppt","pptx","PPT","PPTX","zip","ZIP","rar","RAR","txt","TXT");
	$formatgambar=array("png", "gif", "PNG","GIF","jpg","jpeg","JPG","JPEG");
	$formatdokumen=array("pdf","PDF","doc","docx","DOC","DOCX","xls","xlsx","XLS","XLSX","ppt","pptx","PPT","PPTX");
	$formatcompress=array("zip","ZIP","rar","RAR");
	$formattxt=array("txt","TXT");
	foreach($_FILES as $file){
		$filename=$file['name'];
		$ext = pathinfo( $filename, PATHINFO_EXTENSION );
		if(strlen($filename)){
			$i=getExtension($filename);
			if(in_array($i,$format)){
				if( $file['size'] < 15000000 ) {
					$getUkuran=getSizeNow($_SESSION['id_user']);
					$ukuran=$getUkuran+$file['size'];
					if($ukuran<500000000){
						$namafile=time()."-".$file['name'];
						$tmp=$file['tmp_name'];
						move_uploaded_file($tmp, $uploaddir.$namafile);
						echo $namafile;
						if(in_array($i,$formatgambar)){
							$kode_type=2;
						}
						else if(in_array($i,$formatdokumen)){
							$kode_type=3;
						}
						else if(in_array($i,$formatcompress)){
							$kode_type=4;
						}
						else if(in_array($i,$formattxt)){
							$kode_type=5;
						}
						$setfile=setFile($namafile, $kode_type, $_GET['folder'],$file['size']);
						if($setfile){

						}
						else{
							echo "error4";
						}
					}
					else{
						echo "error5";
					}
				}
				else{
					echo "error3";
				}
			}
			else{
				echo "error2";
			}
		}
		else{
			echo "error1";
		}
	}


?>