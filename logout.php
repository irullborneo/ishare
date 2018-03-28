<?php
	session_start();
	unset($_SESSION['id_user']);
	unset($_SESSION['name']);
	session_destroy();
	header("Location: ./");
?>