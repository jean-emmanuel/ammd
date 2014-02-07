<?php

/*
 * Squelette : skeleton/article.html
 * Date :      Fri, 07 Feb 2014 08:39:03 GMT
 * Compile :   Fri, 07 Feb 2014 11:38:33 GMT
 * Boucles :   _ariane, _contexte_sommaire
 */ 

function BOUCLE_arianehtml_4295fde71d35319d63dc5f5df845ad36(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		$command['select'] = array("rubriques.alt_url",
		"rubriques.id_rubrique",
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
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/article.html','html_4295fde71d35319d63dc5f5df845ad36','_ariane',9,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'<a href="' .
interdire_scripts(((($a = $Pile[$SP]['alt_url']) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a>');
		$t0 .= ((strlen($t1) && strlen($t0)) ? '&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;' : '') . $t1;
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ariane @ skeleton/article.html","profiler");
	return $t0;
}


function BOUCLE_contexte_sommairehtml_4295fde71d35319d63dc5f5df845ad36(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_contexte_sommaire';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.descriptif",
		"articles.titre",
		"articles.id_rubrique",
		"articles.date",
		"articles.id_article",
		"articles.lieu",
		"articles.tarif",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('articles.id_article',sql_quote($in)) : 
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','INTEGER NOT NULL')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('skeleton/article.html','html_4295fde71d35319d63dc5f5df845ad36','_contexte_sommaire',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_contexte_sommaire']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
vide($Pile['vars'][$_zzz=(string)'meta_description'] = interdire_scripts(textebrut(((($a = propre($Pile[$SP]['descriptif'], $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0])))))) .
vide($Pile['vars'][$_zzz=(string)'meta_title'] = interdire_scripts(concat(concat(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])),' - '),interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])))))) .
vide($Pile['vars'][$_zzz=(string)'meta_logo'] = url_absolue(extraire_attribut(((($a = 
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))) OR (is_string($a) AND strlen($a))) ? $a : 
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))),'src'))) .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/head') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'meta_description\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'meta_description', null)) . ',
	\'meta_title\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'meta_title', null)) . ',
	\'meta_logo\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'meta_logo', null)) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'skeleton/article.html\',\'html_4295fde71d35319d63dc5f5df845ad36\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<div class="ariane">
	' .
(($t1 = BOUCLE_arianehtml_4295fde71d35319d63dc5f5df845ad36($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'<a href="' .
		spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		'"><i class="fa fa-home"></i></a>&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;') . $t1 . '&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;') :
		'') .
'
</div>


<div class="left-section">


<h1 class="nomargin">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h1>
' .
(($t1 = strval(interdire_scripts((((annee(normaliser_date($Pile[$SP]['date'])) >= '2000')) ?' ' :''))))!=='' ?
		($t1 . (	'<div class="blocklink">
' .
	(($t2 = strval(interdire_scripts((((normaliser_date($Pile[$SP]['date']) >= interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'date', null),true)))) ?' ' :''))))!=='' ?
			($t2 . (	'<p class="article_date nomargin"><i class="fa fa-clock-o fa-fw"></i> ' .
		(($t3 = strval(interdire_scripts(ucfirst(nom_jour(normaliser_date($Pile[$SP]['date']))))))!=='' ?
				($t3 . ' ') :
				'') .
		interdire_scripts(affdate_heure(normaliser_date($Pile[$SP]['date']))) .
		'</p>' .
		((($Numrows['_contexte_sommaire']['total'] > '1'))  ?
				(' ' . (	'<a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'"><i class="fa fa-hand-o-right"></i> Réserver</a>')) :
				'') .
		' ')) :
			'') .
	'
' .
	(($t2 = strval(interdire_scripts((((normaliser_date($Pile[$SP]['date']) >= interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'date', null),true)))) ?'' :' '))))!=='' ?
			($t2 . (	'<p class="article_date nomargin"><i class="fa fa-check fa-fw"></i> ' .
		interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
		'</p>')) :
			'') .
	'
</div>')) :
		'') .
'

' .
(($t1 = strval(interdire_scripts($Pile[$SP]['lieu'])))!=='' ?
		('<div class="blocklink"><i class="fa fa-map-marker fa-fw"></i>&nbsp;' . $t1 . '</div>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts($Pile[$SP]['tarif'])))!=='' ?
		('<div class="blocklink"><i class="fa fa-euro fa-fw"></i>&nbsp;' . $t1 . '</div>') :
		'') .
'

' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'240'))))!=='' ?
		((	'<a class="blocklink logo big float-left" href="' .
	extraire_attribut(
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'src') .
	'"  rel="simplebox" title="' .
	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
	'">') . $t1 . '</a>') :
		'') .
'
' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0])) .
'
' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<hr/>' . $t1) :
		'') .
'
</div>




' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/foot') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'skeleton/article.html\',\'html_4295fde71d35319d63dc5f5df845ad36\',\'\',30,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_contexte_sommaire @ skeleton/article.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette skeleton/article.html
// Temps de compilation total: 8.892 ms
//

function html_4295fde71d35319d63dc5f5df845ad36($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_contexte_sommairehtml_4295fde71d35319d63dc5f5df845ad36($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_4295fde71d35319d63dc5f5df845ad36', $Cache, $page, 'skeleton/article.html');
}
?>