<?php

/*
 * Squelette : ../plugins-dist/dump/prive/style_prive_plugin_dump.html
 * Date :      Fri, 04 Oct 2013 08:09:32 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:44 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/dump/prive/style_prive_plugin_dump.html
// Temps de compilation total: 22.001 ms
//

function html_e1aae45ab82460170fa3f312e204fefa($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

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
'.liste-objets.dump tr .fichier label {display:block; width: 260px;word-wrap:break-word;}
.liste-objets.dump tr .taille {text-align:right;}


');

	return analyse_resultat_skel('html_e1aae45ab82460170fa3f312e204fefa', $Cache, $page, '../plugins-dist/dump/prive/style_prive_plugin_dump.html');
}
?>