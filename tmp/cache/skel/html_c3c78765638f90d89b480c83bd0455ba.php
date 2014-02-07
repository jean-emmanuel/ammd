<?php

/*
 * Squelette : skeleton/sommaire.html
 * Date :      Fri, 07 Feb 2014 08:45:30 GMT
 * Compile :   Fri, 07 Feb 2014 11:37:19 GMT
 * Boucles :   _date_tri_futur, _date_tri_passe, _articles, _sous_rubriques, _articles_laterals, _sous_rubriques_laterales, _contexte_sommaire
 */ 

function BOUCLE_date_tri_futurhtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_mot']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_date_tri_futur';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.lang",
		"articles.titre");
		$command['orderby'] = array('articles.date');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('<', 'LEAST((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(articles.date))/86400,
	TO_DAYS(NOW())-TO_DAYS(articles.date),
	DAYOFMONTH(NOW())-DAYOFMONTH(articles.date)+30.4368*(MONTH(NOW())-MONTH(articles.date))+365.2422*(YEAR(NOW())-YEAR(articles.date)))', "0"), (!(is_array(@$Pile[0]['id_mot'])?count(@$Pile[0]['id_mot']):strlen(@$Pile[0]['id_mot'])) ? '' : ((is_array(@$Pile[0]['id_mot'])) ? sql_in('L1.id_mot',sql_quote($in)) : 
			array('=', 'L1.id_mot', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_mot', null),true)),'','bigint(21) DEFAULT \'0\' NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_date_tri_futur',20,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_date_tri_futur']['compteur_boucle'] = 0;
	$Numrows['_date_tri_futur']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_date_tri_futur']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
vide($Pile['vars'][$_zzz=(string)'articles_tri'] = array_merge(table_valeur($Pile["vars"], (string)'articles_tri', null),array($Numrows['_date_tri_futur']['compteur_boucle'] => $Pile[$SP]['id_article']))));
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_date_tri_futur @ skeleton/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_date_tri_passehtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_mot']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_date_tri_passe';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.lang",
		"articles.titre");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('>=', 'LEAST((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(articles.date))/86400,
	TO_DAYS(NOW())-TO_DAYS(articles.date),
	DAYOFMONTH(NOW())-DAYOFMONTH(articles.date)+30.4368*(MONTH(NOW())-MONTH(articles.date))+365.2422*(YEAR(NOW())-YEAR(articles.date)))', "0"), (!(is_array(@$Pile[0]['id_mot'])?count(@$Pile[0]['id_mot']):strlen(@$Pile[0]['id_mot'])) ? '' : ((is_array(@$Pile[0]['id_mot'])) ? sql_in('L1.id_mot',sql_quote($in)) : 
			array('=', 'L1.id_mot', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_mot', null),true)),'','bigint(21) DEFAULT \'0\' NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_date_tri_passe',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_date_tri_passe']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_date_tri_passe']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
vide($Pile['vars'][$_zzz=(string)'articles_tri'] = array_merge(table_valeur($Pile["vars"], (string)'articles_tri', null),array(plus($Numrows['_date_tri_passe']['compteur_boucle'],table_valeur($Pile["vars"], (string)'compteur_present', null)) => $Pile[$SP]['id_article']))));
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_date_tri_passe @ skeleton/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_articleshtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (table_valeur($Pile["vars"], (string)'articles_tri', null)))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$command['pagination'] = array((isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : null), 10);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.descriptif",
		"articles.lang");
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in) . ')')));
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), sql_in('articles.id_article',sql_quote($in)));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_articles',25,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : _request('debut_articles');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 9), $Numrows['_articles']['total'] - 1);
	$Numrows['_articles']['grand_total'] = $Numrows['_articles']['total'];
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_articles']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<a class="blocklink article-' .
$Pile[$SP]['id_article'] .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'articles', '', '', true))) .
'">
	' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80'))))!=='' ?
		('<div class="logo small float-left">' . $t1 . '</div>') :
		'') .
'
	<i class="fa fa-file float-right"></i><h2 class="nomargin">' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h2>
	' .
(($t1 = strval(interdire_scripts((((annee(normaliser_date($Pile[$SP]['date'])) >= '2000')) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	((($Numrows['_articles']['compteur_boucle'] <= table_valeur($Pile["vars"], (string)'compteur_present', null)))  ?
			(' ' . (	'<p class="article_date nomargin"><i class="fa fa-clock-o"></i> ' .
		(($t3 = strval(interdire_scripts(ucfirst(nom_jour(normaliser_date($Pile[$SP]['date']))))))!=='' ?
				($t3 . ' ') :
				'') .
		interdire_scripts(affdate_heure(normaliser_date($Pile[$SP]['date']))) .
		'</p>' .
		((($Numrows['_articles']['total'] > '1'))  ?
				(' ' . (	'<a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'"><i class="fa fa-hand-o-right"></i> Réserver</a>')) :
				'') .
		' ')) :
			'') .
	'
	' .
	(!(($Numrows['_articles']['compteur_boucle'] <= table_valeur($Pile["vars"], (string)'compteur_present', null)))  ?
			(' ' . (	'<p class="article_date nomargin"><i class="fa fa-check"></i> ' .
		interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
		'</p>')) :
			'') .
	'
	')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
		('<p class="nomargin">' . $t1 . '</p>') :
		'') .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles @ skeleton/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_sous_rubriqueshtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_sous_rubriques';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.alt_url",
		"rubriques.descriptif",
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
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_sous_rubriques',43,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<a class="blocklink rubrique-' .
$Pile[$SP]['id_rubrique'] .
'" href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'">
	' .
(($t1 = strval(((match(
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),(	'rubon' .
	$Pile[$SP]['id_rubrique'] .
	'\\.'))) ?' ' :'')))!=='' ?
		('<div class="logo small float-left">' . $t1 . (	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80')) .
	'</div>')) :
		'') .
'
	<i class="fa fa-folder float-right"></i><h2 class="nomargin">' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h2>
	' .
(($t1 = strval(interdire_scripts(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
		('<p class="nomargin">' . $t1 . '</p>') :
		'') .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_sous_rubriques @ skeleton/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_articles_lateralshtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_laterals';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+articles.titre AS num",
		"articles.titre",
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
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_articles_laterals',68,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<div class="blocklink article-' .
$Pile[$SP]['id_article'] .
'">
		' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80'))))!=='' ?
		('<div class="logo small float-left">' . $t1 . '</div>') :
		'') .
'
		<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'"><h2 class="nomargin">' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h2></a>
		' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0])) .
'
		<div class="clear"></div>
	</div>
	');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_laterals @ skeleton/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_sous_rubriques_lateraleshtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_sous_rubriques_laterales';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.alt_url",
		"rubriques.descriptif",
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
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('REGEXP', 'rubriques.rubrique_laterale', "'on'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_sous_rubriques_laterales',59,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<div class="blocklink rubrique-' .
$Pile[$SP]['id_rubrique'] .
'">
	' .
(($t1 = strval(((match(
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),(	'rubon' .
	$Pile[$SP]['id_rubrique'] .
	'\\.'))) ?' ' :'')))!=='' ?
		('<div class="logo small float-left">' . $t1 . (	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80')) .
	'</div>')) :
		'') .
'
	<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'"><h2 class="nomargin">' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h2></a>
	' .
(($t1 = strval(interdire_scripts(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
		('<p class="nomargin">' . $t1 . '</p>') :
		'') .
'
	<div class="clear"></div>
	
	' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0])) .
'
	
	' .
BOUCLE_articles_lateralshtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	
</div>
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_sous_rubriques_laterales @ skeleton/sommaire.html","profiler");
	return $t0;
}


function BOUCLE_contexte_sommairehtml_c3c78765638f90d89b480c83bd0455ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_contexte_sommaire';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.date",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.lang");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('=', 'rubriques.id_rubrique', "1"));
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
		array('skeleton/sommaire.html','html_c3c78765638f90d89b480c83bd0455ba','_contexte_sommaire',1,$GLOBALS['spip_lang'])
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
vide($Pile['vars'][$_zzz=(string)'meta_description'] = interdire_scripts(textebrut(((($a = propre($Pile[$SP]['descriptif'], $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0])))))) .
vide($Pile['vars'][$_zzz=(string)'meta_title'] = interdire_scripts(concat(concat(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])),' - '),interdire_scripts(textebrut(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0])))))) .
vide($Pile['vars'][$_zzz=(string)'meta_logo'] = url_absolue(extraire_attribut(((($a = 
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))) OR (is_string($a) AND strlen($a))) ? $a : 
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))),'src'))) .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/head') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'meta_description\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'meta_description', null)) . ',
	\'meta_title\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'meta_title', null)) . ',
	\'meta_logo\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'meta_logo', null)) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'skeleton/sommaire.html\',\'html_c3c78765638f90d89b480c83bd0455ba\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<div class="ariane">
	<a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" class="on"><i class="fa fa-home"></i></a>
</div>

<div class="left-section">

<h1 class="nomargin">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h1>
' .
(($t1 = strval(interdire_scripts(((propre($Pile[$SP]['texte'], $connect, $Pile[0])) ?' ' :''))))!=='' ?
		($t1 . (	(($t2 = strval(extraire_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'240')),'src')))!=='' ?
			((	'<a class="blocklink logo big float-left" href="' .
		extraire_attribut(
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'src') .
		'" rel="simplebox"><img src="') . $t2 . (	'" alt="logo_' .
		$Pile[$SP]['id_rubrique'] .
		'"/></a>')) :
			'') .
	'
' .
	interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0])) .
	'
<div class="clear"></div>')) :
		'') .
'

' .
vide($Pile['vars'][$_zzz=(string)'articles_tri'] = array()) .
(($t1 = BOUCLE_date_tri_futurhtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . vide($Pile['vars'][$_zzz=(string)'compteur_present'] = $Numrows['_date_tri_futur']['total'])) :
		'') .
'
' .
BOUCLE_date_tri_passehtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
(($t1 = BOUCLE_articleshtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array())))!=='' ?
				('<span class="anchor">' . $t3 . '</span>') :
				'') .
		'
') . $t1 . (	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, true, 'page', '', array())))!=='' ?
				('<div class="article-pagination">' . $t3 . '</div>') :
				'') .
		'
')) :
		'') .
'


' .
BOUCLE_sous_rubriqueshtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP) .
'



</div>



<div class="right-section">
' .
BOUCLE_sous_rubriques_lateraleshtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP) .
'



</div>


' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/foot') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'skeleton/sommaire.html\',\'html_c3c78765638f90d89b480c83bd0455ba\',\'\',85,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_contexte_sommaire @ skeleton/sommaire.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette skeleton/sommaire.html
// Temps de compilation total: 64.015 ms
//

function html_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_contexte_sommairehtml_c3c78765638f90d89b480c83bd0455ba($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_c3c78765638f90d89b480c83bd0455ba', $Cache, $page, 'skeleton/sommaire.html');
}
?>