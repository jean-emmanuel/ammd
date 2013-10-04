<?php

/*
 * Squelette : ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html
 * Date :      Fri, 04 Oct 2013 08:10:00 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:19 GMT
 * Boucles :   _decompte, _doc, _doc2, _forums_boucle, _forums_fils, _forums
 */ 

function BOUCLE_decomptehtml_12c55f887ddf8e70dcc4fc4062ba5db0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['objet']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'forum';
		$command['id'] = '_decompte';
		$command['from'] = array('forum' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("count(*)");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array((!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('forum.id_objet',sql_quote($in)) : 
			array('=', 'forum.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) DEFAULT \'0\' NOT NULL')))), (!(is_array(@$Pile[0]['objet'])?count(@$Pile[0]['objet']):strlen(@$Pile[0]['objet'])) ? '' : ((is_array(@$Pile[0]['objet'])) ? sql_in('forum.objet',sql_quote($in1)) : 
			array('=', 'forum.objet', sql_quote(@$Pile[0]['objet'],'','VARCHAR (25) DEFAULT \'\' NOT NULL COLLATE NOCASE')))), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('forum.statut',sql_quote($in2)) : 
			array('=', 'forum.statut', sql_quote(@$Pile[0]['statut'],'','varchar(8) DEFAULT \'0\' NOT NULL COLLATE NOCASE')))), 
			array('REGEXP', 'forum.statut', sql_quote(table_valeur($Pile["vars"], (string)'prive', null))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_decompte',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_decompte']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_decompte @ ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html","profiler");
	return $t0;
}


function BOUCLE_dochtml_12c55f887ddf8e70dcc4fc4062ba5db0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_doc';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.extension",
		"documents.id_document");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('documents.date_publication',''), 
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_forum'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('=', 'L1.objet', sql_quote('forum')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_doc',34,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
				' .
interdire_scripts((match($Pile[$SP]['extension'],'^(gif|jpg|png)$') ? (	filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_doc',36,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'300')) .
	'
				'):(	quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, '') .
	'
				'))) .
'
				');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_doc @ ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html","profiler");
	return $t0;
}


function BOUCLE_doc2html_12c55f887ddf8e70dcc4fc4062ba5db0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_doc2';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.extension",
		"documents.id_document");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('documents.date_publication',''), 
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_forum'],'','bigint(21) DEFAULT \'0\' NOT NULL')), 
			array('=', 'L1.objet', sql_quote('forum')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_doc2',67,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
				' .
interdire_scripts((match($Pile[$SP]['extension'],'^(gif|jpg|png)$') ? (	filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_doc2',69,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'300')) .
	'
				'):(	quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, '') .
	'
				'))) .
'
				');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_doc2 @ ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html","profiler");
	return $t0;
}


function BOUCLE_forums_bouclehtml_12c55f887ddf8e70dcc4fc4062ba5db0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$save_numrows = (isset($Numrows['_forums_fils']) ? $Numrows['_forums_fils'] : array());
	$t0 = (($t1 = BOUCLE_forums_filshtml_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
		<ul>
			' . $t1 . '
		</ul>
		') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}


function BOUCLE_forums_filshtml_12c55f887ddf8e70dcc4fc4062ba5db0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[$SP]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'forum';
		$command['id'] = '_forums_fils';
		$command['from'] = array('forum' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("forum.id_forum",
		"forum.date_heure",
		"forum.statut",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.id_auteur",
		"forum.auteur",
		"forum.email_auteur",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site");
		$command['orderby'] = array('forum.date_heure');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'forum.id_parent', sql_quote($Pile[$SP]['id_forum'],'','bigint(21) DEFAULT \'0\' NOT NULL')), (!(is_array($Pile[$SP]['statut'])?count($Pile[$SP]['statut']):strlen($Pile[$SP]['statut'])) ? '' : ((is_array($Pile[$SP]['statut'])) ? sql_in('forum.statut',sql_quote($in)) : 
			array('=', 'forum.statut', sql_quote($Pile[$SP]['statut'],'','varchar(8) DEFAULT \'0\' NOT NULL COLLATE NOCASE')))), 
			array('REGEXP', 'forum.statut', sql_quote(table_valeur($Pile["vars"], (string)'prive', null))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_forums_fils',46,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:par_auteur');
	$l2 = _T('public|spip|ecrire:voir_en_ligne');
	$l3 = _T('forum:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'

			<li>
				<div class="forum-message">
					<div class="forum-chapo">
						<strong class="forum-titre"><a href="#forum' .
$Pile[$SP]['id_forum'] .
'" name="forum' .
$Pile[$SP]['id_forum'] .
'" id="forum' .
$Pile[$SP]['id_forum'] .
'">' .
interdire_scripts(liens_nofollow(safehtml(typo(interdit_html($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
'</a></strong>
						<span class=\'date\'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
'</span>
						<span class=\'par\'>' .
$l1 .
'
						' .
(($Pile[$SP]['id_auteur'])  ?
		('
						' . ' ' . (	'<a href=\'' .
	generer_url_ecrire('auteur',(	'id_auteur=' .
		$Pile[$SP]['id_auteur'])) .
	'\'>' .
	
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/auteur_nom', array('id_auteur' => $Pile[$SP]['id_auteur'] ,'lang' => $GLOBALS["spip_lang"] ,'id_forum'=>$Pile[$SP]['id_forum'],'id'=>$Pile[$SP]['id_forum'],'recurs'=>(++$recurs)), array('compil'=>array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_forums_fils',51,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
	'</a>
						')) :
		'') .
(($t1 = strval(($Pile[$SP]['id_auteur'] ? '':interdire_scripts(liens_nofollow(safehtml(vider_url($Pile[$SP]['auteur'])))))))!=='' ?
		($t1 . '
						') :
		'') .
(!($Pile[$SP]['id_auteur'])  ?
		(' ' . (($t2 = strval(interdire_scripts(safehtml(vider_url($Pile[$SP]['email_auteur'])))))!=='' ?
			((	'<a href=\'mailto:' .
		interdire_scripts(safehtml(vider_url($Pile[$SP]['email_auteur']))) .
		'\'>') . $t2 . '</a>') :
			'')) :
		'') .
'
						</span>				
					</div>
					<div class="forum-texte">
						' .
interdire_scripts(lignes_longues(liens_nofollow(safehtml(propre(interdit_html($Pile[$SP]['texte']), $connect, $Pile[0]))))) .
'
						' .
(($t1 = strval(interdire_scripts(lignes_longues(liens_nofollow(safehtml(propre(interdit_html(calculer_notes()), $connect, $Pile[0])))))))!=='' ?
		('<div class=\'notes\'>' . $t1 . '</div>') :
		'') .
'
						' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		((	'<p class="hyperlien">' .
	$l2 .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts(((($a = liens_nofollow(safehtml(typo(interdit_html(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false))), "TYPO", $connect, $Pile[0])))) OR (is_string($a) AND strlen($a))) ? $a : couper(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect))),'80'))) .
	'</a></p>')) :
		'') .
'

				' .
BOUCLE_doc2html_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP) .
'


						' .
(($t1 = strval(parametre_url(self(),'repondre',$Pile[$SP]['id_forum'])))!=='' ?
		('<p class="repondre"><a class=\'ajax\' href="' . $t1 . (	'" rel="noindex nofollow">' .
	$l3 .
	'</a></p>')) :
		'') .
'
					</div>
				</div>

				' .
BOUCLE_forums_bouclehtml_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			</li>

			');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_forums_fils @ ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html","profiler");
	return $t0;
}


function BOUCLE_forumshtml_12c55f887ddf8e70dcc4fc4062ba5db0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['objet']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$command['pagination'] = array((isset($Pile[0]['debut_forums']) ? $Pile[0]['debut_forums'] : null), 10);
	if (!isset($command['table'])) {
		$command['table'] = 'forum';
		$command['id'] = '_forums';
		$command['from'] = array('forum' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("forum.id_forum",
		"forum.statut",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.id_auteur",
		"forum.auteur",
		"forum.email_auteur",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site");
		$command['orderby'] = array('forum.date_heure DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'forum.id_parent', 0), (!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('forum.id_objet',sql_quote($in)) : 
			array('=', 'forum.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) DEFAULT \'0\' NOT NULL')))), (!(is_array(@$Pile[0]['objet'])?count(@$Pile[0]['objet']):strlen(@$Pile[0]['objet'])) ? '' : ((is_array(@$Pile[0]['objet'])) ? sql_in('forum.objet',sql_quote($in1)) : 
			array('=', 'forum.objet', sql_quote(@$Pile[0]['objet'],'','VARCHAR (25) DEFAULT \'\' NOT NULL COLLATE NOCASE')))), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('forum.statut',sql_quote($in2)) : 
			array('=', 'forum.statut', sql_quote(@$Pile[0]['statut'],'','varchar(8) DEFAULT \'0\' NOT NULL COLLATE NOCASE')))), 
			array('REGEXP', 'forum.statut', sql_quote(table_valeur($Pile["vars"], (string)'prive', null))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_forums',10,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_forums']['compteur_boucle'] = 0;
	$Numrows['_forums']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_forums']) ? $Pile[0]['debut_forums'] : _request('debut_forums');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_forums'] = quete_debut_pagination('id_forum',$Pile[0]['@id_forum'] = substr($debut_boucle,1),10,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_forums']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_forums']['total'] : $debut_boucle + 9), $Numrows['_forums']['total'] - 1);
	$Numrows['_forums']['grand_total'] = $Numrows['_forums']['total'];
	$Numrows['_forums']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_forums']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_forums']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public|spip|ecrire:par_auteur');
	$l2 = _T('public|spip|ecrire:voir_en_ligne');
	$l3 = _T('forum:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_forums']['compteur_boucle']++;
		if ($Numrows['_forums']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_forums']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'

	<li class="forum-fil statut_' .
interdire_scripts($Pile[$SP]['statut']) .
'">

		<div class="forum-message">
			<div class="forum-chapo">
				<strong class="forum-titre"><a href="#forum' .
$Pile[$SP]['id_forum'] .
'" name="forum' .
$Pile[$SP]['id_forum'] .
'" id="forum' .
$Pile[$SP]['id_forum'] .
'">' .
interdire_scripts(liens_nofollow(safehtml(typo(interdit_html($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
'</a></strong>
				<span class=\'date\'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
'</span>
				<span class=\'par\'>' .
$l1 .
'
				' .
(($Pile[$SP]['id_auteur'])  ?
		('
				' . ' ' . (	'<a href=\'' .
	generer_url_ecrire('auteur',(	'id_auteur=' .
		$Pile[$SP]['id_auteur'])) .
	'\'>' .
	
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/auteur_nom', array('id_auteur' => $Pile[$SP]['id_auteur'] ,'lang' => $GLOBALS["spip_lang"] ,'id_forum'=>$Pile[$SP]['id_forum'],'id'=>$Pile[$SP]['id_forum'],'recurs'=>(++$recurs)), array('compil'=>array('../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html','html_12c55f887ddf8e70dcc4fc4062ba5db0','_forums',17,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
	'</a>
				')) :
		'') .
(($t1 = strval(($Pile[$SP]['id_auteur'] ? '':interdire_scripts(liens_nofollow(safehtml(vider_url($Pile[$SP]['auteur'])))))))!=='' ?
		($t1 . '
				') :
		'') .
(!($Pile[$SP]['id_auteur'])  ?
		(' ' . (($t2 = strval(interdire_scripts(safehtml(vider_url($Pile[$SP]['email_auteur'])))))!=='' ?
			((	'<a href=\'mailto:' .
		interdire_scripts(safehtml(vider_url($Pile[$SP]['email_auteur']))) .
		'\'>') . $t2 . '</a>') :
			'')) :
		'') .
'
				</span>
			</div>
			<div class="forum-texte">
				' .
interdire_scripts(lignes_longues(liens_nofollow(safehtml(propre(interdit_html($Pile[$SP]['texte']), $connect, $Pile[0]))))) .
'
				' .
(($t1 = strval(interdire_scripts(lignes_longues(liens_nofollow(safehtml(propre(interdit_html(calculer_notes()), $connect, $Pile[0])))))))!=='' ?
		('<div class=\'notes\'>' . $t1 . '</div>') :
		'') .
'
				' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		((	'<p class="hyperlien">' .
	$l2 .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts(((($a = liens_nofollow(safehtml(typo(interdit_html(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false))), "TYPO", $connect, $Pile[0])))) OR (is_string($a) AND strlen($a))) ? $a : couper(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect))),'80'))) .
	'</a></p>')) :
		'') .
'

				' .
BOUCLE_dochtml_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP) .
'

				' .
(($t1 = strval(parametre_url(self(),'repondre',$Pile[$SP]['id_forum'])))!=='' ?
		('<p class="repondre"><a class=\'ajax\' href="' . $t1 . (	'" rel="noindex nofollow">' .
	$l3 .
	'</a></p>')) :
		'') .
'
			</div>
		</div>

		' .
(($t1 = BOUCLE_forums_filshtml_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
		<ul>
			' . $t1 . '
		</ul>
		') :
		'') .
'

	</li>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_forums @ ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html
// Temps de compilation total: 240.013 ms
//

function html_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum(@$Pile[0]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum(@$Pile[0]['id_article']) == ""))
		? "" : // sinon:
		(calcul_parametres_forum($Pile[0],null,null,null).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))) ? '':'') .
'
' .
vide($Pile['vars'][(string)'prive'] = interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'quoi', null), 'public'),true) == 'interne') ? '^(priv|perso)':'.*'))) .
'
' .
BOUCLE_decomptehtml_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP)
. (($t2 = strval(singulier_ou_pluriel($Numrows['_decompte']['total'],'forum:info_1_message_forum','forum:info_nb_messages_forum')))!=='' ?
			('<h2>' . $t2 . '</h2>') :
			'') .
'


' .
(($t1 = BOUCLE_forumshtml_12c55f887ddf8e70dcc4fc4062ba5db0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_forums"]["grand_total"],
 		'_forums',
		isset($Pile[0]['debut_forums'])?$Pile[0]['debut_forums']:intval(_request('debut_forums')),
		10, true, '', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
<ul class="forum">

	') . $t1 . '

</ul>
') :
		''));

	return analyse_resultat_skel('html_12c55f887ddf8e70dcc4fc4062ba5db0', $Cache, $page, '../plugins-dist/forum/prive/objets/liste/participer_forum_thread.html');
}
?>