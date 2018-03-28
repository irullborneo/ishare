<?php
	session_start();
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";

	$id=explode("-",$_GET['id']);
	$download=$_GET['download'];
	switch ($download) {
		case 'file':
			include "download_file.php";
			break;
		
		case 'folder':
			include "download_folder.php";
			break;

		case 'url':
			include "download_url.php";
			break;
	}
?>
