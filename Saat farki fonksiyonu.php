<?php
function saat_farki($saat){
	date_default_timezone_get("Europe/İstanbul");
	$şuanki_saat = time();
	$gelen_saat = strtotime($saat);
	$fark = $şuanki_saat - $gelen_saat;
	$dakika = $fark / 60;
	$saniye_farki = floor($fark - (floor($dakika) * 60));

	$saat = $dakika / 60;
	$dakika_farki = floor($dakika - (floor($saat) * 60));

	$gun = $saat / 24;
	$saat_farki = floor($saat - (floor($gun) * 24));

	$yil = floor($gun/365);
	$gun_farki = floor($gun - (floor($yil) * 365));
		
		$array = array(
			'yil_farki' =>  $yil,
			'gun_farki' =>  $gun_farki,
			'saat_farki' =>  $saat_farki,
			'dakika_farki' =>  $dakika_farki,
			'saniye_farki' =>  $saniye_farki
		);
	
	return $array;

}
?>