<?php
	$type=$_GET['type'];
	$id=$_POST['id'];
	$dir=$_POST['dir'];
	$folder=$_POST['folder'];

	if($type==1){
		if($folder==$id){
			echo "Can't Move file to this folder";
		}
		else{
			$berhasil=changeDir($id, $folder, $_SESSION['id_user']);
			if($berhasil){
				setModifiedFolder($id, $_SESSION['id_user']);
			}
			else{
				echo "File Can't move. please try again.";
			}
		}
	}

?>