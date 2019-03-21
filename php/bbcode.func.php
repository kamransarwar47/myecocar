<?php 
function BBCode($post){
    // $post = preg_replace('/"/',"&quot;",$post);
	
	global $varIdentifiant; //CLIENT : Inscription, Ajout, Reinitialisation, Oubli | COLLABORATEUR : Ajout, Reinitialisation
	global $varMotdepasse; //CLIENT : Inscription, Ajout, Reinitialisation | COLLABORATEUR : Ajout, Reinitialisation
	global $varInfosClient; //CLIENT : Modification | PARTENAIRE : Notification
	global $varInfosCollaborateur; //CLIENT : Modification
	global $varInfosOffre; //PARTENAIRE : Notification
	global $varEmailClient; //PARTENAIRE : Notification
	global $varInfosDate; //AGENDA : Inscription
	global $varInfosHeure; //AGENDA : Inscription
	global $varCommentaire; //AGENDA : Inscription
	global $varLienReinitialisation; //CLIENT : Oubli
	global $varInfosClientId; //RELANCE AUTO : client id
	global $varInfosRelanceInformation; //RELANCE AUTO : information
	global $varInfosRelanceDelais; //RELANCE AUTO : delais
	
	if (!isset($varIdentifiant))
		$varIdentifiant = 'erreur';
	if (!isset($varMotdepasse))
		$varMotdepasse = 'erreur';
	if (!isset($varInfosClient))
		$varInfosClient = 'erreur';
	if (!isset($varInfosCollaborateur))
		$varInfosCollaborateur = 'erreur';
	if (!isset($varInfosOffre))
		$varInfosOffre = 'erreur';
	if (!isset($varEmailClient))
		$varEmailClient = 'erreur';
	if (!isset($varInfosDate))
		$varInfosDate = 'erreur';
	if (!isset($varInfosHeure))
		$varInfosHeure = 'erreur';
	if (!isset($varCommentaire))
		$varCommentaire = 'erreur';
	if (!isset($varLienReinitialisation))
		$varLienReinitialisation = 'erreur';
	if (!isset($varInfosClientId))
		$varInfosClientId = 'erreur';
	if (!isset($varInfosRelanceInformation))
		$varInfosRelanceInformation = 'erreur';
	if (!isset($varInfosRelanceDelais))
		$varInfosRelanceDelais = 'erreur';
	
    $post = preg_replace("/\#identifiant\#/",$varIdentifiant,$post);
    $post = preg_replace("/\#motdepasse\#/",$varMotdepasse,$post);
    $post = preg_replace("/\#infosclient\#/",ucwords($varInfosClient),$post);
    $post = preg_replace("/\#infoscollaborateur\#/",ucwords($varInfosCollaborateur),$post);
    $post = preg_replace("/\#infosoffre\#/",ucfirst($varInfosOffre),$post);
    $post = preg_replace("/\#emailclient\#/",$varEmailClient,$post);
    $post = preg_replace("/\#infosdate\#/",ucfirst($varInfosDate),$post);
    $post = preg_replace("/\#infosheure\#/",$varInfosHeure,$post);
    $post = preg_replace("/\#commentaire\#/",$varCommentaire,$post);
    $post = preg_replace("/\#lienreinitialisation\#/",$varLienReinitialisation,$post);
    $post = preg_replace("/\#infosclientid\#/",ucfirst($varInfosClientId),$post);
    $post = preg_replace("/\#relanceinformation\#/",ucfirst($varInfosRelanceInformation),$post);
    $post = preg_replace("/\#relancedelais\#/",$varInfosRelanceDelais,$post);
    $post = preg_replace("/\[img\=(.+?)\]/","<img src='$1' alt='image groupimmo-finances' />",$post);
    $post = preg_replace("/\[url\=(.+?)\](.+?)\[\/url\]/","<a href='$1' target='_blank'>$2</a>",$post);
    $post = preg_replace("/\[b\](.+?)\[\/b\]/","<strong>$1</strong>",$post);
    $post = preg_replace("/\[i\](.+?)\[\/i\]/","<em>$1</em>",$post);
    $post = preg_replace("/\[u\](.+?)\[\/u\]/","<u>$1</u>",$post);
    $post = preg_replace("/\[s\](.+?)\[\/s\]/","<strike>$1</strike>",$post);
    return $post;
}
?>