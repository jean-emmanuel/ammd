<?php

/*
 * Squelette : ../squelettes-dist/modeles/lesauteurs.html
 * Date :      Sun, 19 Jan 2014 17:55:33 GMT
 * Compile :   Fri, 07 Feb 2014 11:39:53 GMT
 * Boucles :   _auteurs
 */ 

function BOUCLE_auteurshtml_d55455d94f119a45eec6b1a1e281c6c1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteurs';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array("auteurs.id_auteur");
		$command['select'] = array("auteurs.nom",
		"auteurs.id_auteur");
		$command['orderby'] = array('auteurs.nom');
		$command['join'] = array('L1' => array('auteurs','id_auteur'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('=', 'L1.objet', sql_quote(@$Pile[0]['objet'],'','VARCHAR (25) DEFAULT \'\' NOT NULL COLLATE NOCASE')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../squelettes-dist/modeles/lesauteurs.html','html_d55455d94f119a45eec6b1a1e281c6c1','_auteurs',9,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = (
'
<span class="vcard author"><a class="url fn spip_in" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</a></span>');
		$t0 .= ((strlen($t1) && strlen($t0)) ? ', ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteurs @ ../squelettes-dist/modeles/lesauteurs.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../squelettes-dist/modeles/lesauteurs.html
// Temps de compilation total: 10.911 ms
//

function html_d55455d94f119a45eec6b1a1e281c6c1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
BOUCLE_auteurshtml_d55455d94f119a45eec6b1a1e281c6c1($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_d55455d94f119a45eec6b1a1e281c6c1', $Cache, $page, '../squelettes-dist/modeles/lesauteurs.html');
}
?>