<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies-vues/case.html
 * Date :      Fri, 04 Oct 2013 08:07:34 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:55 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies-vues/case.html
// Temps de compilation total: 5.000 ms
//

function html_e22f119e5d86122b18fd99ae1101b7ae($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts((table_valeur(@$Pile[0], (string)'valeur', null) ? _T('public|spip|ecrire:item_oui'):_T('public|spip|ecrire:item_non')))))!=='' ?
		('<p>' . $t1 . '</p>') :
		'') .
'
');

	return analyse_resultat_skel('html_e22f119e5d86122b18fd99ae1101b7ae', $Cache, $page, '../plugins/auto/saisies/saisies-vues/case.html');
}
?>