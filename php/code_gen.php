<?php 
function getCode($length){
	$code = '';
	$motDePasseCaracteres = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	
	while (strlen($code) <= $length){
		$code .= $motDePasseCaracteres[rand(0, strlen($motDePasseCaracteres)-1)];
	}
	
	return $code;
}
?>