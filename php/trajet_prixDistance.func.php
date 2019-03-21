<?php
// https://developers.google.com/maps/documentation/embed/guide#forming_the_url
/* 
function getDistance($adresse1,$adresse2,$avoid){
	// $avoid = "tolls|ferries|highways";
	$accents_min_1 = utf8_decode('áàâäãåçéèêëíìîïñóòôöõúùûüýÿ');
	$accents_min_2 = utf8_decode('aaaaaaceeeeiiiinooooouuuuyy');
	$adresse1 = html_entity_decode($adresse1, ENT_QUOTES, 'UTF-8');
	$adresse2 = html_entity_decode($adresse2, ENT_QUOTES, 'UTF-8');
	$adresse1 = strtr($adresse1, $accents_min_1, $accents_min_2);
	$adresse2 = strtr($adresse2, $accents_min_1, $accents_min_2);
	$adresse1 = str_replace(" ", "+", $adresse1);
	$adresse2 = str_replace(" ", "+", $adresse2);
	$url='http://maps.google.com/maps/api/directions/xml?language=fr&origin='.$adresse1.'&destination='.$adresse2.'&avoid='.$avoid.'&mode=driving&sensor=false';
	$xml=file_get_contents($url);
	$root = simplexml_load_string($xml);

	$duration=$root->route->leg->duration->value;
	$distance=$root->route->leg->distance->value;
	$start_address=$root->route->leg->start_address;
	$end_address=$root->route->leg->end_address;

	if ($root->status == "OK")
		// Retour du résultat en km
		return array("duration" => $duration, "distance" => round($distance/1000, 2), "start_address" => $start_address, "end_address" => $end_address);
	else
		return array("duration" => 0, "distance" => 0, "start_address" => 0, "end_address" => 0);
} */

function getTrajet($depart,$arrivee,$avoid,$consomationAuKm,$carburant,$passagers){
	// $consomationAuKm = 0.14;
	// $carburant = 1.3; // Diesel
	// $passagers = 5; // Conducteur compris
	// $avoid = "tolls|ferries|highways";
	$accents_min_1 = utf8_decode('áàâäãåçéèêëíìîïñóòôöõúùûüýÿ');
	$accents_min_2 = utf8_decode('aaaaaaceeeeiiiinooooouuuuyy');
	$adresse1 = html_entity_decode($depart, ENT_QUOTES, 'UTF-8');
	$adresse2 = html_entity_decode($arrivee, ENT_QUOTES, 'UTF-8');
	$adresse1 = strtr($adresse1, $accents_min_1, $accents_min_2);
	$adresse2 = strtr($adresse2, $accents_min_1, $accents_min_2);
	$adresse1 = str_replace(" ", "+", $adresse1);
	$adresse2 = str_replace(" ", "+", $adresse2);
	$url='https://maps.googleapis.com/maps/api/directions/json?key=AIzaSyAX9UIjtHMe0Fb5o16O9AuQAH6vJaWgdVY&language=fr&origin='.$adresse1.'&destination='.$adresse2.'&avoid='.$avoid.'&mode=driving&sensor=false';
	$json=file_get_contents($url);
	$root = json_decode($json);

	$duration=$root->routes[0]->legs[0]->duration->value;
	$distance=$root->routes[0]->legs[0]->distance->value;
	$start_address=$root->routes[0]->legs[0]->start_address;
	$end_address=$root->routes[0]->legs[0]->end_address;

	if ($root->status == "OK"){
		$km = round($distance/1000, 2);
		$prixParPassager = round(($consomationAuKm * $km * $carburant) / 3, 0); 
		return array("prix" => $prixParPassager, "duration" => $duration, "distance" => $distance, "start_address" => $start_address, "end_address" => $end_address); 
	}else
		return array("prix" => 0, "duration" => 0, "distance" => 0, "start_address" => "", "end_address" => "");
}
?>