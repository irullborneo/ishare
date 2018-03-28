<?php
	$type=$_GET['type'];
	$id=$_POST['id'];
	$file=$_POST['file'];
	$dir=$_POST['dir'];

	if(isset($file)){
		if($type==1){
			$cek=cekFolder($file, $dir, $_SESSION['id_user']);
			if($cek>0){
				echo "There is same File's name, use other name";
			}
			else{
				$berhasil=setFolderName($id, $file, $_SESSION['id_user']);
				if($berhasil){

				}
				else{
					echo "File Can't Rename. Please Try Again.";
				}
			}
			
		}
	}
	else{
		echo "File Name was Empty";
	}
?>