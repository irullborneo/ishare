<?php
	$sql=mysql_query("SELECT * FROM file WHERE id='$id[1]' AND code='$id[0]'");
	$data=mysql_fetch_array($sql);
	$name= $data['name_file'];

	$file = basename($name);
	$file = 'drive/'.$file;
	header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);

?>