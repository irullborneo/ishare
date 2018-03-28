<?php
	session_start();
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$queryceklogin=mysql_query("SELECT * FROM user WHERE email='$username' AND password='$password'");
	$ceklogin=mysql_num_rows($queryceklogin);
	if($ceklogin==1){
		$user=mysql_fetch_array($queryceklogin);
		$_SESSION['id_user']=$user['id'];
	}
	else{
		echo "Username/password that you entry is invalid";
	}

?>