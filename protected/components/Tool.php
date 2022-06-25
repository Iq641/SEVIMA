<?php
class Tool{
	public static function RandomNumber($jml){ 
		$random_numbers = [];
		while(count($random_numbers) <= $jml){
			do  {
				$random_number = rand(1, $jml);    
			} while (in_array($random_number, $random_numbers));
			$random_numbers[] = $random_number;
		}
		
		return $random_numbers;
	}
	
	public static function GETNumber($kode){ 
		$kode = strtoupper($kode);
		if ($kode=='KATEGORI') {
			$awal = 'KAT';	$jml = 8;
		} else if ($kode=='USER') {
			$awal = 'APEL';	$jml = 10;
		}
		
		$sql  = 'kode="'. $kode .'"';
		$data = DataAutonum::model()->find($sql);
		if ($data==null) {
			$data = new DataAutonum;
			$data->kode      = $kode;
			$data->jdigit    = $jml;
			$data->awal_kode = $awal;
		}
		$no   = $data->urut + 1;
		$jdig = $data->jdigit;
		$awal = trim($data->awal_kode);
		
		$data->urut = $no;
		$data->save(false);
		
		$j  = ($jdig - strlen($awal)) * -1;
		$no = substr(str_repeat('0',$jdig) . $no,$j);
		$no	= $awal . $no;
		
		return $no;
	}
}
 ?>