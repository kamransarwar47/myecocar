<?php 
$dbhost = 'myecocarworld.mysql.db';
$dbname = 'myecocarworld';
$dbuser = 'myecocarworld'; 
$dbpass = 'MyEcoCar2018';

$ROOTSMS = "/home/myecocar/sms";
$ROOT = "/home/myecocar/www";
$LANG = "fr";
$countryTableColumn = "nom";
$countryNameDefaut = "France";
$prefixeDefault = 33;
$disabledWord = "DESACTIVER";
$jours = array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');
$mois = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
$messageObjets = array('Bagages', 'Détours', 'Horaires', 'Autres...');
$offresAcceptation = array('Immédiate','moins de 1h','moins de 3h','moins de 6h','moins de 12h');
$objetProfil = array('Utilisation d\'un faux nom', 'Publication régulière de mauvaises offres', 'Compte frauduleux', 'Profil d\'entreprise ou organisation', 'Autres raisons...');
$objetMessage = array('Contenu indésirable', 'Contenu publicitaire', 'Contenu incitant à la violence/haine', 'Contenu illicite', 'Autres raisons...');

function traduction($lang, $elem, $keys = array(), $vars = array()){
	global $bdd, $dbhost, $dbname, $dbuser, $dbpass;
	$lang = strtolower($lang);
	$langs = array("fr", "en", "de");
	// Si la connexion à la bdd n'est pas établi
	if (empty($bdd)) $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
	// Si la langue existe
	if (in_array($lang, $langs)){
		// Si l'élément existe
		$elemRP = $bdd->query('SELECT '.$lang.' FROM myecocar_traductions WHERE nom = \''.$elem.'\'');
		if ($element = $elemRP->fetch()){
			$return = $element[$lang];
			if (count($keys) > 0 && count($vars) > 0 && count($keys) == count($vars)){
				$return = str_replace($keys, $vars, $element[$lang]);
			}
			return html_entity_decode($return, ENT_QUOTES, 'UTF-8');
		}else return false;
	}else return false;
}
?>