<?php

/*
 * Squelette : theme-v1/sommaire.html
 * Date :      Fri, 04 Oct 2013 12:39:37 GMT
 * Compile :   Fri, 04 Oct 2013 12:39:40 GMT
 * Boucles :   _rubrique_courante_article, _titleA, _title, _desc, _subnav, _nav, _ariane_article, _ariane, _ariane_evt, _contenu, _sousrubriques, _evenement, _ls_evenements, _ls_evenements_p, _agendaG, _agenda, _side_articles, _sousrubriques_side, _rubrique
 */ 

function BOUCLE_rubrique_courante_articlehtml_cbd2d3ffab9778ea88b5c59ada59a2c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_rubrique_courante_article';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_rubrique",
		"articles.lang",
		"articles.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('articles.date',''), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('articles.id_article',sql_quote($in)) : 
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','INTEGER NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_rubrique_courante_article',3,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true) != '')) ?' ' :''))))!=='' ?
		($t1 . vide($Pile['vars'][(string)'rubrique_courante'] = $Pile[$SP]['id_rubrique'])) :
		'');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubrique_courante_article @ theme-v1/sommaire.html","profiler");
	return $t0;
}


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
			array('=', 'rubriques.id_rubrique', sql_quote(((($a = table_valeur($Pile["vars"], (string)'rubrique_courante', null)) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true))),'','INTEGER NOT NULL')));
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
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '2')) ?' ' :''))))!=='' ?
		($t1 . 'Calendrier ') :
		'') .
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
			array('=', 'rubriques.id_rubrique', sql_quote(((($a = table_valeur($Pile["vars"], (string)'rubrique_courante', null)) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true))),'','INTEGER NOT NULL')));
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
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_subnav',55,$GLOBALS['spip_lang'])
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
			<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'" class="item' .
(((calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : ''))  ?
		(' ' . ' ' . 'active') :
		'') .
'">' .
((($Numrows['_subnav']['compteur_boucle'] == '1'))  ?
		(' ' . '<span class="submenu-arrow"></span>') :
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
		"rubriques.alt_url",
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_nav',50,$GLOBALS['spip_lang'])
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
		<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'" class="item' .
(((calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : ''))  ?
		(' ' . ' ' . 'active') :
		'') .
(((((($a = table_valeur($Pile["vars"], (string)'rubrique_courante', null)) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true))) == $Pile[$SP]['id_rubrique']))  ?
		(' ' . ' ' . 'active') :
		'') .
'"><span>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span></a>
	
	' .
(($t1 = BOUCLE_subnavhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	<ul class="submenu">
	' . $t1 . '
	</ul>
	') :
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
		$command['select'] = array("articles.id_article",
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ariane_article',80,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_ariane_article']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= ((($Numrows['_ariane_article']['total'] == '1'))  ?
		(' ' . (	' &gt; <a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ariane',80,$GLOBALS['spip_lang'])
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
	'/"><span class="icon home">Accueil</span></a>')) :
		'') .
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ariane_evt',80,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'?cal=1&amp;id_evenement=' .
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
		"articles.titre",
		"articles.masquer_titre",
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_contenu',86,$GLOBALS['spip_lang'])
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
			((	'<span class="logo"><a href="' .
		extraire_attribut(
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'src') .
		'" title="' .
		interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
		'" rel="simplebox">') . $t2 . '</a></span>') :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(((($Pile[$SP]['masquer_titre'] != 'on')) ?' ' :''))))!=='' ?
			($t2 . (	'<h2>' .
		interdire_scripts(extraire_multi($Pile[$SP]['titre'],interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'lang', null),true)))) .
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
	interdire_scripts(propre(extraire_multi($Pile[$SP]['texte'],interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'lang', null),true))))) .
	' </div>
	')) :
		'') .
'
	
	' .
((($Numrows['_contenu']['total'] != '1'))  ?
		(' ' . (	'
	<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" class="blocklink">
		' .
	(($t2 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80'))))!=='' ?
			('<span class="logo">' . $t2 . '</span>') :
			'') .
	'
		<span class="icon file right"></span>
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
		"rubriques.alt_url",
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_sousrubriques',108,$GLOBALS['spip_lang'])
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
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'" class="blocklink">
		' .
(($t1 = strval(interdire_scripts(((($Pile[$SP-1]['afficher_logos'] == 'on')) ?' ' :''))))!=='' ?
		($t1 . (	'<span class="logo">' .
	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80')) .
	'</span>')) :
		'') .
'
		<span class="icon folder right"></span>
		<h2>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h2>
		' .
(($t1 = strval(interdire_scripts(textebrut(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'150')))))!=='' ?
		('<p>' . $t1 . '</p>') :
		'') .
'

	</a>
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_evenement',121,$GLOBALS['spip_lang'])
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
		('<div class="blocklink"><span class="icon info right"></span>' . $t1 . '</div>') :
		'') .
'
	<div class="blocklink"><span class="icon date right"></span>' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
(($t1 = strval(interdire_scripts((((affdate($Pile[$SP]['date_debut'],'Hi') != '0000')) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(affdate($Pile[$SP]['date_debut'],' // H\\hi'))) :
		'') .
'</div>
	<div class="blocklink"><span class="icon place right"></span>' .
interdire_scripts(textebrut(expanser_liens(typo($Pile[$SP]['lieu'], "TYPO", $connect, $Pile[0])))) .
' // ' .
interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0]))) .
'</div>
	<div class="blocklink"><span class="icon price right"></span>' .
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ls_evenements',130,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
		
	<a class="blocklink " href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'?cal=1&id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
	<span class="icon file right"></span>
	<span class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span>
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
		$command['orderby'] = array('evenements.date_debut DESC');
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_ls_evenements_p',143,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
		
	<a class="blocklink " href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'?cal=1&id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
	<span class="icon file right"></span>
	<span class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span>
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_agendaG',162,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'	
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'?cal=1&amp;id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" class="blocklink" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
<span class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span>
<span class="agenda-date">' .
interdire_scripts(affdate($Pile[$SP]['date_debut'],'d/m/Y')) .
(($t1 = strval(interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0])))))!=='' ?
		(' // ' . $t1) :
		'') .
'</span> 
</a>
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_agenda',174,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'	
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'?cal=1&amp;id_evenement=' .
$Pile[$SP]['id_evenement'] .
'" class="blocklink" title="' .
interdire_scripts(affdate($Pile[$SP]['date_debut'])) .
'">
<span class="agenda-title">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</span>
<span class="agenda-date">' .
interdire_scripts(affdate($Pile[$SP]['date_debut'],'d/m/Y')) .
(($t1 = strval(interdire_scripts(textebrut(propre($Pile[$SP]['adresse'], $connect, $Pile[0])))))!=='' ?
		(' // ' . $t1) :
		'') .
'</span> 
</a>
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
		"articles.id_article",
		"articles.id_rubrique",
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_side_articles',189,$GLOBALS['spip_lang'])
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
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" class="blocklink">
	' .
(($t1 = strval(interdire_scripts(((($Pile[$SP-2]['afficher_logos'] == 'on')) ?' ' :''))))!=='' ?
		($t1 . (	'<span class="logo">' .
	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80')) .
	'</span>')) :
		'') .
'
	<span class="icon file right"></span>
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
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_sousrubriques_side',187,$GLOBALS['spip_lang'])
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
<div class="blocklink"> <a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'"><span class="icon folder right"></span><h2>' .
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
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.id_parent",
		"rubriques.afficher_logos",
		"rubriques.tout_agenda",
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
			array('=', 'rubriques.id_rubrique', sql_quote(((($a = table_valeur($Pile["vars"], (string)'rubrique_courante', null)) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true))),'','INTEGER NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/sommaire.html','html_cbd2d3ffab9778ea88b5c59ada59a2c3','_rubrique',76,$GLOBALS['spip_lang'])
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
	'/"><span class="icon home">Accueil</span></a>'))) .
BOUCLE_ariane_evthtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'cal', null),true) == '2')) ?' ' :''))))!=='' ?
		($t1 . (	' &gt; <a href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/?cal=2">Calendrier AMMD</a>')) :
		'') .
'
</div>


	
<div class="content' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['masquer_calendrier'] == 'on')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'full-width') :
		'') .
'" id="content">
	' .
(($t1 = BOUCLE_contenuhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	' . $t1 . '
	<div class="spacer"></div>
	') :
		'') .
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

	<h2>Dates passées</h2>
	' . $t1 . '
	') :
		'') .
'
	
</div>
<div class="aside ' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['masquer_calendrier'] == 'on')) ?' ' :''))))!=='' ?
		($t1 . 'hidden') :
		'') .
'">

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/random-artist') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'theme-v1/sommaire.html\',\'html_cbd2d3ffab9778ea88b5c59ada59a2c3\',\'\',160,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .
(($t1 = BOUCLE_agendaGhtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="blocklink"' .
		(($t3 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'id_rubrique', null), '1'),true) == '1')) ?' ' :''))))!=='' ?
				(' ' . $t3 . 'id="home-calendar"') :
				'') .
		'>
<a href="' .
		htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		'/?cal=2"><span class="icon calendar right"></span><h2>Calendrier</h2></a>
') . $t1 . '
</div>
') :
		'') .
'

' .
(($t1 = BOUCLE_agendahtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="blocklink">
<a href="' .
		htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		'/?cal=2"><span class="icon calendar right"></span><h2>Calendrier</h2></a>
') . $t1 . '
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
// Temps de compilation total: 471.027 ms
//

function html_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html>
<html lang="fr">
' .
BOUCLE_rubrique_courante_articlehtml_cbd2d3ffab9778ea88b5c59ada59a2c3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
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
	<meta property="og:image" content="' .
interdire_scripts(url_absolue(find_in_path('css/logo.png'))) .
'"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	
	<link rel="alternate" type="application/rss+xml" title="Flux RSS" href="?page=backend" />
	<link href="' .
interdire_scripts(find_in_path('swiper/idangerous.swiper.css')) .
'" rel="stylesheet" media="screen">
	<link href="' .
interdire_scripts(find_in_path('simplebox/simplebox.css')) .
'" rel="stylesheet" media="screen">
	<link href="' .
interdire_scripts(find_in_path('css/style.css')) .
'" rel="stylesheet" media="screen">
	
	<!--[if IE]>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script> $(document).ready(function(){$(\'.blockquote > :last-child\').addClass(\'last-child\')});</script>
	<![endif]-->
	<script src="' .
interdire_scripts(find_in_path('swiper/idangerous.swiper-2.1.min.js')) .
'"></script>
	<script src="' .
interdire_scripts(find_in_path('simplebox/simplebox.js')) .
'"></script>

<script src="' .
interdire_scripts(find_in_path('mobile/selectnav.min.js')) .
'"></script>

	</head>
<body>


<div class="header">
	<div class="wrapper">
		<a class="site_title" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'"><span class="title">AMMD</span><span class="subtitle">' .
interdire_scripts(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0])) .
'</span></a>
	</div>
</div>



<div class="nav">
	<div class="wrapper">
	<ul id="navigation">
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
<div class="footer-logo">' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'0','30')) .
'</div>
Copyleft AMMD 2013 // <a href="http://www.artlibre.org" class="spip_out">Licence Art Libre</a><br/>
Retrouve l\'AMMD sur : <a href="https://twitter.com/AMMDCoorp" class="spip_out">Twitter</a> / <a href="https://github.com/AMMD" class="spip_out">GitHub</a>
</div>
</div>

<script>selectnav(\'navigation\',{nested:false}); </script>

</body>
</html>
');

	return analyse_resultat_skel('html_cbd2d3ffab9778ea88b5c59ada59a2c3', $Cache, $page, 'theme-v1/sommaire.html');
}
?>