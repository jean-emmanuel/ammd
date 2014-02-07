<?php

/*
 * Squelette : ../prive/squelettes/navigation/article_edit.html
 * Date :      Sun, 19 Jan 2014 17:32:59 GMT
 * Compile :   Fri, 07 Feb 2014 11:38:43 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/navigation/article_edit.html
// Temps de compilation total: 0.065 ms
//

function html_16a725b038f805fdc13017a4505ae7a4($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '';

	return analyse_resultat_skel('html_16a725b038f805fdc13017a4505ae7a4', $Cache, $page, '../prive/squelettes/navigation/article_edit.html');
}
?>