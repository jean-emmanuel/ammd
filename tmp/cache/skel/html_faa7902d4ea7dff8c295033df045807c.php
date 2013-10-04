<?php

/*
 * Squelette : ../plugins/auto/champs_extras3_interface/prive/style_prive_plugin_iextras.html
 * Date :      Fri, 04 Oct 2013 08:05:56 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:42 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/champs_extras3_interface/prive/style_prive_plugin_iextras.html
// Temps de compilation total: 2.000 ms
//

function html_faa7902d4ea7dff8c295033df045807c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'.iextras ul.actions {text-align:right;}
.iextras ul.actions li {display:inline; padding-right:3px; border-right:1px solid #' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'couleur_claire', null),true)) .
';}

');

	return analyse_resultat_skel('html_faa7902d4ea7dff8c295033df045807c', $Cache, $page, '../plugins/auto/champs_extras3_interface/prive/style_prive_plugin_iextras.html');
}
?>