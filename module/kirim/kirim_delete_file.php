<?php
	$type=$_GET['type'];
	$id=$_POST['id'];
	$dir=$_POST['dir'];

	if($type==1){
		$berhasil=mysql_query("DELETE FROM folder WHERE id='$id' AND create_by='$_SESSION[id_user]'");
		$sqli=mysql_query("SELECT url FROM file WHERE id_induk='$id' AND download_by='$_SESSION[id_user]'");
		while($data=mysql_fetch_array($sqli)){
			unlink("../../".$data[0]);
		}
		mysql_query("DELETE FROM file WHERE id_induk='$id' AND download_by='$_SESSION[id_user]'");
		$cekanak=mysql_num_rows(mysql_query("SELECT * FROM folder WHERE id_induk='$id'"));
		if($cekanak>0){
			$sql=mysql_query("SELECT * FROM folder WHERE id_induk='$id'");
			while($f=mysql_fetch_array($sql)){
				deleteFolder($f['id']);
			}	
		}
	}
	else{
		$sql=mysql_query("SELECT url FROM file WHERE id='$id' AND download_by='$_SESSION[id_user]'");
		$data=mysql_fetch_array($sql);
		unlink("../../".$data[0]);
		mysql_query("DELETE FROM file WHERE id='$id' AND download_by='$_SESSION[id_user]'");
	}

?>