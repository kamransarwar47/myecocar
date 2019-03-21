<?php session_start();

if (!empty($_SESSION['clientID'])){
	include('../bdd_connexion.php');
	$uid = intval($_SESSION['clientID']);
	$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
	$userRQ = 'SELECT * FROM myecocar_utilisateurs WHERE id = \''.$uid.'\' ORDER BY id ASC';
	$userRP = $bdd->query($userRQ);
	if ($user = $userRP->fetch()){ // Si le compte utilisateur existe
	
		// if ($uid != 12) die("Maintenance en cours...");
		
		$firstName = $user['prenom'];
		$lastName = $user['nom'];
		$etat = 1;
		$code = 0;
		if ($user['verifMail'] == '1' && $user['verifTel'] == '1'){
			if (isset($_SESSION['reservation'])){ // Si le formulaire est envoyé
				// Information de la réservation
				$offreID = intval($_SESSION['reservation']['offreID']);
				$places = intval($_SESSION['reservation']['places']);
				if ($places > 0){ // Si la demande est correcte 
					// Si le trajet existe
					$trajetsRQ = 'SELECT * FROM myecocar_trajets WHERE id = \''.$offreID.'\' AND dateDepart > \''.time().'\' AND etat = \'1\' ORDER BY id DESC';
					$trajetsRP = $bdd->query($trajetsRQ);
					if ($trajets = $trajetsRP->fetch()){
						// Combien de réservations sont déjà prises
						$reservationsRQ = 'SELECT COUNT(*) totalReservations FROM myecocar_reservations WHERE trajetID = \''.$offreID.'\' AND remboursement = 0 AND paiement = \'1\' AND etat = \'1\'';
						$reservationsRP = $bdd->query($reservationsRQ);
						$reservations = $reservationsRP->fetch();
						$placeRestantes = $trajets['places']-$reservations['totalReservations'];
						$acceptation = ($trajets['acceptation'] > '0') ? '0' : '1';
						if ($places <= $placeRestantes){
							$reservationsPersoRQ = 'SELECT COUNT(*) totalReservationsPerso FROM myecocar_reservations WHERE trajetID = \''.$offreID.'\' AND uID = \''.$uid.'\' AND paiement = \'0\' AND etat = \'1\'';
							$reservationsPersoRP = $bdd->query($reservationsPersoRQ);
							$reservationsPerso = $reservationsPersoRP->fetch();
							$places -= $reservationsPerso['totalReservationsPerso'];
							for($i=1;$i<=$places;$i++){
								$creation = $bdd->exec('INSERT INTO myecocar_reservations(trajetID, uID, acceptation, etat) 
														VALUES(\''.$offreID.'\', \''.$uid.'\', \''.$acceptation.'\', \''.$etat.'\')');
							}
							
							$reservationsID = '';
							
							$places = 0;
							$reservationValidationRQ = 'SELECT * FROM myecocar_reservations WHERE trajetID = \''.$offreID.'\' AND uID = \''.$uid.'\' AND paiement = \'0\' AND etat = \'1\'';
							$reservationValidationRP = $bdd->query($reservationValidationRQ);
							while ($reservationValidation = $reservationValidationRP->fetch()){
								$reservationsID .= $reservationValidation['id'].'-';
								$places += 1;
								if ($places == intval($_SESSION['reservation']['places']))
									break;
							}
							
							$places = (intval($_SESSION['reservation']['places']) == $places) ? intval($_SESSION['reservation']['places']) : 0;
							if (!empty($reservationsID) && !empty($places)){
								$totalTTC = round(((intval($trajets['prix'])*$places)*1.095)+0.9, 2);
								// $totalTTC = 1.00;
								$clientID = $uid;
								$ticket = substr($reservationsID, 0, -1);
								if (!empty($totalTTC) && !empty($clientID) && !empty($ticket)){
									include('../redirect_link.php');
									
									// INFORMATIONS DE LA TRANSACTION
									$amout = number_format($totalTTC, 2, '', '');
									// $amout = 100;
									$customer = $clientID;
									$order = $ticket;
									$transactionTicket = 'mec_'.$uid.'_'.$offreID.'_'.$order;
									
									$transactionsRQ = 'SELECT * FROM myecocar_transactions WHERE ticket = \''.$transactionTicket.'\' AND datePaiement = 0';
									$transactionsRP = $bdd->query($transactionsRQ);
									if (!$transactions = $transactionsRP->fetch()){
										// Création d'une nouvelle transaction
										$creation = $bdd->exec('INSERT INTO myecocar_transactions(ticket, uid, tid, rid, montant) 
																VALUES(\''.$transactionTicket.'\', \''.$uid.'\', \''.$offreID.'\', \''.$order.'\', \''.$totalTTC.'\')');
									}
									
									// PARAMETRAGE DE LA TRANSACTION
									$parm="merchant_id=045225889000022";
									$parm="$parm merchant_country=fr";
									$parm="$parm amount=$amout";
									$parm="$parm currency_code=978";
									
									$parm="$parm pathfile=/home/myecocar/paiement/param/pathfile";
									
									$transactionsRQ = 'SELECT id FROM myecocar_transactions WHERE ticket = \''.$transactionTicket.'\' AND datePaiement = 0';
									$transactionsRP = $bdd->query($transactionsRQ);
									if ($transactions = $transactionsRP->fetch())
										$transactionID = intval($transactions['id']);
									else
										$transactionID = mt_rand(1000, 9999);
									$parm="$parm transaction_id=$transactionID";
									$parm="$parm normal_return_url=http://www.myecocar.fr/php/sogenactif/response.php";
									$parm="$parm cancel_return_url=http://www.myecocar.fr/offre/$offreID/";
									$parm="$parm automatic_response_url=http://www.myecocar.fr/php/sogenactif/response.php";
									// $parm="$parm language=fr";
									// $parm="$parm payment_means=CB,2,VISA,2,MASTERCARD,2";
									// $parm="$parm header_flag=no";
									// $parm="$parm capture_day=";
									// $parm="$parm capture_mode=";
									// $parm="$parm bgcolor=";
									// $parm="$parm block_align=";
									// $parm="$parm block_order=";
									// $parm="$parm textcolor=";
									// $parm="$parm receipt_complement=";
									// $parm="$parm caddie=mon_caddie";
									$parm="$parm customer_id=$customer";
									// $parm="$parm customer_email=";
									// $parm="$parm customer_ip_address=";
									$parm="$parm data=$offreID";
									// $parm="$parm return_context=";
									// $parm="$parm target=";
									$parm="$parm order_id=$order";
									
									// Les valeurs suivantes ne sont utilisables qu'en pré-production
									// Elles nécessitent l'installation de vos fichiers sur le serveur de paiement
									
									// $parm="$parm normal_return_logo=";
									// $parm="$parm cancel_return_logo=";
									// $parm="$parm submit_logo=";
									// $parm="$parm logo_id=";
									// $parm="$parm logo_id2=";
									// $parm="$parm advert=";
									// $parm="$parm background_id=";
									// $parm="$parm templatefile=";
									
									// $path_bin = "/home/myecocar/paiement/bin/static/request";
									$path_bin = "/home/myecocar/www/php/sogenactif/bin/static/request";
									$parm = escapeshellcmd($parm);	
									$result=exec("$path_bin $parm");
									
									$tableau = explode ("!", "$result");
									
									$status = $tableau[1];
									$error = $tableau[2];
									$message = $tableau[3];
									
									//  analyse du code retour
									if (( $status == "" ) && ( $error == "" ) ){
										$reponse = "<strong>Attention!</strong> Impossible de donner suite à votre demande."; // EXE introuvable
									}elseif ($status != 0){//	Erreur, affiche le message d'erreur
										$reponse = "<strong>Attention!</strong> Nous ne pouvons donner une suite favorable à votre demande."; // Defaut de paiement
									}else{//	OK, affiche le formulaire HTML
										// REPONSE
										$code = 1;
										$reponse = '
										<div class="panier" style="padding:0;">
											<div class="col-xs-12">
												<div class="form-group text-center">
													<h3 id="titre">Moyen de paiement</h3>
												</div>
												<div id="etape1">
													<br>'.$message.'
												</div>
												<div class="form-group">
													<div class="clearfix"></div>
												</div>
											</div>
											<div class="form-group"><div class="clearfix"></div></div>
										</div>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position:absolute;top:10px;right:15px;">&times;</button>';
									}
									
									
								}
							}
							else
								$reponse = '<strong>Attention!</strong> Impossible de donner suite à votre demande.';
						}
						else
							$reponse = '<strong>Attention!</strong> Il ne reste plus suffisament de places disponibles.';
					}
					else
						$reponse = '<strong>Attention!</strong> Ce trajet n\'existe pas ou a été supprimé.';
				}
				else
					$reponse = '<strong>Attention!</strong> Veuillez sélectionner un nombre de place correcte.';
			}
		}
		else
			$reponse = '<strong>Attention!</strong> Vous devez valider votre adresse email et numéro de téléphone pour accéder à ce service.';
	}
	else
		$reponse = '<strong>Attention!</strong> Vos informations ne sont pas accessibles.';
}
echo $reponse;
?>