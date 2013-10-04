<?php

/*
 * Squelette : ../prive/squelettes/navigation/article_edit.html
 * Date :      Fri, 04 Oct 2013 08:12:01 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:26 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/navigation/article_edit.html
// Temps de compilation total: 1.000 ms
//

function html_16a725b038f805fdc13017a4505ae7a4($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '';

	return analyse_resultat_skel('html_16a725b038f805fdc13017a4505ae7a4', $Cache, $page, '../prive/squelettes/navigation/article_edit.html');
}
?>