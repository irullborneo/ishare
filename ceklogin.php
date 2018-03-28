<?php
	$server = "localhost";
	$username = "root";
	$password = "P4ssw0rd-01";
	$database = "SDMS";

	
	mssql_connect("$server","$username","$password") or die ("<script>alert(\"Tidak Terkoneksi dengan Database\");</script>");
	mssql_select_db("$database") or die("<script>alert(\"Database Tidak Ada\");</script>");

	session_start();
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$queryceklogin=mssql_query("SELECT * FROM sysUser WHERE UserId='$username' AND password='$password'");

	$ceklogin=mssql_num_rows($queryceklogin);
	if($ceklogin==1){
		$user=mssql_fetch_array($queryceklogin);
		$_SESSION['id_user']=$user['UserId'];
		$_SESSION['name']=$user['FullName'];
	}
	else{
		echo "Username/password that you entry is invalid";
	}
?>