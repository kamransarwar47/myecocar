<?php 
function formatCash($number, $decimal, $thousandSymbol){
	if ($number >= 10000000)
		$return = number_format(($number/1000000), $decimal, 'M', $thousandSymbol);
	elseif ($number >= 10000)
		$return = number_format(($number/1000), $decimal, 'K', $thousandSymbol);
	else
		$return = number_format($number, $decimal, ',', $thousandSymbol);
	
	return $return;
}
?>