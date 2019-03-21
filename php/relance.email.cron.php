<?php 
include('/home/myecocar/www/php/bdd_connexion.php');
include('/home/myecocar/www/php/redirect_link.php');
include('/home/myecocar/www/php/email_envoi.bcn.func.php');
$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
$emailTechnicien = 'contact@myecocar.fr';
$langs = array("fr", "en", "de");
$time = time();
$timeUp = time();
$totalUsers = 0;
$totalBugs = 0;
$totalCancels = 0;
$dates = array(1, 15, 30, 60);
$dateMin = mktime(0,0,1, date("n"), date("j"), date("Y"));
$usersRQ = 'SELECT * FROM myecocar_utilisateurs WHERE motDePasse != \'\' AND verifMail != \'1\'';
$usersRP = $bdd->query($usersRQ);
while ($users = $usersRP->fetch()){
	$dateConnexion = ($users['dateConnexion'] != 0) ? strtotime($users['dateConnexion']) : strtotime($users['dateInscription']);
	$delta = $time - $dateConnexion;
	// Nombre de jours écoulés depuis la dernière connexion
	$deltaJours = round(($delta / 3600) / 24);
	$send = false;
	
	foreach($dates as $date){
		if ($deltaJours == $date) $send = true;
	}
	
	if ($send){
		$email = $users['email'];
		$lang = strtolower($users['langue']);
		$lang = (in_array($lang, $langs) ? $lang : "en");
		if (strlen($users['verifMail']) > 1)
			$verifMail = $users['verifMail'];
		else{
			$verifMail = hash('sha512', $email.$time);
			$modification = $bdd->exec('UPDATE myecocar_utilisateurs SET verifMail = \''.$verifMail.'\' WHERE id = \''.$users['id'].'\'');
		}
		$contenu = traduction($lang, "inscription-confirmation-mail", array("#url#"), array($url.'?verifMail='.$verifMail));
		if (bcn_emailEnvoiV2($email, traduction($lang, "inscription-confirmation-mail-objet1"), traduction($lang, "inscription-confirmation-mail-objet2"), $contenu)){
			sleep(1);
			$totalUsers += 1;
		}else $totalBugs += 1;
	}else $totalCancels += 1;
}

$return = 'Relance des confirmations d\'inscription :<br><br>- '.$totalUsers.' relance(s) envoyée(s)<br>- '.$totalCancels.' relance(s) en attente<br>- '.$totalBugs.' relance(s) annulée(s)<br><br>';

$timeOut = time();
$timeDelta = $timeOut-$timeUp; // tps en secondes
$timeMin = floor($timeDelta/60); // minutes
$timeSec = 60*(($timeDelta/60)-$timeMin); // secondes
$return .= 'Exécution en '.$timeMin.' minute(s) et '.$timeSec.' seconde(s).<br><br>Cordialement<br><br>BComeNet';

if (bcn_emailEnvoiV2($emailTechnicien, 'Tâche planifiée exécutée avec succès', 'Tâche planifiée exécutée', $return))
	echo "Exécution terminée.";
?>