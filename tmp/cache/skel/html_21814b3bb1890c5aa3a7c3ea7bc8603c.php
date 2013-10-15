<?php

/*
 * Squelette : theme-v1/inc/random-artist.html
 * Date :      Wed, 09 Oct 2013 08:23:14 GMT
 * Compile :   Tue, 15 Oct 2013 14:59:30 GMT
 * Boucles :   _randomA, _randomR
 */ 

function BOUCLE_randomAhtml_21814b3bb1890c5aa3a7c3ea7bc8603c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_randomA';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_rubrique",
		"articles.titre",
		"articles.id_article",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/inc/random-artist.html','html_21814b3bb1890c5aa3a7c3ea7bc8603c','_randomA',2,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" class="blocklink">
<h2><i class="icon-lightbulb right"></i>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h2>
' .
(($t1 = strval(filtrer('image_graver',filtrer('image_recadre',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'224','0'),'224','0','center top','dddddd'))))!=='' ?
		('<div class="logo">' . $t1 . '</div>') :
		'') .
' <p>' .
interdire_scripts(couper(textebrut(propre($Pile[$SP]['texte'], $connect, $Pile[0])),'200','&nbsp;(...)')) .
'</p>
<div class="clear"></div>
</a>
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_randomA @ theme-v1/inc/random-artist.html","profiler");
	return $t0;
}


function BOUCLE_randomRhtml_21814b3bb1890c5aa3a7c3ea7bc8603c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true) == '1'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '2'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true) == ''));

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_randomR';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rand() AS alea",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array('alea');
		$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', "2"), 
			array('NOT', 
			array('=', 'rubriques.id_rubrique', "12")));
		$command['join'] = array();
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/inc/random-artist.html','html_21814b3bb1890c5aa3a7c3ea7bc8603c','_randomR',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
BOUCLE_randomAhtml_21814b3bb1890c5aa3a7c3ea7bc8603c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_randomR @ theme-v1/inc/random-artist.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette theme-v1/inc/random-artist.html
// Temps de compilation total: 39.002 ms
//

function html_21814b3bb1890c5aa3a7c3ea7bc8603c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_randomRhtml_21814b3bb1890c5aa3a7c3ea7bc8603c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>');

	return analyse_resultat_skel('html_21814b3bb1890c5aa3a7c3ea7bc8603c', $Cache, $page, 'theme-v1/inc/random-artist.html');
}
?>