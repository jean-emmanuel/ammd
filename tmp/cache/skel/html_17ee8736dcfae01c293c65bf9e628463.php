<?php

/*
 * Squelette : ../prive/echafaudage/hierarchie/objet.html
 * Date :      Fri, 04 Oct 2013 08:11:45 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:53 GMT
 * Boucles :   _ariane, _rub, _testrub
 */ 

function BOUCLE_arianehtml_17ee8736dcfae01c293c65bf9e628463(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	include_spip('inc/rubriques');
	$hierarchie = calcul_hierarchie_in($id_rubrique,true);
	if (!$hierarchie) return "";
	
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_ariane';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.lang",
		"rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.id_secteur");
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$command['where'] = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/echafaudage/hierarchie/objet.html','html_17ee8736dcfae01c293c65bf9e628463','_ariane',4,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
' &gt;' .
changer_typo(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
'
' .
lien_ou_expose(generer_url_entite($Pile[$SP]['id_rubrique'],'rubrique'),interdire_scripts(((($a = couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')) OR (is_string($a) AND strlen($a))) ? $a : _T('ecrire:info_sans_titre'))),interdire_scripts((((((entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)) ?'' :' ')) AND (($Pile[$SP]['id_rubrique'] == interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_parent', null),true))))) ?' ' :''))) .
'
' .
vide($Pile['vars'][(string)'id_secteur'] = $Pile[$SP]['id_secteur']));
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ariane @ ../prive/echafaudage/hierarchie/objet.html","profiler");
	return $t0;
}


function BOUCLE_rubhtml_17ee8736dcfae01c293c65bf9e628463(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rub';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_parent', null),true)),'','INTEGER NOT NULL')), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) DEFAULT \'0\' NOT NULL COLLATE NOCASE')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/echafaudage/hierarchie/objet.html','html_17ee8736dcfae01c293c65bf9e628463','_rub',3,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
BOUCLE_arianehtml_17ee8736dcfae01c293c65bf9e628463($Cache, $Pile, $doublons, $Numrows, $SP));
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rub @ ../prive/echafaudage/hierarchie/objet.html","profiler");
	return $t0;
}


function BOUCLE_testrubhtml_17ee8736dcfae01c293c65bf9e628463(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_testrub';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('NOT', 
			array('=', 'rubriques.statut', "'poub'")));
		$command['join'] = array();
		$command['limit'] = '1,1';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/echafaudage/hierarchie/objet.html','html_17ee8736dcfae01c293c65bf9e628463','_testrub',11,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_testrub']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_testrub @ ../prive/echafaudage/hierarchie/objet.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../prive/echafaudage/hierarchie/objet.html
// Temps de compilation total: 107.007 ms
//

function html_17ee8736dcfae01c293c65bf9e628463($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- hierarchie -->
<a href="' .
generer_url_ecrire('rubriques') .
'">' .
_T('public|spip|ecrire:info_racine_site') .
'</a>
' .
BOUCLE_rubhtml_17ee8736dcfae01c293c65bf9e628463($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
interdire_scripts(changer_typo(generer_info_entite(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)), 'lang'))) .
'
' .
(($t1 = strval(interdire_scripts(((($a = couper(generer_info_entite(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)), 'titre'),'80')) OR (is_string($a) AND strlen($a))) ? $a : _T('ecrire:info_sans_titre')))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'
' .
changer_typo('') .
'
' .
interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('rubhier','../prive/echafaudage/hierarchie/objet.html', $Pile[0]):'')) .
BOUCLE_testrubhtml_17ee8736dcfae01c293c65bf9e628463($Cache, $Pile, $doublons, $Numrows, $SP)
. (	'
' .
	((((($Numrows['_testrub']['total']) AND (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)))) ?' ' :''))  ?
			(' ' . (	'
	' .
		(($t3 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'deplacer', null),true)) ?'' :' '))))!=='' ?
				($t3 . (	'
	<span class="bouton_deplacer"><span class="image_loading" style="float:' .
			interdire_scripts(@$Pile[0]['dir_lang_left']) .
			';"></span> &#91;<a href="' .
			parametre_url(self(),'deplacer','oui') .
			'" class="ajax">' .
			_T('public|spip|ecrire:bouton_deplacer') .
			'</a>&#93;</span>
	')) :
				'') .
		'
	' .
		(($t3 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'deplacer', null),true)) ?' ' :''))))!=='' ?
				($t3 . (	'
	<span class="bouton_deplacer">&#91;<a href="#" onclick="jQuery(\'#chercher_rubrique\').toggle(\'fast\');return false;">' .
			_T('public|spip|ecrire:bouton_deplacer') .
			'</a>&#93;</span>
	<div id="chercher_rubrique">
	' .
			boite_ouvrir(_T('public|spip|ecrire:titre_cadre_interieur_rubrique'), 'simple') .
			'
	' .
			filtre_chercher_rubrique_dist('',interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_parent', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_secteur', null), table_valeur($Pile["vars"], (string)'id_secteur', null)),true)),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'restreint', null), interdire_scripts(deplacement_restreint(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true),interdire_scripts(generer_info_entite(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)), 'statut'))))),true)),'true','form_simple') .
			'
	<br class="nettoyeur" />
	' .
			boite_fermer() .
			'
	</div>
	')) :
				'') .
		'
')) :
			'') .
	'
'));

	return analyse_resultat_skel('html_17ee8736dcfae01c293c65bf9e628463', $Cache, $page, '../prive/echafaudage/hierarchie/objet.html');
}
?>