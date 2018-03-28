<?php
	function getUser($id, $col){
		$sql=mysql_query("SELECT $col FROM user WHERE id='$id'");
		$user=mysql_fetch_array($sql);
		return $user[0];
	}

	function cekFolder($folder, $dir, $id){
		$sql=mysql_query("SELECT * FROM folder WHERE name_folder='$folder' AND id_induk='$dir' AND create_by='$id'");
		$cek=mysql_num_rows($sql);
		return $cek;
	}

	function setFolder($folder, $dir, $id){
		$code=getCode(75);
		$id_type=1;
		$date=date("Y-m-d H:i:s");
		$sql=mysql_query("INSERT INTO folder(name_folder, id_type, id_induk, code, date_create, create_by, date_modified, modified_by) VALUES('$folder','$id_type','$dir','$code','$date','$id','$date','$id')");
		return $sql;
	}

	function getCode($banyak){
		$string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$str="";
		for($i=0;$i<$banyak;$i++){
			$pos=rand(0,strlen($string)-1);
			$str.=$string{$pos};
		}
		return $str;
	}

	function getDirFolderSource($type, $dir, $id){
		$sql=mysql_query("SELECT id, name_folder, id_type, id_induk, code, date_create, create_by, date_modified, modified_by FROM folder WHERE id_type='$type' AND id_induk='$dir' AND create_by='$id' ORDER BY name_folder ASC");
		return $sql;
	}

	function getTypeFile($id){
		$sql=mysql_query("SELECT * FROM file_type WHERE id_type='$id'");
		$type=mysql_fetch_array($sql);
		return $type['type'];
	}

	function getDetailFiles($id, $type){
		if($type==1){
			$sql=mysql_query("SELECT name_folder, id_type, date_create, date_modified, create_by FROM folder WHERE id='$id'");
			
			return $sql;
		}
		else{
			$sql=mysql_query("SELECT name_file, id_type, date_download, download_by, url, id FROM file WHERE id='$id'");
			
			return $sql;
		}
	}

	function getUsers($id,$col){

		$sql=mysql_query("SELECT $col FROM user WHERE id='$id'");

		$data=mysql_fetch_array($sql);
		return $data[0];
	}

	function getFolder($id, $col){
		$sql=mysql_query("SELECT $col FROM folder WHERE id='$id'");
		$data=mysql_fetch_array($sql);
		return $data[0];
	}

	function getNameFile($id, $type){
		if($type==1){
			$sql=mysql_query("SELECT name_folder FROM folder WHERE id='$id'");
			$data=mysql_fetch_array($sql);
			return $data[0];
		}
		else{
			$sql=mysql_query("SELECT name_file FROM file WHERE id='$id'");
			$data=mysql_fetch_array($sql);
			return $data[0];
		}
	}

	function setFolderName($id, $file, $user){
		$date=date("Y-m-d H:i:s");
		$sql=mysql_query("UPDATE folder SET name_folder='$file', date_modified='$date', modified_by='$user' WHERE id='$id'");
		return $sql;
	}

	function deleteFolder($id){
		$sqli=mysql_query("SELECT url FROM file WHERE id_induk='$id' AND download_by='$_SESSION[id_user]'");
		while($data=mysql_fetch_array($sqli)){
			unlink("../../".$data[0]);
		}
		mysql_query("DELETE FROM file WHERE id_induk='$id' AND download_by='$_SESSION[id_user]'");
		mysql_query("DELETE FROM folder WHERE id='$id' AND create_by='$_SESSION[id_user]'");
		$cekanak=mysql_num_rows(mysql_query("SELECT * FROM folder WHERE id_induk='$id'"));
		if($cekanak>0){
			$sql=mysql_query("SELECT * FROM folder WHERE id_induk='$id'");
			while($f=mysql_fetch_array($sql)){
				deleteFolder($f['id']);
			}	
		}
	}

	function findFolderChild($id,$user,$txt,$id2){
		$str=$txt;
		$str.="<ul>";
		$sql=mysql_query("SELECT * FROM folder WHERE id_induk='$id' AND create_by='$user' ORDER BY name_folder ASC");
		while($f=mysql_fetch_array($sql)){
			if($f['id']==$id2){
                continue;
            }
			$str.="<li><a href='#' class='list-move' id-folder='$f[id]' name-folder='$f[name_folder]'><span class='fa fa-folder-open'></span> $f[name_folder] </a>";
			
			$cekchild=mysql_num_rows(mysql_query("SELECT * FROM folder WHERE id_induk='$f[id]' AND create_by='$user'"));
			if($cekchild>0){
				$str.=findFolderChild($f['id'],$user,$txt);
			}
			
			$str.="</li>";
		}
		$str.="</ul>";
		return $str;
	}

	function changeDir($id, $folder, $user){
		$berhasil=mysql_query("UPDATE folder SET id_induk='$folder' WHERE id='$id' AND create_by='$user'");
		return $berhasil;
	}

	function setModifiedFolder($id, $user){
		$date=date("Y-m-d H:i:s");
		mysql_query("UPDATE folder SET date_modified='$date', modified_by='$user' WHERE id='$id' AND create_by='$user'");
	}

	function getUrl($id, $type){
		$server=$_SERVER['HTTP_HOST'];
		if($type=="1"){
			$dir="/ishare/?download=folder%26id=";
			$sql=mysql_query("SELECT code FROM folder WHERE id='$id'");
		}
		else{
			$dir="/ishare/?download=file%26id=";
			$sql=mysql_query("SELECT code FROM file WHERE id='$id'");
		}

		$data=mysql_fetch_array($sql);
		$url=$server."".$dir."".$data[0]."-".$id;
		return $url;
	}

	function getUrl2($id, $type){
		$server=$_SERVER['HTTP_HOST'];
		if($type=="1"){
			$dir="/ishare/?download=folder&id=";
			$sql=mysql_query("SELECT code FROM folder WHERE id='$id'");
		}
		else{
			$dir="/ishare/?download=file&id=";
			$sql=mysql_query("SELECT code FROM file WHERE id='$id'");
		}

		$data=mysql_fetch_array($sql);
		$url=$dir."".$data[0]."-".$id;
		return $url;
	}

	function setFile($nama, $type,$folder,$size){
		$date=date("Y-m-d H:i:s");
		$user=$_SESSION['id_user'];
		$code=getCode(75);
		$dir="drive/".$nama;
		$download=0;
		$sql=mysql_query("INSERT INTO file(name_file,id_type,id_induk,size,url,code,download,date_download,download_by) VALUES('$nama','$type','$folder','$size','$dir','$code','$download','$date','$user')");
		return $sql;
	}

	function getDirFileSource($dir, $user){
		$sql=mysql_query("SELECT id, name_file, id_type, id_induk, size, url, code, download, date_download, download_by FROM file WHERE id_induk='$dir' AND download_by='$user' ORDER BY id_type ASC, name_file ASC");

		return $sql;
	}

	function getIcon($id){
		$sql=mysql_query("SELECT icon FROM file_type WHERE id_type='$id'");
		$data=mysql_fetch_array($sql);
		return "<img src='$data[0]' style='width: 15px; height: auto;'>";
	}

	function getIconDetail($id){
		$sql=mysql_query("SELECT icon FROM file_type WHERE id_type='$id'");
		$data=mysql_fetch_array($sql);
		return $data[0];
	}

	function getSizeFile($id){
		$sql=mysql_query("SELECT size FROM file WHERE id='$id'");
		$data=mysql_fetch_array($sql);
		if($data[0]>=1000000){
			$size="mb";
			$ukuran=intval($data[0])/1000000;
		}
		else if($data[0]>=1000){
			$size="kb";
			$ukuran=intval($data[0])/1000;
		}
		else{
			$size="byte";
			$ukuran=intval($data[0]);
		}
		return number_format($ukuran,1)." ".$size;
	}

	function getFile($id,$col){
		$sql=mysql_query("SELECT $col FROM file WHERE id='$id'");
		$data=mysql_fetch_array($sql);
		return $data[0];
	}

	function getBanyakFile($id, $user){
		$sql=mysql_query("SELECT size FROM file WHERE id_type='$id' AND download_by='$user'");
		$banyak=0;
		while($data=mysql_fetch_array($sql)){
			$mb=intval($data[0])/1000000;
			$banyak+=$mb;
		}
		return number_format($banyak,2);
	}

	function getFreeSpace($user){
		$sql=mysql_query("SELECT size FROM file WHERE download_by='$user'");
		$banyak=0;
		while($color=mysql_fetch_array($sql)){
			$mb=intval($color[0]);
			$banyak+=$mb;
		}
		$space=(500000000-$banyak)/1000000;
		return number_format($space,2);
	}

	function getItems($type,$user){
		if($type==1){
			$sql=mysql_query("SELECT * FROM folder WHERE create_by='$user'");
		}
		else{
			$sql=mysql_query("SELECT * FROM file WHERE download_by='$user' AND id_type='$type'");
		}
		$data=mysql_num_rows($sql);
		return $data;
	}

	function getSizeNow($user){
		$sql=mysql_query("SELECT size FROM file WHERE download_by='$_SESSION[id_user]'");
		$banyak=0;
		while($color=mysql_fetch_array($sql)){
			$mb=intval($color[0]);
			$banyak+=$mb;
		}

		return $banyak;
	}
?>
