<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "ishare";

	
	mysql_connect("$server","$username","$password") or die ("<script>alert(\"Tidak Terkoneksi dengan Database\");</script>");
	mysql_select_db("$database") or die("<script>alert(\"Database Tidak Ada\");</script>");
?>