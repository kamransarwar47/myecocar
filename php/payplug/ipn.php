<?php
require_once("lib/Payplug.php");
Payplug::setConfigFromFile("parameters.json");

try {
    $ipn = new IPN();
	
	$state = $ipn->state;
	$ppID = $ipn->idTransaction;
	$order = $ipn->order;
	$offreID = $ipn->customData;
	$uID = $ipn->customer;
	$montant = number_format(substr($ipn->amount, 0, -2).'.'.substr($ipn->amount, -2), 2, ',', ' ');
    $message = 'Paiement d\'un montant de '.$montant.' '.$ipn->currency.' pour la(es) réservation(s) '.$order.' de '.$ipn->firstName.' '.$ipn->lastName.' (ID: '.$uID.').';
    
	mail('contact@myecocar.fr', 'L14', $message);
	
	include('../bdd_connexion.php');
	include('../code_gen.php');
	$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
	if (strpos($order, '-') === false) $reservationsID = array($order);
	else $reservationsID = explode('-', $order);
	
	foreach($reservationsID as $reservationID){
		$reservationValidationRQ = 'SELECT * FROM myecocar_reservations WHERE id = \''.$reservationID.'\' AND uID = \''.$uID.'\' AND etat = \'1\'';
		$reservationValidationRP = $bdd->query($reservationValidationRQ);
		if ($reservationValidation = $reservationValidationRP->fetch()){
			if ($state == 'refunded'){
				$montant = substr($ipn->amount, 0, -2).'.'.substr($ipn->amount, -2);
				$modification = $bdd->exec('UPDATE myecocar_reservations SET remboursementMontant = \''.$montant.'\', remboursement = CURRENT_TIMESTAMP, etat = 0 WHERE id = \''.$reservationID.'\' ORDER BY id DESC');
			}else {
				do{
				$code = getCode(6);
				$reservationCodeRQ = 'SELECT * FROM myecocar_reservations WHERE code = \''.$code.'\' AND etat = \'1\'';
				$reservationCodeRP = $bdd->query($reservationCodeRQ);
				}while ($reservationCode = $reservationCodeRP->fetch());
				$montant = substr($ipn->amount, 0, -2).'.'.substr($ipn->amount, -2);
				$modification = $bdd->exec('UPDATE myecocar_reservations SET ppID = \''.$ppID.'\', paiement = \'1\', montant = \''.$montant.'\', code = \''.$code.'\', datePaiement = CURRENT_TIMESTAMP WHERE id = \''.$reservationID.'\' ORDER BY id DESC');
				/*
				include('../sms_envoi.func.php');
				//Appel à la méthode permettant de lister l'ensemble de vos comptes
				$resultXML = getAllAccounts();
				//Vérification du succès de la requête
				if($resultXML->status == "success"){
					$accountsObject = $resultXML->accounts;
					
					//Liste vos comptes restants
					foreach($accountsObject->account as $account){
						// Si il reste des SMS
						if ($account->sms_remaining > 0){
							$userRQ = 'SELECT * FROM myecocar_utilisateurs WHERE id = \''.$uID.'\' ORDER BY id DESC';
							$userRP = $bdd->query($userRQ);
							if ($user = $userRP->fetch()){
								$telephone = $emails['prefixe'].$emails['telephone'];
								//Appel à la méthode sendMessage
								//text, recipients, sender name
								$resultXML2 = sendMessage('Bonjour '.ucfirst(strtolower(html_entity_decode($user['prenom'], ENT_QUOTES, 'UTF-8'))).', votre code de réservation est : '.$code,
														array("$telephone"),
														"MyEcoCar");
								 
								//Vérification du succès de l'envoi
								if($resultXML2->status == "success"){
									$codeSMS = true;
								}else
									$erreur = 'IPN SMS : Impossible d'envoyer le SMS.';
							}else
								$erreur = 'IPN SMS : Impossible de trouver le client.';
						}else
							$erreur = 'IPN SMS : Veuillez recharger votre compte SMS.';
					}
				}else
					$erreur = 'IPN SMS : Impossible d'accéder au compte SMS.';*/
			}
		}
		else
			mail("contact@myecocar.fr","Impossible d'enregistrer la transaction",$message.'\n Erreur sur la réservation #'.$reservationID);
	}
	
	if ($state == 'paid'){
		mail('contact@myecocar.fr', 'L14', 'Liste des réservations : '.implode(', ',$reservationsID));
		
		$trajetsRQ = 'SELECT * FROM myecocar_trajets WHERE id = \''.$offreID.'\' AND etat = \'1\' ORDER BY id DESC';
		$trajetsRP = $bdd->query($trajetsRQ);
		if ($trajets = $trajetsRP->fetch()){
			$places = count($reservationsID);
			include('../redirect_link.php');
			$trajetDepart = ucwords($trajets['depart']);
			list($adresseDepart, $villeDepart, $paysDepart) = explode(", ", $trajetDepart, 3);
			$trajetArrivee = ucwords($trajets['arrivee']);
			list($adresseArrivee, $villeArrivee, $paysArrivee) = explode(", ", $trajetArrivee, 3);
			$acceptation = ($trajets['acceptation'] > '0') ? '0' : '1';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: MyEcoCar <contact@myecocar.fr>\r\nReply-to : MyEcoCar <contact@myecocar.fr>\nX-Mailer:PHP";
			$confirmation1 = ($acceptation != '1') ? 'demande de ' : '';
			$confirmation2 = ($acceptation != '1') ? 'Vous recevrez une confirmation de réservation lorsque le conducteur aura accepté votre demande.<br><br>' : '';
			$contenu = utf8_decode('Bonjour '.ucfirst($user['prenom']).',<br/><br/>Nous vous confirmons votre '.$confirmation1.'réservation de '.$places.' place'.($places > 1 ? 's' : '').' pour le trajet de '.$villeDepart.' à '.$villeArrivee.' le '.date("d/m/Y \à H:i",$trajets['dateDepart']).'.<br/><br/>'.$confirmation2.'Vous pouvez gérer toutes vos réservations depuis votre espace membre. Pour consulter cette offre, veuillez cliquer sur le lien ci-dessous :<br/><a href="'.$url.'offre/'.$offreID.'/">'.$url.'offre/'.$offreID.'/</a><br/><br/>Cordialement<br/><br/>L\'équipe MyEcoCar France.<br/><a href="http://www.myecocar.fr">www.myecocar.fr</a>');
			mail($user['email'],($acceptation != '1' ? 'Attention ! ' : '').'Votre réservation sur MyEcoCar.fr',$contenu,$headers);
			
			if ($trajets['notifications'] == 1){
				$user2RQ = 'SELECT * FROM myecocar_utilisateurs WHERE id = \''.$trajets['uid'].'\' ORDER BY id DESC';
				$user2RP = $bdd->query($user2RQ);
				if ($user2 = $user2RP->fetch()){ // Si le compte utilisateur existe
					$confirmation = ($acceptation != '1') ? 'Veuillez confirmer la réservation de '.ucfirst($user['prenom']).' '.ucfirst($user['nom']).' (<a href="'.$url.'membre/'.$user['id'].'/">accéder au profil</a>) en cliquant sur le lien ci-dessous :<br/><a href="'.$url.'?confirmation='.$offreID.'&uid='.$user['id'].'">'.$url.'?confirmation='.$offreID.'&uid='.$user['id'].'</a><br/><br/>' : '';
					$contenu2 = utf8_decode('Bonjour '.ucfirst($user2['prenom']).',<br/><br/>Nous vous informons de la réservation de '.$places.' place'.($places > 1 ? 's' : '').' pour le trajet de '.$villeDepart.' à '.$villeArrivee.' le '.date("d/m/Y \à H:i",$trajets['dateDepart']).'.<br/><br/>'.$confirmation.'Vous pouvez gérer tous vos trajets depuis votre espace membre. Pour consulter votre offre, veuillez cliquer sur le lien ci-dessous :<br/><a href="'.$url.'offre/'.$offreID.'/">'.$url.'offre/'.$offreID.'/</a><br/><br/>Cordialement<br/><br/>L\'équipe MyEcoCar France.<br/><a href="http://www.myecocar.fr">www.myecocar.fr</a>');
					mail($user2['email'],($acceptation != '1' ? 'Attention ! ' : '').'Nouvelle réservation pour votre trajet sur MyEcoCar.fr',$contenu2,$headers);
				}
			}
		}
	}
} catch (InvalidSignatureException $e) {
    mail("contact@myecocar.fr","Paiement échoué","La banque du client n'a pu répondre favorablement à notre demande de débit.");
}
?>