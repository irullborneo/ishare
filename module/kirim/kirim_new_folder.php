<?php
	$aksi=$_GET['aksi'];
	switch ($aksi) {
		case 'tambah':
			$dir=$_POST['dir'];
			$folder=$_POST['folder'];

			if(empty($folder)){
				echo "Folder Name was Empty";
			}
			else{
				$cek=cekFolder($folder, $dir, $_SESSION['id_user']);
				if($cek>0){
					echo "There is same folder name, use other name";
				}
				else{
					$berhasil=setFolder($folder, $dir, $_SESSION['id_user']);
					if($berhasil){

					}
					else{
						echo "Folder Can't Save. Please Try Again";
					}
				}
			}
			break;
		
		default:
			# code...
			break;
	}
?>