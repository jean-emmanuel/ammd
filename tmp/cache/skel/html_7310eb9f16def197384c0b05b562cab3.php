<?php

/*
 * Squelette : ../plugins/auto/newsletters-v1/prive/style_prive_plugin_newsletters.html
 * Date :      Wed, 09 Jan 2013 22:00:43 GMT
 * Compile :   Fri, 07 Feb 2014 10:26:58 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/newsletters-v1/prive/style_prive_plugin_newsletters.html
// Temps de compilation total: 0.139 ms
//

function html_7310eb9f16def197384c0b05b562cab3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '
#wysiwyg .contenu_patron .label {display: inline}
#wysiwyg .contenu_selection_articles .label {display: inline}
#wysiwyg .contenu_selection_rubriques .label {display: inline}
#wysiwyg .contenu_patron .patron {display: inline;font-weight: bold}
#wysiwyg .contenu_html_email,
#wysiwyg .contenu_texte_email,
#wysiwyg .contenu_html_page {margin-bottom: 3em;}
#wysiwyg .contenu_html_email .label,
#wysiwyg .contenu_texte_email .label,
#wysiwyg .contenu_html_page .label  {display: block}
#wysiwyg .html_email iframe,
#wysiwyg .texte_email iframe,
#wysiwyg .html_page iframe  {width:100%;height:400px;overflow:auto;border:1px solid #ddd;}
';

	return analyse_resultat_skel('html_7310eb9f16def197384c0b05b562cab3', $Cache, $page, '../plugins/auto/newsletters-v1/prive/style_prive_plugin_newsletters.html');
}
?>