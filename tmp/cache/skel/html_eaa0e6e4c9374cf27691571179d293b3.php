<?php

/*
 * Squelette : ../prive/formulaires/dateur/jquery.dateur.js.html
 * Date :      Fri, 04 Oct 2013 08:11:49 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:17 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/dateur/jquery.dateur.js.html
// Temps de compilation total: 11.001 ms
//

function html_eaa0e6e4c9374cf27691571179d293b3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Content-Type: text/js;' . '"); ?'.'>
if (!jQuery.fn.datepicker){
' .
(($c = find_in_path('prive/javascript/ui/jquery.ui.core.js')) ? spip_file_get_contents($c) : "") .
(($c = find_in_path('prive/javascript/ui/jquery.ui.widget.js')) ? spip_file_get_contents($c) : "") .
(($c = find_in_path('prive/javascript/ui/jquery.ui.datepicker.js')) ? spip_file_get_contents($c) : "") .
'}
if (!jQuery.fn.timePicker){
' .
(($c = find_in_path('prive/formulaires/dateur/jquery.time_picker.js')) ? spip_file_get_contents($c) : "") .
'}
');

	return analyse_resultat_skel('html_eaa0e6e4c9374cf27691571179d293b3', $Cache, $page, '../prive/formulaires/dateur/jquery.dateur.js.html');
}
?>