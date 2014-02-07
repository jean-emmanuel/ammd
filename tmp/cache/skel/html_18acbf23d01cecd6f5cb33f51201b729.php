<?php

/*
 * Squelette : ../plugins/auto/saisies/inclure/generer_saisies.html
 * Date :      Sat, 19 Oct 2013 21:00:17 GMT
 * Compile :   Fri, 07 Feb 2014 10:27:03 GMT
 * Boucles :   _contenu
 */ 

function BOUCLE_contenuhtml_18acbf23d01cecd6f5cb33f51201b729(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['source'] = array(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'saisies', null),true)));
	$command['sourcemode'] = 'table';
	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_contenu';
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
		array('../plugins/auto/saisies/inclure/generer_saisies.html','html_18acbf23d01cecd6f5cb33f51201b729','_contenu',39,$GLOBALS['spip_lang'])
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
	saisies_generer_html($Pile[$SP]['valeur'],interdire_scripts(((($a = entites_html(table_valeur(@$Pile[0], (string)'_env', null),true)) OR (is_string($a) AND strlen($a))) ? $a : unserialize(@serialize($Pile[0]))))) .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_contenu @ ../plugins/auto/saisies/inclure/generer_saisies.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../plugins/auto/saisies/inclure/generer_saisies.html
// Temps de compilation total: 3.668 ms
//

function html_18acbf23d01cecd6f5cb33f51201b729($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
BOUCLE_contenuhtml_18acbf23d01cecd6f5cb33f51201b729($Cache, $Pile, $doublons, $Numrows, $SP) .
'


' .
(($t1 = strval(interdire_scripts((((((entites_html(table_valeur(@$Pile[0], (string)'from_fieldset', null),true)) ?'' :' ')) AND (interdire_scripts((((saisies_afficher_si(entites_html(table_valeur(@$Pile[0], (string)'saisies', null),true))) OR (interdire_scripts(saisies_afficher_si_remplissage(entites_html(table_valeur(@$Pile[0], (string)'saisies', null),true))))) ?' ' :'')))) ?' ' :''))))!=='' ?
		($t1 . (	' ' .
	recuperer_fond( 'inclure/js_afficher_si' , array_merge($Pile[0],array()), array('compil'=>array('../plugins/auto/saisies/inclure/generer_saisies.html','html_18acbf23d01cecd6f5cb33f51201b729','',46,$GLOBALS['spip_lang'])), ''))) :
		'') .
'
');

	return analyse_resultat_skel('html_18acbf23d01cecd6f5cb33f51201b729', $Cache, $page, '../plugins/auto/saisies/inclure/generer_saisies.html');
}
?>