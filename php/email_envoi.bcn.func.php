<?php
/*
 * BCN Email for PHP
 * http://www.bcomenet.com/
 *
 * Copyright (c) 2014 Jérôme Rébois
 * Dual licensed under the MIT and GPL licenses.
 *
 * Date: November 30, 2014
 * Version: 2.1.0
 */

define('BCOMENET_LOGIN',"contact@myecocar.fr");
define('BCOMENET_PASSWORD',"strasbourg67000");
define('BCOMENET_HOST',"bcomenet.email");
define('BCOMENET_PROTOCOL',"http");

include_once('bdd_connexion.php');
require($ROOT.'/emails/template.v2.php');

function bcn_emailEnvoi($email, $subject, $message){
	//les paramètres à passer au serveur en POST
	$postParameters = "login=".urlencode(BCOMENET_LOGIN)."&password=".urlencode(BCOMENET_PASSWORD)."&email=".urlencode($email)."&subject=".urlencode($subject)."&message=".urlencode($message);
	 
	//Configuration de la requête
	$requestConfig = array( 'http' => array('method' => 'POST',
											"Content-type: application/x-www-form-urlencoded\r\n",
											'content' => $postParameters
											));

	//Retour du serveur
	$response = file_get_contents(BCOMENET_PROTOCOL."://".BCOMENET_HOST."/send/post/", false, stream_context_create($requestConfig));
	$resultat = json_decode($response, true);
	
	if ($response === false)
		echo "API-BCN.EMAIL: Synchronisation impossible...";
	else
		return $resultat['status'];
}

function bcn_emailEnvoiV2($email, $subject, $titre, $message){
	global $dbhost, $dbname, $dbuser, $dbpass;
	
	if (empty($bdd)) $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
	do{
		$ticket = (empty($ticket)) ? hash('sha512', $email.time()) : hash('sha512', $ticket.'#'.rand(0, 9999));
		$mailRQ = 'SELECT * FROM myecocar_mails WHERE ticket = \''.$ticket.'\' ORDER BY id ASC';
		$mailRP = $bdd->query($mailRQ);
	}while($mail = $mailRP->fetch()); // Tant que le ticket existe
	
	$mailRQ2 = $bdd->exec('INSERT INTO myecocar_mails(ticket, titre, contenu) VALUES(\''.$ticket.'\', \''.htmlentities($titre, ENT_QUOTES, 'UTF-8').'\', \''.htmlentities($message, ENT_QUOTES, 'UTF-8').'\')');
	
	$mailRP3 = $bdd->query($mailRQ);
	if ($mail3 = $mailRP3->fetch()){
		$titre = utf8_decode($titre);
		$message = utf8_decode($message);
		
		// Vérification du FAI
		if (preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $email))
			$passageLigne = "\n";
		else
			$passageLigne = "\r\n";
		
		// Création du Boundary
		$boundary = "-----=".md5(rand());
		
		// Création du header
		$headers = "From: MyEcoCar <contact@myecocar.fr>" . $passageLigne;
		$headers.= "Reply-to: MyEcoCar <contact@myecocar.fr>" . $passageLigne;
		$headers.= "MIME-Version: 1.0" . $passageLigne;
		$headers.= "Return-Path: <contact@myecocar.fr>" . $passageLigne;
		$headers.= "Content-Type: multipart/alternative;" . $passageLigne . " boundary=\"" . $boundary . "\"" . $passageLigne;
		$headers.= "X-Sender: <www.myecocar.fr>" . $passageLigne;
		$headers.= "X-Mailer: PHP" . $passageLigne;
		$headers.= "X-auth-smtp-user: contact@myecocar.fr" . $passageLigne;
		$headers.= "X-abuse-contact: contact@myecocar.fr" . $passageLigne;
		
		// Suppression des balises HTML
		$messageText = strip_tags($message);
		
		// Boundary
		$contenu = $passageLigne . $boundary . $passageLigne;
		
			// Message Texte
			$contenu .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passageLigne;
			$contenu .= "Content-Transfer-Encoding: 8bit" . $passageLigne;
			$contenu .= $passageLigne . $messageText . $passageLigne;
			
			// Boundary
			$contenu .= $passageLigne . "--" . $boundary . $passageLigne;
				
				// Message HTML
				$contenu .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passageLigne;
				$contenu .= "Content-Transfer-Encoding: 8bit" . $passageLigne;
				$contenu .= $passageLigne . genEmailTemplate($titre, $message, $ticket) . $passageLigne;
			
			// FIN Boundary
			$contenu .= $passageLigne . "--" . $boundary . "--" . $passageLigne;
		// FIN Boundary
		$contenu .= $passageLigne . "--" . $boundary . "--" . $passageLigne;
		
		if (mail($email, utf8_decode($subject), $contenu, $headers)){
			$maj = $bdd->exec('UPDATE myecocar_mails SET etat = 1 WHERE id = \''.$mail3['id'].'\'');
			return true;
		}else
			return false;
	}else
		return false;
}
?>