<?php

function emailEnvoi($destinataire,$sujet,$message){
	// Vérification du FAI
	if (preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire))
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
			$contenu .= $passageLigne . $message . $passageLigne;
		
		// FIN Boundary
		$contenu .= $passageLigne . "--" . $boundary . "--" . $passageLigne;
	// FIN Boundary
	$contenu .= $passageLigne . "--" . $boundary . "--" . $passageLigne;
	
	if (mail($destinataire, utf8_decode($sujet), $contenu, $headers))
		return true;
	else
		return false;
}

function emailEnvoiBeta($destinataire,$sujet,$titre,$message,$ticket){
	include('emails/template.v2.php');
	// Vérification du FAI
	if (preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire))
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
	
	if (mail($destinataire, utf8_decode($sujet), $contenu, $headers))
		return true;
	else
		return false;
}
?>