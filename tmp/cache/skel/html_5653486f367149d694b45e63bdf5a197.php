<?php

/*
 * Squelette : ../plugins-dist/dump/formulaires/inc-lister-sauvegardes.html
 * Date :      Sun, 19 Jan 2014 17:55:37 GMT
 * Compile :   Fri, 07 Feb 2014 10:27:04 GMT
 * Boucles :   _dump
 */ 

function BOUCLE_dumphtml_5653486f367149d694b45e63bdf5a197(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['source'] = array(interdire_scripts(dump_lister_sauvegardes(entites_html(sinon(table_valeur(@$Pile[0], (string)'_dir_dump', null), dump_repertoire('')),true),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'tri', null), 'nom'),true)))));
	$command['sourcemode'] = 'table';
	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_dump';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".valeur");
		$command['orderby'] = array();
		$command['where'] = 
			array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"DATA",
		$command,
		array('../plugins-dist/dump/formulaires/inc-lister-sauvegardes.html','html_5653486f367149d694b45e63bdf5a197','_dump',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_dump']['compteur_boucle'] = 0;
	
	$l1 = _T('public|spip|ecrire:bouton_download');
	$l2 = _T('public|spip|ecrire:bouton_download');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_dump']['compteur_boucle']++;
		$t0 .= (
'
				<tr class="' .
alterner($Numrows['_dump']['compteur_boucle'],'row_odd','row_even') .
'">
					' .
(($t1 = strval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'name', null), ''),true))))!=='' ?
		('<td><input type=\'radio\' name="' . $t1 . (	'" value="' .
	interdire_scripts(table_valeur($Pile[$SP]['valeur'], 'fichier')) .
	'" id="dump_' .
	$Numrows['_dump']['compteur_boucle'] .
	'"
								' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'name', null),true)), null),true) == interdire_scripts(table_valeur($Pile[$SP]['valeur'], 'fichier')))) ?' ' :''))))!=='' ?
			($t2 . 'checked="checked"') :
			'') .
	'
								/></td>')) :
		'') .
'
					<td class="fichier principale">
						<label for="dump_' .
$Numrows['_dump']['compteur_boucle'] .
'" title="' .
interdire_scripts(attribut_html(basename(table_valeur($Pile[$SP]['valeur'], 'fichier'),'.sqlite'))) .
'">' .
interdire_scripts(basename(table_valeur($Pile[$SP]['valeur'], 'fichier'),'.sqlite')) .
'</label>
					</td>
					<td class="taille">
						' .
interdire_scripts(taille_en_octets(table_valeur($Pile[$SP]['valeur'], 'taille'))) .
'
					</td>
					<td>
						' .
affdate_heure(date('Y-m-d H:i:s',interdire_scripts(table_valeur($Pile[$SP]['valeur'], 'date')))) .
'
					</td>
					' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'download', null), ''),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
					<td>
						<a href="' .
	invalideur_session($Cache, generer_action_auteur('telecharger_dump',interdire_scripts(invalideur_session($Cache, table_valeur($Pile[$SP]['valeur'], 'fichier'))))) .
	'" title="' .
	attribut_html($l1) .
	'">' .
	interdire_scripts(filtre_balise_img_dist(chemin_image('telecharger-16.png'),$l1)) .
	'</a>
					</td>
					')) :
		'') .
'
				</tr>
			');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_dump @ ../plugins-dist/dump/formulaires/inc-lister-sauvegardes.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/dump/formulaires/inc-lister-sauvegardes.html
// Temps de compilation total: 6.149 ms
//

function html_5653486f367149d694b45e63bdf5a197($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_dumphtml_5653486f367149d694b45e63bdf5a197($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class=\'liste-objets dump\' id=\'' .
		interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), 'sauvegardes'),true)) .
		'\'>
	<table class=\'spip liste\'>
		<thead>
		' .
		(($t3 = strval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'titre', null), ''),true))))!=='' ?
				('<caption><strong class=\'caption\'>' . $t3 . '</strong></caption>') :
				'') .
		'
		<tr class="first_row">
			' .
		(($t3 = strval(interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'name', null), ''),true)) ?' ' :''))))!=='' ?
				($t3 . '<th></th>') :
				'') .
		'
			<th scope=\'col\'>' .
		lien_ou_expose(ancre_url(parametre_url(self(),'tri','nom'),(	'#' .
			interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), 'sauvegardes'),true)))),_T('public|spip|ecrire:info_nom'),interdire_scripts((entites_html(sinon(table_valeur(@$Pile[0], (string)'tri', null), 'nom'),true) == 'nom')),'ajax') .
		'</th>
			<th scope=\'col\'>' .
		lien_ou_expose(ancre_url(parametre_url(self(),'tri','taille'),(	'#' .
			interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), 'sauvegardes'),true)))),_T('public|spip|ecrire:label_poids_fichier'),interdire_scripts((entites_html(sinon(table_valeur(@$Pile[0], (string)'tri', null), 'nom'),true) == 'taille')),'ajax') .
		'</th>
			<th scope=\'col\'>' .
		lien_ou_expose(ancre_url(parametre_url(self(),'tri','date'),(	'#' .
			interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), 'sauvegardes'),true)))),_T('public:date'),interdire_scripts((entites_html(sinon(table_valeur(@$Pile[0], (string)'tri', null), 'nom'),true) == 'date')),'ajax') .
		'</th>
			' .
		(($t3 = strval(interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'download', null), ''),true)) ?' ' :''))))!=='' ?
				($t3 . '
			<th scope=\'col\'></th>
			') :
				'') .
		'
		</tr>
		</thead>
		<tbody>
			') . $t1 . '
		</tbody>
	</table>
</div>
') :
		'');

	return analyse_resultat_skel('html_5653486f367149d694b45e63bdf5a197', $Cache, $page, '../plugins-dist/dump/formulaires/inc-lister-sauvegardes.html');
}
?>