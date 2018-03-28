<?php
	date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
	$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	$hari = date("w");
	$hari_ini = $seminggu[$hari];

	$tgl_sekarang = date("Ymd");
	$tgl_skrg     = date("d");
	$bln_sekarang = date("m");
	$thn_sekarang = date("Y");
	$jam_sekarang = date("H:i:s");

	$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");

	function tglIndo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}
	
	function tglIndo2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;
	}

	function tglMySQL($tgl){
		$tahun = substr($tgl,6,4);
		$bulan = substr($tgl,3,2);
		$tanggal = substr($tgl,0,2);

		return $tahun.'-'.$bulan.'-'.$tanggal;	
	}
	
	function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 

	function getBulan2($bln){
		switch ($bln){
			case 1: 
				return "JAN";
				break;
			case 2:
				return "FEB";
				break;
			case 3:
				return "MAR";
				break;
			case 4:
				return "APR";
				break;
			case 5:
				return "MEI";
				break;
			case 6:
				return "JUN";
				break;
			case 7:
				return "JUL";
				break;
			case 8:
				return "AGT";
				break;
			case 9:
				return "SEP";
				break;
			case 10:
				return "OKT";
				break;
			case 11:
				return "NOV";
				break;
			case 12:
				return "DES";
				break;
		}
	}
?>
