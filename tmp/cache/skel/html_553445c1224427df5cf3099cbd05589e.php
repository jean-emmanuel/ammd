<?php

/*
 * Squelette : skeleton/modeles/calendrier.html
 * Date :      Wed, 05 Feb 2014 14:55:23 GMT
 * Compile :   Fri, 07 Feb 2014 11:37:20 GMT
 * Boucles :   _date_tri_futur, _articles
 */ 

function BOUCLE_date_tri_futurhtml_553445c1224427df5cf3099cbd05589e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'articles.id_rubrique', "8"), 
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
		array('skeleton/modeles/calendrier.html','html_553445c1224427df5cf3099cbd05589e','_date_tri_futur',2,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_date_tri_futur']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_date_tri_futur']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			' .
vide($Pile['vars'][$_zzz=(string)'articles_tri'] = array_merge(table_valeur($Pile["vars"], (string)'articles_tri', null),array($Numrows['_date_tri_futur']['compteur_boucle'] => $Pile[$SP]['id_article']))) .
'
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_date_tri_futur @ skeleton/modeles/calendrier.html","profiler");
	return $t0;
}


function BOUCLE_articleshtml_553445c1224427df5cf3099cbd05589e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (table_valeur($Pile["vars"], (string)'articles_tri', null)))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$command['pagination'] = array((isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : null), 5);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.lieu",
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
		array('skeleton/modeles/calendrier.html','html_553445c1224427df5cf3099cbd05589e','_articles',6,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : _request('debut_articles');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),5,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(5))*(5)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 4), $Numrows['_articles']['total'] - 1);
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
<a class="blocklink" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'articles', '', '', true))) .
'">
	' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'80'))))!=='' ?
		('<div class="logo small float-left">' . $t1 . '</div>') :
		'') .
'
	<i class="fa fa-calendar float-right"></i><h2 class="nomargin">' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h2>
	<p class="article_date nomargin"><i class="fa fa-clock-o"></i> ' .
(($t1 = strval(interdire_scripts(ucfirst(nom_jour(normaliser_date($Pile[$SP]['date']))))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(((heures(normaliser_date($Pile[$SP]['date'])) == '0') ? interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))):interdire_scripts(affdate_heure(normaliser_date($Pile[$SP]['date']))))) .
'</p>
	' .
(($t1 = strval(interdire_scripts(textebrut($Pile[$SP]['lieu']))))!=='' ?
		('<p class="nomargin"><em>' . $t1 . '</em></p>') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles @ skeleton/modeles/calendrier.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette skeleton/modeles/calendrier.html
// Temps de compilation total: 5.795 ms
//

function html_553445c1224427df5cf3099cbd05589e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars'][$_zzz=(string)'articles_tri'] = array()) .
BOUCLE_date_tri_futurhtml_553445c1224427df5cf3099cbd05589e($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
(($t1 = BOUCLE_articleshtml_553445c1224427df5cf3099cbd05589e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		5, false, '', '', array())))!=='' ?
				('<span class="anchor">' . $t3 . '</span>') :
				'') .
		'
') . $t1 . (	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		5, true, 'page', '', array())))!=='' ?
				('<div class="article-pagination">' . $t3 . '</div>') :
				'') .
		'
')) :
		'') .
'
');

	return analyse_resultat_skel('html_553445c1224427df5cf3099cbd05589e', $Cache, $page, 'skeleton/modeles/calendrier.html');
}
?>