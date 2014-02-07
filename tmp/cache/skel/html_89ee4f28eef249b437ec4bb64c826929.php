<?php

/*
 * Squelette : skeleton/modeles/spotlight.html
 * Date :      Fri, 07 Feb 2014 09:59:33 GMT
 * Compile :   Fri, 07 Feb 2014 11:37:19 GMT
 * Boucles :   _randomR
 */ 

function BOUCLE_randomRhtml_89ee4f28eef249b437ec4bb64c826929(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_randomR';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rand() AS alea",
		"rubriques.alt_url",
		"rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.lang");
		$command['orderby'] = array('alea');
		$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', "2"), 
			array('NOT', 
			array('=', 'rubriques.id_rubrique', "35")));
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
		array('skeleton/modeles/spotlight.html','html_89ee4f28eef249b437ec4bb64c826929','_randomR',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<div class="blocklink">
	<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'"><h2 class="nomargin">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h2></a>
	<br/>
	' .
(($t1 = strval(extraire_attribut(filtrer('image_graver', filtrer('image_recadre',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'256','0'),'256','0','center top','dddddd')),'src')))!=='' ?
		((	'<div class="logo medium"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'"><img src="') . $t1 . (	'" alt="logo_' .
	$Pile[$SP]['id_rubrique'] .
	'"/></a></div>')) :
		'') .
' 
	<p>' .
interdire_scripts(couper(textebrut(propre($Pile[$SP]['texte'], $connect, $Pile[0])),'200','&nbsp;(...)')) .
'</p>
	<div class="clear"></div>
</div>
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_randomR @ skeleton/modeles/spotlight.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette skeleton/modeles/spotlight.html
// Temps de compilation total: 2.653 ms
//

function html_89ee4f28eef249b437ec4bb64c826929($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_randomRhtml_89ee4f28eef249b437ec4bb64c826929($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>');

	return analyse_resultat_skel('html_89ee4f28eef249b437ec4bb64c826929', $Cache, $page, 'skeleton/modeles/spotlight.html');
}
?>