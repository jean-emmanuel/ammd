<?php

/*
 * Squelette : ../plugins/auto/mailsubscribers-v1/prive/style_prive_plugin_mailsubscriber.html
 * Date :      Thu, 22 Nov 2012 10:01:14 GMT
 * Compile :   Fri, 07 Feb 2014 10:26:58 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/mailsubscribers-v1/prive/style_prive_plugin_mailsubscriber.html
// Temps de compilation total: 0.141 ms
//

function html_4cd77c7c3650dacdabc57d1128052a3a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '

.mailsubscriber #wysiwyg .contenu_email {display:none;}
.mailsubscriber #wysiwyg .contenu_lang {margin:0.5em 0;}
.mailsubscriber #wysiwyg .contenu_lang .label {display: inline}
.mailsubscriber #wysiwyg .contenu_nom {font-weight: bold;}
.mailsubscriber #wysiwyg .contenu_nom .label {display: inline}
.mailsubscriber #wysiwyg .contenu_listes .label {display: inline}

.mailsubscriber #wysiwyg .contenu_optin {margin:1em 0;}
.mailsubscriber #wysiwyg .contenu_optin .label {display: block}
';

	return analyse_resultat_skel('html_4cd77c7c3650dacdabc57d1128052a3a', $Cache, $page, '../plugins/auto/mailsubscribers-v1/prive/style_prive_plugin_mailsubscriber.html');
}
?>