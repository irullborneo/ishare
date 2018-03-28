<?php
	$type=$_GET['type'];
	$id=$_POST['id'];
	$subject=$_POST['subject'];
	$dir=$_POST['dir'];

	$url=getUrl($id, $type);
	$to="";
	$body="Silahkan Klik link di bawah ini untuk mengunduh file. %0D%0A http://".$url."%0D%0A %0D%0A";
	$kirim='mailto:'.$to.'?subject='.rawurlencode($subject).'&body='.$body;
	echo $kirim;
?>