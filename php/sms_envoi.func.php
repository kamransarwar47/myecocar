<?php
define('ENVOYERSMSPRO_LOGIN',"0630606186");
define('ENVOYERSMSPRO_PASSWORD',"Myecocar2014"); //Myecocar2014
define('ENVOYERSMSPRO_ACCOUNTID',"17611"); // myecocar 19229
define('ENVOYERSMSPRO_HOST',"www.envoyersmspro.com");
define('ENVOYERSMSPRO_PROTOCOL',"https");
/* 
//Appel à la méthode sendMessage
//text, recipients, sender name
$resultXML=sendMessage("Nouveau message via l'API d'Envoyer SMS Pro depuis un script PHP",
						array("33600000000"),
						"SOCIETE");
 
//Vérification du succès de l'envoi
if($resultXML->status=="success")
{
	echo "Message envoyé <br>";
	 
	//Récupération des informations retournées par le serveur
	$messageObect=$resultXML->message;
	 
	echo "Votre messageid : ".$messageObect->message_id."<br>";
	echo "Nombre de SMS envoyé : ".$messageObect->sms_sent."<br>";
	echo "Nombre de SMS restant : ".$messageObect->sms_remaining."<br>";
}
else
{
	echo "Le message n'a pas été envoyé : <br>";
	foreach ($resultXML->children() as $child) {
		foreach($child as $key=>$value)
		{
			echo $key." : ".$value."<br>";
		}
	}
}
 */

 
/**
*
* Méthode pour récupérer tous les comptes
*/

function getAllAccounts()
{
	//construction de l'url
	$url=ENVOYERSMSPRO_PROTOCOL."://".ENVOYERSMSPRO_HOST."/api/account/getallaccounts";
	 
	//Configuration de la requête
	$requestConfig = array( 'http' => array(
							'method' => 'POST',
							'header'=>"Authorization: Basic ".base64_encode(ENVOYERSMSPRO_LOGIN.":".ENVOYERSMSPRO_PASSWORD.":".ENVOYERSMSPRO_ACCOUNTID)."\r\n"
							."Content-type: application/x-www-form-urlencoded\r\n",
							));

	//Retour du serveur
	$response = file_get_contents($url, false, stream_context_create($requestConfig));
	
	if ($response === false) {
		throw new Exception("Problem reading data from $url");
	}
	 
	//Création d'un Objet XML depuis le retour du serveur
	$responseXML = simplexml_load_string($response);
	 
	if ($responseXML === null) {
		throw new Exception("failed to decode $response as xml");
	}
	   
	return $responseXML;
}


/**
 * 
 * Méthode pour envoyer votre message
 * @param $text contient le texte du message
 * @param array $recipients contient les destinataires du message
 * @param $senderName contient le nom d'émetteur
 */
function sendMessage($text, array $recipients,$senderName)
{
	//construction de l'url
	$url=ENVOYERSMSPRO_PROTOCOL."://".ENVOYERSMSPRO_HOST."/api/message/send";
	 
	//les paramètres à passer au serveur en POST
	$postParameters="text=".urlencode($text)."&recipients=".implode(",", $recipients)."&sendername=".$senderName;
	 
	//Configuration de la requête
	$requestConfig = array( 'http' => array(
							'method' => 'POST',
							'header'=>"Authorization: Basic ".base64_encode(ENVOYERSMSPRO_LOGIN.":".ENVOYERSMSPRO_PASSWORD.":".ENVOYERSMSPRO_ACCOUNTID)."\r\n"
							."Content-type: application/x-www-form-urlencoded\r\n",
							'content' => $postParameters
							));

	//Retour du serveur
	$response = file_get_contents($url, false, stream_context_create($requestConfig));
	 
	 
	if ($response === false) {
		throw new Exception("Problem reading data from $url");
	}
	 
	//Création d'un Objet XML depuis le retour du serveur
	$responseXML = simplexml_load_string($response);
	 
	if ($responseXML === null) {
		throw new Exception("failed to decode $response as xml");
	}
	   
	return $responseXML;
}

function getCodeSMS($dec)
{
    if( $dec < 0){ $dec = abs($dec); }
	$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
       
    do{
        $h = $chars[($dec%36)] . $h;
        $dec /= 36;
    } while( $dec >= 1 );
   
    return $h;
} 
?>