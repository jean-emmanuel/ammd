<?php

/*
 * Squelette : ../prive/formulaires/inc-apercu-logo.html
 * Date :      Sun, 19 Jan 2014 17:32:59 GMT
 * Compile :   Fri, 07 Feb 2014 10:27:00 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/inc-apercu-logo.html
// Temps de compilation total: 2.044 ms
//

function html_3dafbd983cf36a2cc582dc2bd5a2ce74($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="apercu">
	' .
(($t1 = strval(interdire_scripts(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',entites_html(table_valeur(@$Pile[0], (string)'logo', null),true),interdire_scripts(((($a = table_valeur(entites_html(table_valeur(@$Pile[0], (string)'_options', null),true),'image_reduire')) OR (is_string($a) AND strlen($a))) ? $a : '100')))),'alt',interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'quoi', null), 'logo_on'),true))))))!=='' ?
		((	'<div class="spip_logos"><a href="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'logo', null),true)) .
	'" class=\'mediabox\'>') . $t1 . '</a></div>') :
		'') .
'
	' .
vide($Pile['vars'][$_zzz=(string)'largeur'] = interdire_scripts(largeur(entites_html(table_valeur(@$Pile[0], (string)'logo', null),true)))) .
vide($Pile['vars'][$_zzz=(string)'hauteur'] = interdire_scripts(hauteur(entites_html(table_valeur(@$Pile[0], (string)'logo', null),true)))) .
(($t1 = strval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'titre', null), ''),true))))!=='' ?
		('<div class="titre">' . $t1 . '</div>') :
		'') .
'
	<div class="taille">' .
_T('public|spip|ecrire:info_largeur_vignette', array('largeur_vignette' => table_valeur($Pile["vars"], (string)'largeur', null),
'hauteur_vignette' => table_valeur($Pile["vars"], (string)'hauteur', null))) .
'</div>
	' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
		<input type=\'submit\' class=\'submit supprimer\' id="supprimer_' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'quoi', null), 'logo_on'),true)) .
	'_' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)) .
	'_' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)) .
	'" name="supprimer_' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'quoi', null), 'logo_on'),true)) .
	'" value=\'' .
	attribut_html(ucfirst(_T('public|spip|ecrire:lien_supprimer'))) .
	'\' />
	')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_3dafbd983cf36a2cc582dc2bd5a2ce74', $Cache, $page, '../prive/formulaires/inc-apercu-logo.html');
}
?>