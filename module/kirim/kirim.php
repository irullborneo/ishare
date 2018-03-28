<?php
	session_start();
	include"../../config/koneksi.php";
	include"../../config/tgl.php";
	include "../../config/fungsi.php";
	$kirim=$_GET['kirim'];
	switch($kirim){
		case "ceklogin" :
			include "kirim_ceklogin.php";
			break;

		case "newfolder" :
			include "kirim_new_folder.php";
			break;
			
		case "rename_file" :
			include "kirim_rename_file.php";
			break;

		case "delete_file" :
			include "kirim_delete_file.php";
			break;

		case "move_file" :
			include "kirim_move_file.php";
			break;

		case "send_file" :
			include "kirim_send_file.php";
			break;

		case "upload-file":
			include "kirim_upload_file.php";
			break;

		default :
			break;
	}
?>