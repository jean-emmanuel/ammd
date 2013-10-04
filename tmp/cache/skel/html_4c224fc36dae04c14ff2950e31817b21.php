<?php

/*
 * Squelette : ../prive/themes/spip/theme.css.html
 * Date :      Fri, 04 Oct 2013 08:12:02 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:42 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/themes/spip/theme.css.html
// Temps de compilation total: 47.003 ms
//

function html_4c224fc36dae04c14ff2950e31817b21($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars'][(string)'claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'couleur_claire', null), 'edf3fe'),true)))) .
vide($Pile['vars'][(string)'foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'couleur_foncee', null), '3874b0'),true)))) .
vide($Pile['vars'][(string)'left'] = interdire_scripts(choixsiegal(entites_html(table_valeur(@$Pile[0], (string)'ltr', null),true),'left','left','right'))) .
vide($Pile['vars'][(string)'right'] = interdire_scripts(choixsiegal(entites_html(table_valeur(@$Pile[0], (string)'ltr', null),true),'left','right','left'))) .
vide($Pile['vars'][(string)'rtl'] = interdire_scripts(choixsiegal(entites_html(table_valeur(@$Pile[0], (string)'ltr', null),true),'left','','_rtl'))) .
'/* pour les icones pochoir de diala */
.navigation_avec_icones #bando_navigation ul.deroulant > li > a { background-color: #' .
filtrer('couleur_eclaircir',table_valeur($Pile["vars"], (string)'claire', null)) .
';}
.navigation_avec_icones #bando_navigation ul.deroulant > li > a:hover,
.navigation_avec_icones #bando_navigation ul.deroulant > li > a:focus { background-color: ' .
table_valeur($Pile["vars"], (string)'claire', null) .
'; }

.navigation_avec_icones #bando_navigation ul li a {background-position:center top;background-repeat:no-repeat;padding-top:60px;}
.navigation_avec_icones #bando_navigation ul li ul li a {margin-' .
table_valeur($Pile["vars"], (string)'left', null) .
':7px; margin-' .
table_valeur($Pile["vars"], (string)'right', null) .
': 1.0em; background-position:' .
table_valeur($Pile["vars"], (string)'left', null) .
' center;margin-top:0;padding-' .
table_valeur($Pile["vars"], (string)'left', null) .
':24px;padding-top:0.8em;}

');

	return analyse_resultat_skel('html_4c224fc36dae04c14ff2950e31817b21', $Cache, $page, '../prive/themes/spip/theme.css.html');
}
?>