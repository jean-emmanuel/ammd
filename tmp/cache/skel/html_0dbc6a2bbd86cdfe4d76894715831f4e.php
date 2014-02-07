<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies/case.html
 * Date :      Mon, 13 Jan 2014 15:00:15 GMT
 * Compile :   Fri, 07 Feb 2014 10:27:03 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies/case.html
// Temps de compilation total: 3.222 ms
//

function html_0dbc6a2bbd86cdfe4d76894715831f4e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars'][$_zzz=(string)'valeur'] = interdire_scripts((is_null(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_forcee', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'valeur', null),true))),true)) ? interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'defaut', null),true)):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_forcee', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'valeur', null),true))),true))))) .
'<div class="choix">
	<input type="checkbox" name="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)) .
'" class="checkbox" id="champ_' .
interdire_scripts(saisie_nom2classe(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))),true))) .
'"' .
(((table_valeur($Pile["vars"], (string)'valeur', null) == interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_oui', null), 'on'),true))))  ?
		(' ' . ' ' . 'checked="checked"') :
		'') .
' value="' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_oui', null), 'on'),true)) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'disable', null),true))))!=='' ?
		(' disabled="' . $t1 . '"') :
		'') .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'readonly', null),true))))!=='' ?
		(' readonly="' . $t1 . '"') :
		'') .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'attributs', null))))!=='' ?
		(' ' . $t1) :
		'') .
'/>
	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'label_case', null))))!=='' ?
		((	'<label for="champ_' .
	interdire_scripts(saisie_nom2classe(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))),true))) .
	'">' .
	(((table_valeur($Pile["vars"], (string)'valeur', null) == interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_oui', null), 'on'),true))))  ?
			(' ' . '<strong>') :
			'')) . $t1 . (	(((table_valeur($Pile["vars"], (string)'valeur', null) == interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_oui', null), 'on'),true))))  ?
			(' ' . '</strong>') :
			'') .
	'</label>')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_0dbc6a2bbd86cdfe4d76894715831f4e', $Cache, $page, '../plugins/auto/saisies/saisies/case.html');
}
?>