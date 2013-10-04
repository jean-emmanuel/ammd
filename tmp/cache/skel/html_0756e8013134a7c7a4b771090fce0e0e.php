<?php

/*
 * Squelette : ../prive/squelettes/navigation/article.html
 * Date :      Fri, 04 Oct 2013 08:12:02 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:14 GMT
 * Boucles :   _nav
 */ 

function BOUCLE_navhtml_0756e8013134a7c7a4b771090fce0e0e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'exec', null),true) == 'article'));

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_nav';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article",
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
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','INTEGER NOT NULL')), 
			array('REGEXP', 'articles.statut', "'.*'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/squelettes/navigation/article.html','html_0756e8013134a7c7a4b771090fce0e0e','_nav',1,$GLOBALS['spip_lang'])
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
boite_ouvrir('', 'info') .
pipeline( 'boite_infos' , array('data' => '', 'args' => array('type' => 'article', 'id' => interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true)))) ) .
boite_fermer() .
'

<div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_EDITER_LOGO',
	array('article',$Pile[$SP]['id_article'],'',@serialize($Pile[0])),
	array('../prive/squelettes/navigation/article.html','html_0756e8013134a7c7a4b771090fce0e0e','_nav',5,$GLOBALS['spip_lang'])) .
'</div>

' .
pipeline( 'afficher_config_objet' , array('args' => array('type' => 'article', 'id' => $Pile[$SP]['id_article']), 'data' => '') ) .
'<div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_REDIRIGER_ARTICLE',
	array(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true))),
	array('../prive/squelettes/navigation/article.html','html_0756e8013134a7c7a4b771090fce0e0e','_nav',8,$GLOBALS['spip_lang'])) .
'</div>

');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_nav @ ../prive/squelettes/navigation/article.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../prive/squelettes/navigation/article.html
// Temps de compilation total: 60.003 ms
//

function html_0756e8013134a7c7a4b771090fce0e0e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_navhtml_0756e8013134a7c7a4b771090fce0e0e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'exec', null),true) == 'article_edit')) ?' ' :''))))!=='' ?
			($t2 . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/squelettes/navigation/article_edit') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/squelettes/navigation/article.html\',\'html_0756e8013134a7c7a4b771090fce0e0e\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>') :
			'') .
	'
')));

	return analyse_resultat_skel('html_0756e8013134a7c7a4b771090fce0e0e', $Cache, $page, '../prive/squelettes/navigation/article.html');
}
?>