<?php
include('bdd_connexion.php');
$username = htmlentities(stripslashes($_GET['username']), ENT_QUOTES, 'UTF-8');
$query = htmlentities(stripslashes($_GET['name_startsWith']), ENT_QUOTES, 'UTF-8');
if ($username == 'bcomenet'){
	$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
	$villesRQ = 'SELECT v.nom vnom, v.nomDecode vnomDecode, p.nom pnom FROM myecocar_villes v INNER JOIN myecocar_pays p ON v.paysID = p.id WHERE (v.nom LIKE \''.$query.'%\' OR v.nomDecode LIKE \''.$query.'%\' OR v.nomLocal LIKE \''.$query.'%\' OR v.nomEN LIKE \''.$query.'%\' OR v.nomDE LIKE \''.$query.'%\') AND v.etat = \'1\' AND p.etat = \'1\' ORDER BY v.nom ASC, p.nom ASC';
	$villesRP = $bdd->query($villesRQ);
	while ($villes = $villesRP->fetch())
		$cities[] = array("name" => html_entity_decode($villes['vnomDecode'], ENT_QUOTES, 'UTF-8'), "countryName" => html_entity_decode($villes['pnom'], ENT_QUOTES, 'UTF-8'));
	echo json_encode($cities);
}
?>