<?php

/*
 * Squelette : ../plugins-dist/forum/prive/squelettes/inclure/discuter_forum.html
 * Date :      Sun, 19 Jan 2014 17:55:38 GMT
 * Compile :   Fri, 07 Feb 2014 11:39:46 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/forum/prive/squelettes/inclure/discuter_forum.html
// Temps de compilation total: 1.293 ms
//

function html_a11ad635ba673c00341f5c4c1560f356($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'repondre', null),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
' .
	recuperer_fond( 'prive/repondre_forum' , array_merge($Pile[0],array()), array('compil'=>array('../plugins-dist/forum/prive/squelettes/inclure/discuter_forum.html','html_a11ad635ba673c00341f5c4c1560f356','',2,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'repondre', null),true)) ?'' :' '))))!=='' ?
		($t1 . (	'

' .
	(($t2 = strval(filtre_icone_dist(parametre_url(self(),'repondre','new'),_T('forum:icone_poster_message'),interdire_scripts(((@$Pile[0]['statut'] == 'privadm') ? 'forum-interne-24.png':'forum-interne-24.png')),lang_dir(@$Pile[0]['lang'], 'right','left'),'','ajax')))!=='' ?
			($t2 . '
<div class=\'clear\'></div>
') :
			'') .
	'
' .
	recuperer_fond( 'prive/objets/liste/participer_forum_thread' , array_merge($Pile[0],array()), array('compil'=>array('../plugins-dist/forum/prive/squelettes/inclure/discuter_forum.html','html_a11ad635ba673c00341f5c4c1560f356','',5,$GLOBALS['spip_lang'])), '') .
	'
')) :
		''));

	return analyse_resultat_skel('html_a11ad635ba673c00341f5c4c1560f356', $Cache, $page, '../plugins-dist/forum/prive/squelettes/inclure/discuter_forum.html');
}
?>