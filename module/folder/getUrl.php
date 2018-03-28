<?php
    session_start();
    include"../../config/koneksi.php";
    include"../../config/tgl.php";
    include "../../config/fungsi.php";
    $id=$_POST['id'];
    $sql=mysql_query("SELECT url FROM file WHERE id='$id'");
    $data=mysql_fetch_array($sql);
    echo $data[0];
?>