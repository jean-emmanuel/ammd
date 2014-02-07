<?php

/*
 * Squelette : ../skeleton/modeles/img.html
 * Date :      Thu, 06 Feb 2014 16:45:45 GMT
 * Compile :   Fri, 07 Feb 2014 11:43:03 GMT
 * Boucles :   _img
 */ 

function BOUCLE_imghtml_eb5447a175387ac05f52c403084b9513(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_img';
		$command['from'] = array('documents' => 'spip_documents');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.id_document",
		"documents.titre",
		"documents.fichier",
		"documents.largeur");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote(@$Pile[0]['id_document'],'','INTEGER NOT NULL')), 
			array('=', 'documents.mode', "'image'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../skeleton/modeles/img.html','html_eb5447a175387ac05f52c403084b9513','_img',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
'" rel="simplebox" class="spip_image ' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'bord', null),true) == '0')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'noborder') :
		'') .
(($t1 = strval(interdire_scripts(match(entites_html(table_valeur(@$Pile[0], (string)'align', null),true),'left|right|center'))))!=='' ?
		(' float-' . $t1) :
		'') .
'"' .
(($t1 = strval(interdire_scripts(((($a = ((($a = entites_html(table_valeur(@$Pile[0], (string)'titre', null),true)) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(basename(get_spip_doc($Pile[$SP]['fichier'])))))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
'  style="width:' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'width', null), interdire_scripts($Pile[$SP]['largeur'])),true)) .
'px" >
	<img src="' .
interdire_scripts(url_absolue(extraire_attribut(filtrer('image_graver', filtrer('image_reduire',filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'600','0'),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'width', null), '0'),true)),'0')),'src'))) .
'" alt="' .
interdire_scripts(((($a = texte_backend(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))))) .
'"/>
</a>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_img @ ../skeleton/modeles/img.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../skeleton/modeles/img.html
// Temps de compilation total: 3.012 ms
//

function html_eb5447a175387ac05f52c403084b9513($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_imghtml_eb5447a175387ac05f52c403084b9513($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_eb5447a175387ac05f52c403084b9513', $Cache, $page, '../skeleton/modeles/img.html');
}
?>