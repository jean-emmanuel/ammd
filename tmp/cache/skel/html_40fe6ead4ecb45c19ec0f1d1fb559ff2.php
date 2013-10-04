<?php

/*
 * Squelette : ../plugins/auto/saisies/inclure/voir_saisies.html
 * Date :      Fri, 04 Oct 2013 08:07:11 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:55 GMT
 * Boucles :   _saisies
 */ 

function BOUCLE_saisieshtml_40fe6ead4ecb45c19ec0f1d1fb559ff2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['source'] = array(table_valeur($Pile["vars"], (string)'saisies', null));
	$command['sourcemode'] = 'table';
	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_saisies';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".valeur");
		$command['orderby'] = array();
		$command['where'] = 
			array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"DATA",
		$command,
		array('../plugins/auto/saisies/inclure/voir_saisies.html','html_40fe6ead4ecb45c19ec0f1d1fb559ff2','_saisies',3,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
' .
((array_key_exists('saisie',interdire_scripts($Pile[$SP]['valeur'])))  ?
		(' ' . (	'
	' .
	interdire_scripts(saisies_generer_vue($Pile[$SP]['valeur'],interdire_scripts(((($a = entites_html(table_valeur(@$Pile[0], (string)'_env', null),true)) OR (is_string($a) AND strlen($a))) ? $a : unserialize(@serialize($Pile[0])))))) .
	'
')) :
		'') .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_saisies @ ../plugins/auto/saisies/inclure/voir_saisies.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../plugins/auto/saisies/inclure/voir_saisies.html
// Temps de compilation total: 21.001 ms
//

function html_40fe6ead4ecb45c19ec0f1d1fb559ff2($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
vide($Pile['vars'][(string)'saisies'] = interdire_scripts(saisies_verifier_afficher_si(entites_html(table_valeur(@$Pile[0], (string)'saisies', null),true),unserialize(@serialize($Pile[0]))))) .
'
' .
BOUCLE_saisieshtml_40fe6ead4ecb45c19ec0f1d1fb559ff2($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_40fe6ead4ecb45c19ec0f1d1fb559ff2', $Cache, $page, '../plugins/auto/saisies/inclure/voir_saisies.html');
}
?>