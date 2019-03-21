<!--
-------------------------------------------------------------
 Topic		: Exemple PHP traitement de la réponse de paiement
 Version 	: P615

	Dans cet exemple, les données de la transaction	sont
	décryptées et affichées sur le navigateur de l'internaute.

-------------------------------------------------------------
-->


<!--	Affichage du header html -->

<?php 
include('../bdd_connexion.php');
include('../code_gen.php');
include('../redirect_link.php');
include('../sms_envoi.func.php');
include('../email_envoi.bcn.func.php');
$headers = "From: MyEcoCar <contact@myecocar.fr>\r\n";
$headers.= "Reply-to: MyEcoCar <contact@myecocar.fr>\r\n";
$headers.= "MIME-Version: 1.0";
$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);

// Récupération de la variable cryptée DATA
$message="message=$_POST[DATA]";

// Initialisation du chemin du fichier pathfile (à modifier)
//   ex :
//    -> Windows : $pathfile="pathfile=c:/repertoire/pathfile";
//    -> Unix    : $pathfile="pathfile=/home/repertoire/pathfile";

$pathfile="pathfile=/home/myecocar/paiement/param/pathfile";

// Initialisation du chemin de l'executable response (à modifier)
// ex :
// -> Windows : $path_bin = "c:/repertoire/bin/response";
// -> Unix    : $path_bin = "/home/repertoire/bin/response";
//

// $path_bin = "/home/myecocar/paiement/bin/static/response";
$path_bin = "/home/myecocar/www/php/sogenactif/bin/static/response";

// Appel du binaire response
$message = escapeshellcmd($message);
$result=exec("$path_bin $pathfile $message");


//	Sortie de la fonction : !code!error!v1!v2!v3!...!v29
//		- code=0	: la fonction retourne les données de la transaction dans les variables v1, v2, ...
//				: Ces variables sont décrites dans le GUIDE DU PROGRAMMEUR
//		- code=-1 	: La fonction retourne un message d'erreur dans la variable error


//	on separe les differents champs et on les met dans une variable tableau

$tableau = explode ("!", $result);

//	Récupération des données de la réponse

$code = $tableau[1];
$error = $tableau[2];
$merchant_id = $tableau[3];
$merchant_country = $tableau[4];
$amount = $tableau[5];
$transaction_id = $tableau[6];
$payment_means = $tableau[7];
$transmission_date= $tableau[8];
$payment_time = $tableau[9];
$payment_date = $tableau[10];
$response_code = $tableau[11];
$payment_certificate = $tableau[12];
$authorisation_id = $tableau[13];
$currency_code = $tableau[14];
$card_number = $tableau[15];
$cvv_flag = $tableau[16];
$cvv_response_code = $tableau[17];
$bank_response_code = $tableau[18];
$complementary_code = $tableau[19];
$complementary_info = $tableau[20];
$return_context = $tableau[21];
$caddie = $tableau[22];
$receipt_complement = $tableau[23];
$merchant_language = $tableau[24];
$language = $tableau[25];
$customer_id = $tableau[26];
$order_id = $tableau[27];
$customer_email = $tableau[28];
$customer_ip_address = $tableau[29];
$capture_day = $tableau[30];
$capture_mode = $tableau[31];
$data = $tableau[32];
$order_validity = $tableau[33];  
$transaction_condition = $tableau[34];
$statement_reference = $tableau[35];
$card_validity = $tableau[36];
$score_value = $tableau[37];
$score_color = $tableau[38];
$score_info = $tableau[39];
$score_threshold = $tableau[40];
$score_profile = $tableau[41];

//  analyse du code retour
if (( $code == "" ) && ( $error == "" ) ){
print ("<BR><CENTER>erreur appel response</CENTER><BR>");
print ("executable response non trouve $path_bin");
}elseif ( $code != 0 ){//	Erreur, affiche le message d'erreur
	print ("<center><b><h2>Erreur appel API de paiement.</h2></center></b>");
	print ("<br><br><br>");
	print (" message erreur : $error <br>");
}else{// OK, affichage des champs de la réponse
	if (intval($transaction_id) != 0 && intval($authorisation_id) != 0){
		$jours = array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');
		$mois = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
		$transactionsRQ = 'SELECT * FROM myecocar_transactions WHERE id = \''.intval($transaction_id).'\' AND datePaiement = 0';
		// $transactionsRQ = 'SELECT * FROM myecocar_transactions WHERE id = \''.intval($transaction_id).'\'';
		$transactionsRP = $bdd->query($transactionsRQ);
		if ($transactions = $transactionsRP->fetch()){
			if (intval($response_code) != 0){
				$BDD_SET = 'etat = 0, ';
			}else{
				$BDD_SET = 'authorisation = \''.intval($authorisation_id).'\', carteType = \''.htmlentities($payment_means, ENT_QUOTES, 'UTF-8').'\', carteNumero = \''.floatval($card_number).'\', carteValidite = \''.intval($card_validity).'\', langage = \''.htmlentities($language, ENT_QUOTES, 'UTF-8').'\', ';
			}
			
			// MAJ de la BDD : Transaction
			$modification = $bdd->exec('UPDATE myecocar_transactions SET '.$BDD_SET.'datePaiement = CURRENT_TIMESTAMP WHERE id = \''.intval($transaction_id).'\'');
			
			// MAJ de la BDD : Reservation
			$montant = number_format(substr($amount, 0, -2).'.'.substr($amount, -2), 2, ',', ' ');
			$uid = intval($customer_id);
			$adminEmail = 'contact@myecocar.fr';
			// $adminEmail = 'technicien@bcomenet.com';
			$order = $order_id;
			$offreID = intval($data);
			$prestatairePaiementID = $transaction_id;
			$state = 'paid';
			$userRQ = 'SELECT * FROM myecocar_utilisateurs WHERE id = \''.$uid.'\' ORDER BY id ASC';
			$userRP = $bdd->query($userRQ);
			if ($user = $userRP->fetch()){
				$offreRQ = 'SELECT * FROM myecocar_trajets WHERE id = \''.$offreID.'\' ORDER BY id ASC';
				$offreRP = $bdd->query($offreRQ);
				if ($offre = $offreRP->fetch()){
					// mail($adminEmail, 'L129', utf8_decode('Paiement d\'un montant de '.$montant.' euros pour la(es) réservation(s) '.$order.' de '.html_entity_decode($user['prenom'].' '.$user['nom'], ENT_QUOTES, 'UTF-8').' (ID: '.$user['id'].').')); $return .= 'L129 -> OK<br><br>';
					$codeSMS = false;
					if (strpos($order, '-') === false) $reservationsID = array($order);
					else $reservationsID = explode('-', $order);
					
					foreach($reservationsID as $reservationID){
						$reservationValidationRQ = 'SELECT * FROM myecocar_reservations WHERE id = \''.$reservationID.'\' AND uID = \''.$uid.'\' AND etat = \'1\'';
						$reservationValidationRP = $bdd->query($reservationValidationRQ);
						if ($reservationValidation = $reservationValidationRP->fetch()){
							$montant = floatval($offre['prix']);
							if ($state == 'refunded'){
								$montant_remboursement = substr($amount, 0, -2).'.'.substr($amount, -2);
								$modificationResa = $bdd->exec('UPDATE myecocar_reservations SET remboursement = CURRENT_TIMESTAMP, etat = 0 WHERE id = \''.$reservationID.'\' ORDER BY id DESC');
								$modificationTrans = $bdd->exec('UPDATE myecocar_transactions SET montant_remboursement = \''.$montant_remboursement.'\', dateRemboursement = CURRENT_TIMESTAMP WHERE id = \''.intval($transaction_id).'\' ORDER BY id DESC');
							}else {
								do{
								$code = getCode(6);
								$reservationCodeRQ = 'SELECT * FROM myecocar_reservations WHERE code = \''.$code.'\' AND etat = \'1\'';
								$reservationCodeRP = $bdd->query($reservationCodeRQ);
								}while ($reservationCode = $reservationCodeRP->fetch());
								$modification = $bdd->exec('UPDATE myecocar_reservations SET ppID = \''.$prestatairePaiementID.'\', paiement = \'1\', montant = \''.$montant.'\', code = \''.$code.'\', datePaiement = CURRENT_TIMESTAMP WHERE id = \''.$reservationID.'\' ORDER BY id DESC');
								
								//Appel à la méthode permettant de lister l'ensemble de vos comptes
								$resultXML = getAllAccounts();
								//Vérification du succès de la requête
								if($resultXML->status == "success"){
									$accountsObject = $resultXML->accounts;
									
									//Liste vos comptes restants
									foreach($accountsObject->account as $account){
										// Si il reste des SMS
										if ($account->sms_remaining > 0){
											$userRQ = 'SELECT * FROM myecocar_utilisateurs WHERE id = \''.$uid.'\' ORDER BY id DESC';
											$userRP = $bdd->query($userRQ);
											if ($user = $userRP->fetch()){
												$telephone = $user['prefixe'].$user['telephone'];
												//Appel à la méthode sendMessage
												//text, recipients, sender name
												$resultXML2 = sendMessage('Bonjour '.ucfirst(strtolower(html_entity_decode($user['prenom'], ENT_QUOTES, 'UTF-8'))).', votre code de réservation : '.$code,
																		array("$telephone"),
																		"MyEcoCar");
												 
												//Vérification du succès de l'envoi
												if($resultXML2->status == "success"){
													$codeSMS = true;
												}else
													$erreur = 'IPN SMS : Impossible d\'envoyer le SMS.';
											}else
												$erreur = 'IPN SMS : Impossible de trouver le client.';
										}else
											$erreur = 'IPN SMS : Veuillez recharger votre compte SMS.';
									}
								}else
									$erreur = 'IPN SMS : Impossible d\'accéder au compte SMS.';
							} $return .= 'L186 -> FOREACH BOOKING : STATE:'.$state.', ID:'.$reservationID.', SMS:'.$codeSMS.'<br>';
							mail("contact@bcomenet.com","Rapport d'envoi de SMS",'SMS envoyé: '.var_dump($codeSMS).' / Erreur: '.$erreur);
						}
						else
							mail($adminEmail,"Impossible d'enregistrer la transaction",$message.'\n Erreur sur la réservation #'.$reservationID);
					} $return .= '<br>';
					
					if ($state == 'paid'){
						// mail($adminEmail, 'L191', utf8_decode('Liste des réservations : '.implode(', ',$reservationsID))); $return .= 'L190 -> IF STATE : PAID<br><br>';
						
						$trajetsRQ = 'SELECT * FROM myecocar_trajets WHERE id = \''.$offreID.'\' AND etat = \'1\' ORDER BY id DESC';
						$trajetsRP = $bdd->query($trajetsRQ);
						if ($trajets = $trajetsRP->fetch()){
							$places = count($reservationsID);
							$trajetDepart = ucwords($trajets['depart']);
							$villeDepart = ucwords($trajets['departVille']);
							$paysDepart = ucwords($trajets['departPays']);
							$trajetArrivee = ucwords($trajets['arrivee']);
							$villeArrivee = ucwords($trajets['arriveeVille']);
							$paysArrivee = ucwords($trajets['arriveePays']);
							$acceptation = ($trajets['acceptation'] > 0) ? '0' : '1';
							$confirmation1 = ($acceptation != '1') ? 'demande de ' : '';
							$confirmation2 = ($acceptation != '1') ? 'Vous recevrez une confirmation de réservation lorsque le conducteur aura accepté votre demande.<br><br>' : '';
							$de = html_entity_decode($villeDepart, ENT_QUOTES, 'UTF-8');
							$a = html_entity_decode($villeArrivee, ENT_QUOTES, 'UTF-8');
							// $contenu = 'Nous vous confirmons votre '.$confirmation1.'réservation de '.$places.' place'.($places > 1 ? 's' : '').' pour le trajet de '.$villeDepart.' à '.$villeArrivee.' le '.date("d/m/Y \à H:i",$trajets['dateDepart']).'.<br/><br/>'.$confirmation2.'Vous pouvez gérer toutes vos réservations depuis votre espace membre. Pour consulter cette offre, veuillez cliquer sur le lien ci-dessous :<br/><a href="'.$url.'offre/'.$offreID.'/">'.$url.'offre/'.$offreID.'/</a><br/><br/>Cordialement<br/><br/>L\'équipe MyEcoCar France.';
							$contenu = 'Nous vous confirmons votre '.$confirmation1.'réservation de '.$places.' place'.($places > 1 ? 's' : '').' pour le trajet de '.$villeDepart.' à '.$villeArrivee.' le '.date("d/m/Y \à H\hi",$trajets['dateDepart']).'.<br/><br/>'.$confirmation2.'<h3>Détails de du trajet</h3><table width="100%" style="font-size:12px;">';
							$contenu .= '<tr style="height:30px;"><td width="25%"><b>Départ</b> </td><td>'.$trajetDepart.'</td></tr>';
							$contenu .= '<tr style="height:30px;"><td><b>Arrivée</b> </td><td>'.$trajetArrivee.'</td></tr>';
							$contenu .= '<tr style="height:30px;"><td colspan="2"><hr style="border:none;border-bottom:1px #ccc solid;"></td></tr>';
							$contenu .= '<tr style="height:30px;"><td><b>Date de départ</b> </td><td>'.$jours[date("w", $trajets['dateDepart'])].' '.date("d",$trajets['dateDepart']).' '.$mois[date("n", $trajets['dateDepart'])].' '.date("Y", $trajets['dateDepart']).' à '.date("H\hi", $trajets['dateDepart']).'</td></tr>';
							$contenu .= '<tr style="height:30px;"><td colspan="2"><hr style="border:none;border-bottom:1px #ccc solid;"></td></tr>';
							$contenu .= '<tr style="height:30px;"><td><b>Bagages</b> </td><td>'.ucfirst($trajets['bagages']).'</td></tr>';
							$contenu .= '<tr style="height:30px;"><td><b>Fléxibilité horaire</b> </td><td>'.ucfirst($trajets['flexibilite']).'</td></tr>';
							$contenu .= '<tr style="height:30px;"><td><b>Détour</b> </td><td>'.ucfirst($trajets['detour']).'</td></tr>';
							$contenu .= '<tr style="height:30px;"><td colspan="2"></td></tr>';
							if ($trajets['commentaire'] != ''){
							$contenu .= '<tr><td colspan="2"><h3>Un mot du conducteur</h3></td></tr>';
							$contenu .= '<tr style="height:30px;"><td colspan="2">'.$trajets['commentaire'].'</td></tr>';
							}
							$contenu .= '<tr style="height:30px;"><td colspan="2"></td></tr>';
							$contenu .= '</table>Vous pouvez gérer toutes vos réservations depuis votre espace membre. Pour consulter cette offre, veuillez cliquer sur le lien ci-dessous :<br/><a href="'.$url.'offre/'.$offreID.'/">'.$url.'offre/'.$offreID.'/</a><br/><br/>Cordialement<br/><br/>L\'équipe MyEcoCar France.';

							bcn_emailEnvoiV2($user['email'], ($acceptation != '1' ? 'Attention ! ' : '').'Votre réservation de '.$de.' à '.$a.' sur MyEcoCar.fr', $villeDepart.' - '.$villeArrivee, $contenu); $return .= 'L209 -> MAIL : CLIENT<br>';
							
							if ($trajets['notifications'] == 1){
								$user2RQ = 'SELECT * FROM myecocar_utilisateurs WHERE id = \''.$trajets['uid'].'\' ORDER BY id DESC';
								$user2RP = $bdd->query($user2RQ);
								if ($user2 = $user2RP->fetch()){ // Si le compte utilisateur existe
									$confirmation = ($acceptation != '1') ? 'Veuillez confirmer la réservation de '.ucfirst($user['prenom']).' '.ucfirst($user['nom']).' (<a href="'.$url.'membre/'.$user['id'].'/">accéder au profil</a>) en cliquant sur le lien ci-dessous :<br/><br/><a href="'.$url.'?confirmation='.$offreID.'&uid='.$user['id'].'">Confirmer la réservation</a><br/><br/>' : '';
									$contenu2 = 'Nous vous informons de la réservation de '.$places.' place'.($places > 1 ? 's' : '').' pour le trajet de '.$villeDepart.' à '.$villeArrivee.' le '.date("d/m/Y \à H:i",$trajets['dateDepart']).'.<br/><br/>'.$confirmation.'Vous pouvez gérer tous vos trajets depuis votre espace membre. Pour consulter votre offre, veuillez cliquer sur le lien ci-dessous :<br/><a href="'.$url.'offre/'.$offreID.'/">'.$url.'offre/'.$offreID.'/</a><br/><br/>Cordialement<br/><br/>L\'équipe MyEcoCar France.';
									bcn_emailEnvoiV2($user2['email'], ($acceptation != '1' ? 'Attention ! ' : '').'Nouvelle réservation pour votre trajet de '.$de.' à '.$a.' sur MyEcoCar.fr', $villeDepart.' - '.$villeArrivee, $contenu2); $return .= 'L217 -> MAIL : DRIVER<br><br>';
								}
							}
							
							mail($adminEmail, utf8_decode('Nouvelle réservation sur MyEcoCar.fr'), utf8_decode($villeDepart.' - '.$villeArrivee.'<br><br>'.$return), $headers);
							
							if ($codeSMS)
								header('Location: /offre/'.$offreID.'/'.$villeDepart.'-'.$villeArrivee.'/?validation');
						}
					}
				}
			}
		}
	}
	
	mail($adminEmail, utf8_decode('Nouvelle réservation sur MyEcoCar.fr'), utf8_decode($villeDepart.' - '.$villeArrivee.'<br><br>'.$return), $headers);
	
	header('Location: /offre/'.$data.'/');
		
		echo $return;
		print("<br>merchant_id : $merchant_id\n");
		print("<br>merchant_country : $merchant_country\n");
		print("<br>amount : $amount\n");
		print("<br>transaction_id : $transaction_id\n");
		print("<br>transmission_date: $transmission_date\n");
		print("<br>payment_means: $payment_means\n");
		print("<br>payment_time : $payment_time\n");
		print("<br>payment_date : $payment_date\n");
		print("<br>response_code : $response_code\n");
		print("<br>payment_certificate : $payment_certificate\n");
		print("<br>authorisation_id : $authorisation_id\n");
		print("<br>currency_code : $currency_code\n");
		print("<br>card_number : $card_number\n");
		print("<br>cvv_flag: $cvv_flag\n");
		print("<br>cvv_response_code: $cvv_response_code\n");
		print("<br>bank_response_code: $bank_response_code\n");
		print("<br>complementary_code: $complementary_code\n");
		print("<br>complementary_info: $complementary_info\n");
		print("<br>return_context: $return_context\n");
		print("<br>caddie : $caddie\n");
		print("<br>receipt_complement: $receipt_complement\n");
		print("<br>merchant_language: $merchant_language\n");
		print("<br>language: $language\n");
		print("<br>customer_id: $customer_id\n");
		print("<br>order_id: $order_id\n");
		print("<br>customer_email: $customer_email\n");
		print("<br>customer_ip_address: $customer_ip_address\n");
		print("<br>capture_day: $capture_day\n");
		print("<br>capture_mode: $capture_mode\n");
		print("<br>data: $data\n");
		print("<br>order_validity: $order_validity\n");
		print("<br>transaction_condition: $transaction_condition\n");
		print("<br>statement_reference: $statement_reference\n");
		print("<br>card_validity: $card_validity\n");
		print("<br>score_value: $score_value\n");
		print("<br>score_color: $score_color\n");
		print("<br>score_info: $score_info\n");
		print("<br>score_threshold: $score_threshold\n");
		print("<br>score_profile: $score_profile\n");
		
	# OK, affichage du mode DEBUG si activé
	print (" $error <br>");
}
?>
