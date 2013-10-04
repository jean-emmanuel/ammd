<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies/_base.html
 * Date :      Fri, 04 Oct 2013 08:07:30 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:00 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies/_base.html
// Temps de compilation total: 130.008 ms
//

function html_65298e666ee7ddfa4fb401eefd47dc46($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	vide($Pile['vars'][(string)'obligatoire'] = interdire_scripts(((((entites_html(table_valeur(@$Pile[0], (string)'obligatoire', null),true)) AND (interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'obligatoire', null),true) != 'non')))) ?' ' :'') ? 'obligatoire':''))) .
	vide($Pile['vars'][(string)'disable'] = interdire_scripts(((((entites_html(sinon(table_valeur(@$Pile[0], (string)'disable', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'disable_avec_post', null),true))),true)) AND (interdire_scripts((entites_html(sinon(table_valeur(@$Pile[0], (string)'disable', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'disable_avec_post', null),true))),true) != 'non')))) ?' ' :'') ? interdire_scripts((is_array(entites_html(table_valeur(@$Pile[0], (string)'disable', null),true)) ? interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'disable', null), array()),true)):'disabled')):''))) .
	vide($Pile['vars'][(string)'readonly'] = interdire_scripts(((((entites_html(table_valeur(@$Pile[0], (string)'readonly', null),true)) AND ((	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'readonly', null),true)) .
			'!={non}'))) ?' ' :'') ? 'readonly':''))) .
	vide($Pile['vars'][(string)'saisies_autonomes'] = saisies_autonomes('')) .
	(($t2 = strval(interdire_scripts(((in_array(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true),table_valeur($Pile["vars"], (string)'saisies_autonomes', null))) ?' ' :''))))!=='' ?
			($t2 . (	'
		' .
		recuperer_fond( (	'saisies/' .
			interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true))) , array_merge($Pile[0],array('obligatoire' => table_valeur($Pile["vars"], (string)'obligatoire', null) ,
	'disable' => table_valeur($Pile["vars"], (string)'disable', null) ,
	'readonly' => table_valeur($Pile["vars"], (string)'readonly', null) )), array('compil'=>array('../plugins/auto/saisies/saisies/_base.html','html_65298e666ee7ddfa4fb401eefd47dc46','',12,$GLOBALS['spip_lang'])), '') .
		'
	')) :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(((in_array(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true),table_valeur($Pile["vars"], (string)'saisies_autonomes', null))) ?'' :' '))))!=='' ?
			($t2 . (	'
		' .
		vide($Pile['vars'][(string)'erreurs'] = table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)))) .
		vide($Pile['vars'][(string)'li_class'] = interdire_scripts(((substr(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true),'0','9') == 'selecteur') ? 'selecteur_item':''))) .
		'<!--!inserer_saisie_editer-->
		<li class="editer editer_' .
		interdire_scripts(saisie_nom2classe(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))) .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'obligatoire', null)))!=='' ?
				(' ' . $t3) :
				'') .
		((table_valeur($Pile["vars"], (string)'erreurs', null))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'li_class', null)))!=='' ?
				(' ' . $t3) :
				'') .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'li_class', null),true))))!=='' ?
				(' ' . $t3) :
				'') .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true))))!=='' ?
				(' saisie_' . $t3) :
				'') .
		'"' .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_saisie', null),true))))!=='' ?
				(' data-id="' . $t3 . '"') :
				'') .
		'>
			' .
		interdire_scripts(table_valeur(@$Pile[0], (string)'inserer_debut', null)) .
		(($t3 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'label', null))))!=='' ?
				((	'<label' .
			(($t4 = strval(interdire_scripts(((match(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true),'oui_non|radio|checkbox')) ?'' :' '))))!=='' ?
					($t4 . (	' for="champ_' .
				interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true)) .
				'"')) :
					'') .
			'>') . $t3 . (	((table_valeur($Pile["vars"], (string)'obligatoire', null))  ?
					('<span class=\'obligatoire\'>' . ' ' . (	interdire_scripts((is_null(table_valeur(@$Pile[0], (string)'info_obligatoire', null)) ? _T('public|spip|ecrire:info_obligatoire_02'):interdire_scripts(table_valeur(@$Pile[0], (string)'info_obligatoire', null)))) .
				'</span>')) :
					'') .
			'</label>')) :
				'') .
		'
			' .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
			' .
		(($t3 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'explication', null))))!=='' ?
				('<p class=\'explication\'>' . $t3 . '</p>') :
				'') .
		'
			' .
		(($t3 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'attention', null))))!=='' ?
				('<em class=\'attention\'>' . $t3 . '</em>') :
				'') .
		'
			' .
		recuperer_fond( (	'saisies/' .
			interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'type_saisie', null),true))) , array_merge($Pile[0],array('nom' => interdire_scripts(saisie_nom2name(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))) ,
	'disable' => table_valeur($Pile["vars"], (string)'disable', null) ,
	'readonly' => table_valeur($Pile["vars"], (string)'readonly', null) )), array('compil'=>array('../plugins/auto/saisies/saisies/_base.html','html_65298e666ee7ddfa4fb401eefd47dc46','',0,$GLOBALS['spip_lang'])), '') .
		'
			' .
		(($t3 = strval(interdire_scripts((((((entites_html(table_valeur(@$Pile[0], (string)'disable_avec_post', null),true)) AND (interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'disable_avec_post', null),true) != 'non')))) ?' ' :'')) ?' ' :''))))!=='' ?
				($t3 . (	'<input type=\'hidden\' name=\'' .
			interdire_scripts(saisie_nom2name(entites_html(table_valeur(@$Pile[0], (string)'nom', null),true))) .
			'\' value="' .
			interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'valeur', null), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'defaut', null),true))),true)) .
			'" />')) :
				'') .
		'
			' .
		table_valeur(@$Pile[0], (string)'inserer_fin', null) .
		'</li>
	')) :
			'') .
	'
')) :
		'') .
'
');

	return analyse_resultat_skel('html_65298e666ee7ddfa4fb401eefd47dc46', $Cache, $page, '../plugins/auto/saisies/saisies/_base.html');
}
?>