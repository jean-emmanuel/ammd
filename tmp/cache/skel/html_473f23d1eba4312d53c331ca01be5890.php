<?php

/*
 * Squelette : skeleton/inc/head.html
 * Date :      Fri, 07 Feb 2014 09:57:14 GMT
 * Compile :   Fri, 07 Feb 2014 11:37:20 GMT
 * Boucles :   _subnav, _nav, _mnav, _msnav
 */ 

function BOUCLE_subnavhtml_473f23d1eba4312d53c331ca01be5890(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_subnav';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.alt_url",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('NOT', 
			array('=', 'rubriques.rubrique_cachee', "'on'")));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/inc/head.html','html_473f23d1eba4312d53c331ca01be5890','_subnav',46,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'<li' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>
						<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a>
					</li>');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_subnav @ skeleton/inc/head.html","profiler");
	return $t0;
}


function BOUCLE_navhtml_473f23d1eba4312d53c331ca01be5890(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_nav';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.alt_url",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['where'] = 
			array(
			array('=', 'rubriques.id_parent', 0), 
			array('NOT', 
			array('=', 'rubriques.rubrique_cachee', "'on'")));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/inc/head.html','html_473f23d1eba4312d53c331ca01be5890','_nav',41,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<li' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>
		
				<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'" class="item"><span>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span></a>
		
				' .
(($t1 = BOUCLE_subnavhtml_473f23d1eba4312d53c331ca01be5890($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<ul class="submenu">
						<span class="submenu-arrow"></span><span class="submenu-arrowb"></span>
					' . $t1 . '
				</ul>') :
		'') .
'
			
			</li>	
			');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_nav @ skeleton/inc/head.html","profiler");
	return $t0;
}


function BOUCLE_mnavhtml_473f23d1eba4312d53c331ca01be5890(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_mnav';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.alt_url",
		"rubriques.id_rubrique",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['where'] = 
			array(
			array('=', 'rubriques.id_parent', 0), 
			array('NOT', 
			array('=', 'rubriques.rubrique_cachee', "'on'")));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/inc/head.html','html_473f23d1eba4312d53c331ca01be5890','_mnav',57,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<option value="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</option>
			');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_mnav @ skeleton/inc/head.html","profiler");
	return $t0;
}


function BOUCLE_msnavhtml_473f23d1eba4312d53c331ca01be5890(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_msnav';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.alt_url",
		"rubriques.id_rubrique",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.id_parent', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('NOT', 
			array('=', 'rubriques.rubrique_cachee', "'on'")));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/inc/head.html','html_473f23d1eba4312d53c331ca01be5890','_msnav',66,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<option value="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</option>
			');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_msnav @ skeleton/inc/head.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette skeleton/inc/head.html
// Temps de compilation total: 7.590 ms
//

function html_473f23d1eba4312d53c331ca01be5890($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html>
<html lang="' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'lang', null), spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])),true)) .
'">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
	
	<meta name="designer" content="Jean-Emmanuel Doucet"/>
	<meta name="dcterms.license" content="Copyleft - Free Art License"/>
	<link rel="schema.dcterms" href="http://artlibre.org/licence/lal/en"/>

	<title>' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'meta_title', null),true)) .
'</title>
	<meta name="description" content="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'meta_description', null),true)) .
'"/>
	<meta property="og:title" content="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'meta_title', null),true)) .
'"/>
	<meta property="og:image" content="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'meta_logo', null),true)) .
'"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
	
	<link href=\'http://fonts.googleapis.com/css?family=Open+Sans:400,700\' rel=\'stylesheet\' type=\'text/css\'>
	<link href="' .
interdire_scripts(find_in_path('css/font-awesome.css')) .
'" rel="stylesheet" media="screen">
	
	<link href="' .
interdire_scripts(find_in_path('css/style.css')) .
'" rel="stylesheet" media="screen">
	
	<link href="' .
interdire_scripts(filtre_compacte_dist(find_in_path('css/idangerous.swiper.css'))) .
'" rel="stylesheet" media="screen">
	<link href="' .
interdire_scripts(find_in_path('css/simplebox.css')) .
'" rel="stylesheet" media="screen">
	
	<script src="' .
interdire_scripts(find_in_path('js/scripts.js')) .
'" type="text/javascript"></script>
</head>

<body>
<div class="section-top">
	<div class="header">
		<div class="wrapper">
			<a class="header-link" href="./">
				<span class="title">' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
'</span>
				<span class="subtitle">' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0]))) .
'</span>
			</a>
		</div>
	</div>

	<div class="navigation">
		<div class="wrapper">
			<ul class="menu float-left">
			' .
BOUCLE_navhtml_473f23d1eba4312d53c331ca01be5890($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			</ul>
			
			' .
(($t1 = BOUCLE_mnavhtml_473f23d1eba4312d53c331ca01be5890($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<select class="mobile-navigation" onchange="window.location.href=this[this.selectedIndex].value">
			<option>Rubriques</option>
			' . $t1 . '
			</select>
			') :
		'') .
'
			
			' .
(($t1 = BOUCLE_msnavhtml_473f23d1eba4312d53c331ca01be5890($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<select class="mobile-subnavigation" onchange="window.location.href=this[this.selectedIndex].value">
			<option>Sous rubriques</option>
			' . $t1 . '
			</select>
			') :
		'') .
'
			
			<div class="nav-links float-right">
				<a href="' .
vider_url(urlencode_1738(generer_url_entite('85', 'article', '', '', true))) .
'" title="S\'incrire à la Newsletter" class="' .
(((@$Pile[0]['id_article'] == '85'))  ?
		(' ' . ' ' . 'on') :
		'') .
'"><i class="fa fa-bullhorn fa-fw fa-fh"></i></a>
				<a href="' .
vider_url(urlencode_1738(generer_url_entite('86', 'article', '', '', true))) .
'" title="Faire un don / Adhérer" class="' .
(((@$Pile[0]['id_article'] == '86'))  ?
		(' ' . ' ' . 'on') :
		'') .
'"><i class="fa fa-euro fa-fw fa-fh"></i></a>
				<a ' .
(($t1 = strval(((
((!is_array($l = quete_logo('id_rubrique', 'off', @$Pile[0]['id_rubrique'],quete_parent(@$Pile[0]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))) ?' ' :'')))!=='' ?
		($t1 . 'href="#"') :
		'') .
'class="background-toggle' .
(($t1 = strval(((
((!is_array($l = quete_logo('id_rubrique', 'off', @$Pile[0]['id_rubrique'],quete_parent(@$Pile[0]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))) ?'' :' ')))!=='' ?
		(' ' . $t1 . 'disabled') :
		'') .
'" ' .
(($t1 = strval(((
((!is_array($l = quete_logo('id_rubrique', 'off', @$Pile[0]['id_rubrique'],quete_parent(@$Pile[0]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))) ?' ' :'')))!=='' ?
		($t1 . 'onclick="$(\'body\').toggleClass(\'photo-mode\');$(this).toggleClass(\'on\');return false;"') :
		'') .
'><i class="fa fa-picture-o fa-fw fa-fh"></i></a>
			</div>
		</div>
	</div>			
</div>



<div class="container">
	' .
(($t1 = strval(extraire_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'off', @$Pile[0]['id_rubrique'],quete_parent(@$Pile[0]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'1600')),'src')))!=='' ?
		('<div class="background" style="background-image:url(' . $t1 . ')"></div>') :
		'') .
'
	<div class="wrapper">
');

	return analyse_resultat_skel('html_473f23d1eba4312d53c331ca01be5890', $Cache, $page, 'skeleton/inc/head.html');
}
?>