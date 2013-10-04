<?php

/*
 * Squelette : theme-v1/sommaire.html
 * Date :      Thu, 19 Sep 2013 08:04:46 GMT
 * Compile :   Thu, 19 Sep 2013 08:05:16 GMT
 * Boucles :   _titleA, _title, _desc, _subnav, _nav, _ariane_article, _ariane, _ariane_evt, _agendaG, _agenda, _side_articles, _sousrubriques_side, _contenu, _sousrubriques, _evenement, _ls_evenements, _ls_evenements_p, _rubrique
 */ 

function BOUCLE_titleAhtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_titleA';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.titre",
		"articles.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('=', 'articles.id_article', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true)),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_titleA',8,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_titleA']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= ((($Numrows['_titleA']['total'] == '1'))  ?
		(' ' . interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) :
		'');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_titleA @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_titlehtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_title';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true)),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_title',6,$GLOBALS['spip_lang'])
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
((($Pile[$SP]['id_rubrique'] == '1'))  ?
		(' ' . (	interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
	' - ' .
	interdire_scripts(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0])))) :
		'') .
'
	' .
(($t1 = BOUCLE_titleAhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		(((($Pile[$SP]['id_rubrique'] != '1'))  ?
			(' ' . interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) :
			''))) .
'
	' .
((($Pile[$SP]['id_rubrique'] != '1'))  ?
		(' ' . (	' - ' .
	interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])))) :
		'') .
'
	');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_title @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_deschtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_desc';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.texte",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true)),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_desc',15,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= interdire_scripts(textebrut(propre($Pile[$SP]['texte'], $connect, $Pile[0])));
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_desc @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_subnavhtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_subnav',47,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_subnav']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_subnav']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<li class="submenu-item">
			<a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'" class="item' .
(((calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : ''))  ?
		(' ' . ' ' . 'active') :
		'') .
'">' .
((($Numrows['_subnav']['compteur_boucle'] == '1'))  ?
		(' ' . '<div class="submenu-arrow"></div>') :
		'') .
'<span>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span></a>
		</li>
	');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_subnav @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_navhtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0));
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_nav',42,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	
	<li class="menu-item">
		<a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'" class="item' .
(((calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : ''))  ?
		(' ' . ' ' . 'active') :
		'') .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true) == $Pile[$SP]['id_rubrique'])) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'active') :
		'') .
'"><span>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span></a>
	
	' .
(($t1 = BOUCLE_subnavhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	<ul class="submenu"><div class="relative">
	' . $t1 . (	'
		' .
		((($Pile[$SP]['id_rubrique'] == '1'))  ?
				(' ' . (	'<li class="submenu-item">
			<a href="?page=sommaire&amp;id_rubrique=' .
			$Pile[$SP]['id_rubrique'] .
			'&cal=2" class="item' .
			(($t4 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '2')) ?' ' :''))))!=='' ?
					(' ' . $t4 . 'active') :
					'') .
			'"><span>Calendrier</span></a>
		</li>')) :
				'') .
		'
	</div></ul>
	')) :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_nav @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_ariane_articlehtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_ariane_article';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_rubrique",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('=', 'articles.id_article', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true)),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ariane_article',75,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_ariane_article']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= ((($Numrows['_ariane_article']['total'] == '1'))  ?
		(' ' . (	' &gt; <a href="?page=sommaire&amp;id_rubrique=' .
	$Pile[$SP]['id_rubrique'] .
	'&id_article=' .
	$Pile[$SP]['id_article'] .
	'">' .
	interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')) .
	'</a>')) :
		'');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ariane_article @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_arianehtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	include_spip('inc/rubriques');
	$hierarchie = calcul_hierarchie_in($id_rubrique,true);
	if (!$hierarchie) return "";
	
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_ariane';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$command['where'] = 
			array(
			array('NOT', 
			array('=', 'rubriques.id_rubrique', "1")), 
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ariane',75,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_ariane']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_ariane']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
((($Numrows['_ariane']['compteur_boucle'] == '1'))  ?
		(' ' . (	'<a href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/"><div class="icon home">Accueil</div></a>')) :
		'') .
' &gt; <a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')) .
'</a>' .
BOUCLE_ariane_articlehtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP));
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ariane @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_ariane_evthtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'evenements';
		$command['id'] = '_ariane_evt';
		$command['from'] = array('evenements' => 'spip_evenements','L1' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("L1.id_rubrique",
		"evenements.id_evenement",
		"evenements.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('evenements','id_article'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('evenements.statut','!','publie',''), 
			array('=', 'evenements.id_evenement', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_evenement', null),true)),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ariane_evt',75,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
' &gt; <a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'&id_article=evt&id_evenement=' .
$Pile[$SP]['id_evenement'] .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a>');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ariane_evt @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_agendaGhtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(($Pile[$SP]['tout_agenda'] == 'on'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'evenements';
		$command['id'] = '_agendaG';
		$command['from'] = array('evenements' => 'spip_evenements','L1' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("evenements.date_debut",
		"L1.id_rubrique",
		"evenements.id_evenement",
		"evenements.titre",
		"evenements.adresse");
		$command['orderby'] = array('evenements.date_debut');
		$command['join'] = array('L1' => array('evenements','id_article'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('evenements.statut','!','publie',''), 
			array('<=', 'LEAST((UNIX_TIMESTAMP("' . normaliser_date(@$Pile[0]['date_debut']) . '")-UNIX_TIMESTAMP(evenements.date_debut))/86400,
	TO_DAYS("' . normaliser_date(@$Pile[0]['date_debut']) . '")-TO_DAYS(evenements.date_debut),
	DAYOFMONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-DAYOFMONTH(evenements.date_debut)+30.4368*(MONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-MONTH(evenements.date_debut))+365.2422*(YEAR("' . normaliser_date(@$Pile[0]['date_debut']) . '")-YEAR(evenements.date_debut)))', "0"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_agendaG',81,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'	
<div class="agenda-evt"><a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'&amp;cal=1&amp;id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
<div class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</div>
<span class="agenda-date">' .
interdire_scripts(affdate($Pile[$SP]['date_debut'],'d/m/Y')) .
(($t1 = strval(interdire_scripts((((affdate($Pile[$SP]['date_debut'],'Hi') != '0000')) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(affdate($Pile[$SP]['date_debut'],' // H\\hi'))) :
		'') .
'</span> //
' .
interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0]))) .
'
</a></div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_agendaG @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_agendahtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(($Pile[$SP]['tout_agenda'] != 'on'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'evenements';
		$command['id'] = '_agenda';
		$command['from'] = array('evenements' => 'spip_evenements','L1' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("evenements.date_debut",
		"L1.id_rubrique",
		"evenements.id_evenement",
		"evenements.titre",
		"evenements.adresse");
		$command['orderby'] = array('evenements.date_debut');
		$command['join'] = array('L1' => array('evenements','id_article'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('evenements.statut','!','publie',''), 
			array('<=', 'LEAST((UNIX_TIMESTAMP("' . normaliser_date(@$Pile[0]['date_debut']) . '")-UNIX_TIMESTAMP(evenements.date_debut))/86400,
	TO_DAYS("' . normaliser_date(@$Pile[0]['date_debut']) . '")-TO_DAYS(evenements.date_debut),
	DAYOFMONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-DAYOFMONTH(evenements.date_debut)+30.4368*(MONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-MONTH(evenements.date_debut))+365.2422*(YEAR("' . normaliser_date(@$Pile[0]['date_debut']) . '")-YEAR(evenements.date_debut)))', "0"), 
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_agenda',94,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'	
<div class="agenda-evt"><a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'&amp;cal=1&amp;id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
<div class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</div>
<span  class="agenda-date">' .
interdire_scripts(affdate($Pile[$SP]['date_debut'],'d/m/Y')) .
(($t1 = strval(interdire_scripts((((affdate($Pile[$SP]['date_debut'],'Hi') != '0000')) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(affdate($Pile[$SP]['date_debut'],' // H\\hi'))) :
		'') .
'</span> //
' .
interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0]))) .
' 
</a></div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_agenda @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_side_articleshtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(($Pile[$SP]['side_articles'] == 'on'));

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_side_articles';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_rubrique",
		"articles.id_article",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('num', 'articles.titre');
		$command['join'] = array();
		$command['limit'] = '';
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_side_articles',110,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<a href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'&amp;id_article=' .
$Pile[$SP]['id_article'] .
'" class="article">
	' .
(($t1 = strval(interdire_scripts(((($Pile[$SP-2]['afficher_logos'] == 'on')) ?' ' :''))))!=='' ?
		($t1 . (	'<div class="logo">' .
	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80')) .
	'</div>')) :
		'') .
'
	<div class="icon file right"></div>
	<h2>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h2>
	' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0])) .
'
	<div class="clear"></div>
</a>
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_side_articles @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_sousrubriques_sidehtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[$SP]['id_parent']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '1'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_sousrubriques_side';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.side_articles",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), (!(is_array($Pile[$SP]['id_parent'])?count($Pile[$SP]['id_parent']):strlen($Pile[$SP]['id_parent'])) ? '' : ((is_array($Pile[$SP]['id_parent'])) ? sql_in('rubriques.id_parent',sql_quote($in)) : 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_sousrubriques_side',108,$GLOBALS['spip_lang'])
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
(($t1 = BOUCLE_side_articleshtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="subsection"> <a href="?page=sommaire&amp;id_rubrique=' .
		$Pile[$SP]['id_rubrique'] .
		'"><div class="icon folder right"></div><h2>' .
		interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
		'</h2></a>
') . $t1 . '
</div>
') :
		'') .
'
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_sousrubriques_side @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_contenuhtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[$SP]['id_rubrique']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '1'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_contenu';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.masquer_titre",
		"articles.titre",
		"articles.id_rubrique",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('articles.date',''), (!(is_array($Pile[$SP]['id_rubrique'])?count($Pile[$SP]['id_rubrique']):strlen($Pile[$SP]['id_rubrique'])) ? '' : ((is_array($Pile[$SP]['id_rubrique'])) ? sql_in('articles.id_rubrique',sql_quote($in)) : 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('articles.id_article',sql_quote($in1)) : 
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','INTEGER NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_contenu',130,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_contenu']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
((($Numrows['_contenu']['total'] == '1'))  ?
		(' ' . (	'
	' .
	(($t2 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'300'))))!=='' ?
			('<div class="logo">' . $t2 . '</div>') :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(((($Pile[$SP]['masquer_titre'] != 'on')) ?' ' :''))))!=='' ?
			($t2 . (	'<h2>' .
		interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
		'</h2>')) :
			'') .
	'
	' .
	((($Pile[$SP]['id_rubrique'] == '17'))  ?
			(' ' . (	'<h3>' .
		interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
		'</h3>')) :
			'') .
	'
	<div class="texte">' .
	interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0])) .
	'</div>
	')) :
		'') .
'
	
	' .
((($Numrows['_contenu']['total'] != '1'))  ?
		(' ' . (	'
	<a href="?page=sommaire&amp;id_rubrique=' .
	$Pile[$SP]['id_rubrique'] .
	'&id_article=' .
	$Pile[$SP]['id_article'] .
	'" class="article">
		' .
	(($t2 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80'))))!=='' ?
			('<div class="logo">' . $t2 . '</div>') :
			'') .
	'
		<div class="icon file right"></div>
		<h2>' .
	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
	((($Pile[$SP]['id_rubrique'] == '17'))  ?
			(' ' . ' ' . (	' <br/><span class="article-date">' .
		interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))))) :
			'') .
	'</span></h2>
		<p class="preview">' .
	interdire_scripts(textebrut(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'150'))) .
	'</p>
		<div class="clear"></div>
	</a>
	')) :
		'') .
'
	');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_contenu @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_sousrubriqueshtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[$SP]['id_parent']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '1'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) != '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_sousrubriques';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.side_articles",
		"rubriques.id_rubrique",
		"rubriques.texte",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), (!(is_array($Pile[$SP]['id_parent'])?count($Pile[$SP]['id_parent']):strlen($Pile[$SP]['id_parent'])) ? '' : ((is_array($Pile[$SP]['id_parent'])) ? sql_in('rubriques.id_parent',sql_quote($in)) : 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_sousrubriques',149,$GLOBALS['spip_lang'])
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
(($t1 = strval(interdire_scripts(((($Pile[$SP]['side_articles'] != 'on')) ?' ' :''))))!=='' ?
		($t1 . (	'
	<a href="?page=sommaire&amp;id_rubrique=' .
	$Pile[$SP]['id_rubrique'] .
	'" class="subsection">
		' .
	(($t2 = strval(interdire_scripts(((($Pile[$SP-1]['afficher_logos'] == 'on')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="logo">' .
		filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80')) .
		'</div>')) :
			'') .
	'
		<div class="icon folder right"></div>
		<h2>' .
	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
	'</h2>
		<p>' .
	interdire_scripts(textebrut(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'150'))) .
	'</p>
		<div class="clear"></div>
	</a>
	')) :
		'') .
'
	');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_sousrubriques @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_evenementhtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_evenement']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '1'));

	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_evenement', null),true));

	if (!isset($command['table'])) {
		$command['table'] = 'evenements';
		$command['id'] = '_evenement';
		$command['from'] = array('evenements' => 'spip_evenements');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("evenements.titre",
		"evenements.descriptif",
		"evenements.date_debut",
		"evenements.lieu",
		"evenements.adresse",
		"evenements.tarif");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('evenements.statut','!','publie',''), (!(is_array(@$Pile[0]['id_evenement'])?count(@$Pile[0]['id_evenement']):strlen(@$Pile[0]['id_evenement'])) ? '' : ((is_array(@$Pile[0]['id_evenement'])) ? sql_in('evenements.id_evenement',sql_quote($in)) : 
			array('=', 'evenements.id_evenement', sql_quote(@$Pile[0]['id_evenement'],'','INTEGER NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_evenement',164,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<h2>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h2>	
	' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))!=='' ?
		('<div class="event-info"><div class="icon info right"></div>' . $t1 . '</div>') :
		'') .
'
	<div class="event-date"><div class="icon date right"></div>' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
(($t1 = strval(interdire_scripts((((affdate($Pile[$SP]['date_debut'],'Hi') != '0000')) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(affdate($Pile[$SP]['date_debut'],' // H\\hi'))) :
		'') .
'</div>
	<div class="event-place"><div class="icon place right"></div>' .
interdire_scripts(textebrut(expanser_liens(typo($Pile[$SP]['lieu'], "TYPO", $connect, $Pile[0])))) .
' // ' .
interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0]))) .
'</div>
	<div class="event-price"><div class="icon price right"></div>' .
interdire_scripts(textebrut(((($a = $Pile[$SP]['tarif']) OR (is_string($a) AND strlen($a))) ? $a : 'Gratuit'))) .
'</div>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_evenement @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_ls_evenementshtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'evenements';
		$command['id'] = '_ls_evenements';
		$command['from'] = array('evenements' => 'spip_evenements','L1' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("evenements.date_debut",
		"L1.id_rubrique",
		"evenements.id_evenement",
		"evenements.titre",
		"evenements.adresse");
		$command['orderby'] = array('evenements.date_debut DESC');
		$command['join'] = array('L1' => array('evenements','id_article'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('evenements.statut','!','publie',''), 
			array('<=', 'LEAST((UNIX_TIMESTAMP("' . normaliser_date(@$Pile[0]['date_debut']) . '")-UNIX_TIMESTAMP(evenements.date_debut))/86400,
	TO_DAYS("' . normaliser_date(@$Pile[0]['date_debut']) . '")-TO_DAYS(evenements.date_debut),
	DAYOFMONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-DAYOFMONTH(evenements.date_debut)+30.4368*(MONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-MONTH(evenements.date_debut))+365.2422*(YEAR("' . normaliser_date(@$Pile[0]['date_debut']) . '")-YEAR(evenements.date_debut)))', "0"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ls_evenements',173,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
		
	<a class="agenda-evt article " href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'&cal=1&id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
	<div class="icon calendar right"></div>
	<div class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</div>
	<p class="agenda-date">' .
interdire_scripts(affdate($Pile[$SP]['date_debut'],'d/m/Y')) .
(($t1 = strval(interdire_scripts((((affdate($Pile[$SP]['date_debut'],'Hi') != '0000')) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(affdate($Pile[$SP]['date_debut'],' // H\\hi'))) :
		'') .
' // ' .
interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0]))) .
'</p>
	</a>

	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ls_evenements @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_ls_evenements_phtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '2'));

	if (!isset($command['table'])) {
		$command['table'] = 'evenements';
		$command['id'] = '_ls_evenements_p';
		$command['from'] = array('evenements' => 'spip_evenements','L1' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("evenements.date_debut",
		"L1.id_rubrique",
		"evenements.id_evenement",
		"evenements.titre",
		"evenements.adresse");
		$command['orderby'] = array('evenements.date_debut');
		$command['join'] = array('L1' => array('evenements','id_article'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('evenements.statut','!','publie',''), 
			array('>', 'LEAST((UNIX_TIMESTAMP("' . normaliser_date(@$Pile[0]['date_debut']) . '")-UNIX_TIMESTAMP(evenements.date_debut))/86400,
	TO_DAYS("' . normaliser_date(@$Pile[0]['date_debut']) . '")-TO_DAYS(evenements.date_debut),
	DAYOFMONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-DAYOFMONTH(evenements.date_debut)+30.4368*(MONTH("' . normaliser_date(@$Pile[0]['date_debut']) . '")-MONTH(evenements.date_debut))+365.2422*(YEAR("' . normaliser_date(@$Pile[0]['date_debut']) . '")-YEAR(evenements.date_debut)))', "0"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ls_evenements_p',186,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
		
	<a class="agenda-evt article " href="?page=sommaire&amp;id_rubrique=' .
$Pile[$SP]['id_rubrique'] .
'&cal=1&id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
	<div class="icon calendar right"></div>
	<div class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</div>
	<p class="agenda-date">' .
interdire_scripts(affdate($Pile[$SP]['date_debut'],'d/m/Y')) .
(($t1 = strval(interdire_scripts((((affdate($Pile[$SP]['date_debut'],'Hi') != '0000')) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(affdate($Pile[$SP]['date_debut'],' // H\\hi'))) :
		'') .
' // ' .
interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0]))) .
'</p>
	</a>

	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ls_evenements_p @ theme-v1/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_rubriquehtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubrique';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.tout_agenda",
		"rubriques.id_rubrique",
		"rubriques.afficher_logos",
		"rubriques.id_parent",
		"rubriques.masquer_calendrier",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true)),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_rubrique',71,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'


<div class="ariane">
' .
(($t1 = BOUCLE_arianehtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'<a href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/"><div class="icon home">Accueil</div></a>'))) .
BOUCLE_ariane_evthtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '2')) ?' ' :''))))!=='' ?
		($t1 . ' &gt; <a href="?page=sommaire&amp;cal=2">Calendrier AMMD</a>') :
		'') .
'
</div>

<div class="aside ' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['masquer_calendrier'] == 'on')) ?' ' :''))))!=='' ?
		($t1 . 'hidden') :
		'') .
'">


' .
(($t1 = BOUCLE_agendaGhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="agenda"' .
		(($t3 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true) == '1')) ?' ' :''))))!=='' ?
				(' ' . $t3 . 'id="home-calendar"') :
				'') .
		'>
<a href="?page=sommaire&amp;cal=2"><div class="icon calendar right"></div><h2>Calendrier</h2></a>
') . $t1 . '
</div>
') :
		'') .
'

' .
(($t1 = BOUCLE_agendahtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div class="agenda">
<a href="?page=sommaire&amp;cal=2"><div class="icon calendar right"></div><h2>Calendrier</h2></a>
' . $t1 . '
</div>
') :
		'') .
'


' .
(($t1 = BOUCLE_sousrubriques_sidehtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
' . $t1 . '
') :
		'') .
'

</div>
	
<div class="content' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['masquer_calendrier'] == 'on')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'full-width') :
		'') .
'" id="content">
	
	' .
BOUCLE_contenuhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	
	' .
(($t1 = BOUCLE_sousrubriqueshtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	' . $t1 . '
	') :
		'') .
'
	
	
	' .
BOUCLE_evenementhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	
	
	' .
(($t1 = BOUCLE_ls_evenementshtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	<h2>Calendrier AMMD</h2>
	' . $t1 . '
	') :
		'') .
'
	
	' .
(($t1 = BOUCLE_ls_evenements_phtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	<hr/>
	<h2>Dates passées</h2>
	' . $t1 . '
	') :
		'') .
'
	
</div>


');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubrique @ theme-v1/sommaire.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette theme-v1/sommaire.html
// Temps de compilation total: 468.867 ms
//

function html_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html>
<html lang="fr">

<head>
	<title>
	' .
BOUCLE_titlehtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</title>

	<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
	<meta name="author" content="Jean-Emmanuel Doucet">
	<meta name="description" content="' .
(($t1 = BOUCLE_deschtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		(interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0]),'250'))))) .
'" />
	<meta name="viewport" content="width=device-width" />
	<meta property="og:title" content="' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
(($t1 = strval(interdire_scripts(textebrut(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0])))))!=='' ?
		(' - ' . $t1) :
		'') .
'"/>
	<meta property="og:image" content="' .
interdire_scripts(url_absolue(find_in_path('css/logo.png'))) .
'"/>

	<link rel="alternate" type="application/rss+xml" title="' .
_T('public|spip|ecrire:syndiquer_rubrique') .
'" href="?page=backend" />
	<link href="' .
interdire_scripts(find_in_path('swiper/idangerous.swiper.css')) .
'" rel="stylesheet" media="screen">
	<link href="' .
interdire_scripts(find_in_path('css/style.css')) .
'" rel="stylesheet" media="screen">
	
	<!--[if IE]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script><![endif]-->
	<script src="' .
interdire_scripts(find_in_path('swiper/idangerous.swiper-2.1.min.js')) .
'"></script>

	</head>
<body>


<div class="header">
	<div class="wrapper">
		<a class="site_title" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'"><div class="title">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
'</div> ' .
interdire_scripts(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0])) .
'</a>
	</div>
</div>



<div class="nav">
	<div class="wrapper">
	<ul>
	' .
BOUCLE_navhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</ul>
	</div>
</div>

<div class="container">

<div class="wrapper">

' .
BOUCLE_rubriquehtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
<div class="clear"></div>
</div>
</div>

<div class="footer">
<div class="wrapper">

</div>
</div>
<script>
var h = document.getElementById(\'content\').offsetHeight;
document.getElementById(\'home-calendar\').style.minHeight = (h-34)+\'px\';
</script>
</body>
</html>
');

	return analyse_resultat_skel('html_cbd2d3ffab9778ea88b5c59ada59a2c3', $Cache, $page, 'theme-v1/sommaire.html');
}
?>