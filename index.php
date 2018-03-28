<?php
	session_start();
	if(isset($_SESSION['id_user']) || isset($_GET['download'])){
		$id_user=$_SESSION['id_user'];
		require "halaman.php";
	}
	else{
		require "login.php";
	}
	
?>