<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies/hidden.html
 * Date :      Fri, 04 Oct 2013 08:07:24 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:00 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies/hidden.html
// Temps de compilation total: 48.003 ms
//

function html_55814d33b742cdb94983994922b9962d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<li class="editer editer_' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)) .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'li_class', null),true))))!=='' ?
		(' ' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true))))!=='' ?
		(' saisie_' . $t1) :
		'') .
'" ' .
interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'tout_afficher', null),true) != 'oui') ? 'style="display:none;"':'')) .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_saisie', null),true))))!=='' ?
		(' data-id="' . $t1 . '"') :
		'') .
'>
	' .
interdire_scripts(table_valeur(@$Pile[0], (string)'inserer_debut', null)) .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'tout_afficher', null),true) != 'oui')) ?' ' :''))))!=='' ?
		($t1 . (	'
	<input type="hidden" name="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)) .
	'" id="champ_' .
	interdire_scripts(saisie_nom2classe(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))) .
	'" value="' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_forcee', null), interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'defaut', null),true))),true))),true)) .
	'"' .
	(($t2 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'attributs', null))))!=='' ?
			(' ' . $t2) :
			'') .
	' />
	')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'tout_afficher', null),true) != 'oui')) ?'' :' '))))!=='' ?
		($t1 . (	'
	' .
	(($t2 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'label', null))))!=='' ?
			((	'<label for="champ_' .
		interdire_scripts(saisie_nom2classe(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))) .
		'">') . $t2 . (	(($t3 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'obligatoire', null),true)) ?' ' :''))))!=='' ?
				('<span class=\'obligatoire\'>' . $t3 . (	interdire_scripts((is_null(table_valeur(@$Pile[0], (string)'info_obligatoire', null)) ? _T('public|spip|ecrire:info_obligatoire_02'):interdire_scripts(table_valeur(@$Pile[0], (string)'info_obligatoire', null)))) .
			'</span>')) :
				'') .
		'</label>')) :
			'') .
	'
	<input type="text" name="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)) .
	'" id="champ_' .
	interdire_scripts(saisie_nom2classe(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))) .
	'" value="' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur_forcee', null), interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'defaut', null),true))),true))),true)) .
	'" readonly="readonly" />
	')) :
		'') .
'
	
	' .
interdire_scripts(table_valeur(@$Pile[0], (string)'inserer_fin', null)) .
'</li>
');

	return analyse_resultat_skel('html_55814d33b742cdb94983994922b9962d', $Cache, $page, '../plugins/auto/saisies/saisies/hidden.html');
}
?>