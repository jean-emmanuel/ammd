<?php

/*
 * Squelette : ../prive/objets/liste/auteurs_lies.html
 * Date :      Sun, 19 Jan 2014 17:32:59 GMT
 * Compile :   Fri, 07 Feb 2014 11:39:46 GMT
 * Boucles :   _lettre, _liste_aut
 */ 

function BOUCLE_lettrehtml_fc3be345a7465728ddeaa6e8807a47f0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (table_valeur($Pile["vars"], (string)'selection', null)))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_lettre']))?$Pile[0]['tri'.'_lettre']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_lettre']))?$Pile[0]['sens'.'_lettre']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_lettre']))?$Pile[0]['tri'.'_lettre']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_lettre';
		$command['from'] = array('auteurs' => 'spip_auteurs');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("".tri_champ_select($tri)."",
		"auteurs.nom",
		"auteurs.id_auteur");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri);
	$command['where'] = 
			array(sql_in('auteurs.id_auteur',sql_quote($in)), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('auteurs.statut',sql_quote($in1)) : 
			array('=', 'auteurs.statut', sql_quote(@$Pile[0]['statut'],'','varchar(255)  DEFAULT \'0\' NOT NULL COLLATE NOCASE')))), 
			array('REGEXP', 'auteurs.id_auteur', sql_quote((table_valeur($Pile["vars"], (string)'afficher_lettres', null) ? '.*':'A'))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/liste/auteurs_lies.html','html_fc3be345a7465728ddeaa6e8807a47f0','_lettre',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_lettre']['compteur_boucle'] = 0;
	$Numrows['_lettre']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_lettre']['compteur_boucle']++;
		$t0 .= (
((unique(initiale($Pile[$SP]['nom'])))  ?
		('
		' . ' ' . (	'
		' .
	vide($Pile['vars'][$_zzz=(string)'p'] = concat(table_valeur($Pile["vars"], (string)'p', null),afficher_initiale(ancre_url(parametre_url(self(),'debutautl',(	'@' .
				$Pile[$SP]['id_auteur'])),'paginationautl'),initiale($Pile[$SP]['nom']),$Numrows['_lettre']['compteur_boucle'],table_valeur($Pile["vars"], (string)'debut', null),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true))))) .
	'
		')) :
		'') .
vide($Numrows['_lettre']['compteur_boucle']=$iter->skip(interdire_scripts(moins(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true),(($Numrows['_lettre']['compteur_boucle'] == '1') ? '2':'1'))),$Numrows['_lettre']['total'])));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_lettre @ ../prive/objets/liste/auteurs_lies.html","profiler");
	return $t0;
}


function BOUCLE_liste_authtml_fc3be345a7465728ddeaa6e8807a47f0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (table_valeur($Pile["vars"], (string)'selection', null)))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_aut']))?$Pile[0]['sens'.'_liste_aut']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debutautl']) ? $Pile[0]['debutautl'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_liste_aut';
		$command['from'] = array('auteurs' => 'spip_auteurs','LAA' => 'spip_auteurs_liens','articles' => 'spip_articles');
		$command['type'] = array('LAA' => 'left','articles' => 'left');
		$command['groupby'] = array("auteurs.id_auteur");
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("".tri_champ_select($tri)."",
		"auteurs.id_auteur",
		"COUNT(articles.id_article) AS compteur_articles",
		"auteurs.nom",
		"auteurs.statut",
		"auteurs.bio",
		"auteurs.nom AS titre_rang",
		"auteurs.email");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri);
	$command['where'] = 
			array(sql_in('auteurs.id_auteur',sql_quote($in)), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('auteurs.statut',sql_quote($in1)) : 
			array('=', 'auteurs.statut', sql_quote(@$Pile[0]['statut'],'','varchar(255)  DEFAULT \'0\' NOT NULL COLLATE NOCASE')))));
	$command['join'] = array('LAA' => array('auteurs','id_auteur','id_auteur','LAA.objet=\'article\''), 'articles' => array('LAA','id_article','id_objet','(articles.statut IS NULL OR '.sql_in('articles.statut',_q(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'filtre_statut_articles', null), 'poubelle'))), 'NOT').')'));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/liste/auteurs_lies.html','html_fc3be345a7465728ddeaa6e8807a47f0','_liste_aut',11,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_aut']['compteur_boucle'] = 0;
	$Numrows['_liste_aut']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debutautl']) ? $Pile[0]['debutautl'] : _request('debutautl');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debutautl'] = quete_debut_pagination('id_auteur',$Pile[0]['@id_auteur'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_aut']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10))));
	$fin_boucle = min(($tout ? $Numrows['_liste_aut']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10) - 1), $Numrows['_liste_aut']['total'] - 1);
	$Numrows['_liste_aut']['grand_total'] = $Numrows['_liste_aut']['total'];
	$Numrows['_liste_aut']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_aut']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_aut']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public|spip|ecrire:texte_vide');
	$l2 = _T('public|spip|ecrire:lien_retirer_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_aut']['compteur_boucle']++;
		if ($Numrows['_liste_aut']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_aut']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
		<tr class="' .
alterner($Numrows['_liste_aut']['compteur_boucle'],'row_odd','row_even') .
(($t1 = strval(unique((calcul_exposer($Pile[$SP]['id_auteur'], 'id_auteur', $Pile[0], '', 'id_auteur', '') ? 'on' : ''))))!=='' ?
		(' ' . $t1) :
		'') .
(($t1 = strval(unique(((initiale($Pile[$SP]['nom']) == interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'i', null),true))) ? 'on':''))))!=='' ?
		(' ' . $t1) :
		'') .
((($Pile[$SP]['id_auteur'] == interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_lien_ajoute', null),true))))  ?
		(' ' . 'append') :
		'') .
'">
			<td class=\'statut\'>' .
interdire_scripts(filtre_puce_statut_dist($Pile[$SP]['statut'],'auteur')) .
'</td>
			<td class=\'nom' .
(($t1 = strval(interdire_scripts(((typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) ?'' :' '))))!=='' ?
		(' ' . $t1 . 'vide') :
		'') .
'\'>' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'20','20')) .
'<a href="' .
generer_url_entite($Pile[$SP]['id_auteur'],'auteur') .
'"' .
(($t1 = strval(interdire_scripts(attribut_html(couper($Pile[$SP]['bio'],'200')))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
'>' .
(($t1 = strval(recuperer_numero($Pile[$SP]['titre_rang'])))!=='' ?
		($t1 . '. ') :
		'') .
interdire_scripts(((($a = typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : $l1)) .
'</a></td>
			<td class=\'email\'>' .
(($t1 = strval(interdire_scripts($Pile[$SP]['email'])))!=='' ?
		('<a href=\'mailto:' . $t1 . (	'\'>' .
	interdire_scripts(couper($Pile[$SP]['email'],'30')) .
	'</a>')) :
		'') .
'</td>
			<td class=\'nombre\'>' .
singulier_ou_pluriel($Pile[$SP]['compteur_articles'],'info_1_article','info_nb_articles') .
(($t1 = strval(filtre_implode_dist(pipeline( 'compter_contributions_auteur' , array('args' => array('id_auteur' => $Pile[$SP]['id_auteur']), 'data' => array()) ),'<br />')))!=='' ?
		('<br /><span>' . $t1 . '</span>') :
		'') .
'</td>
			<td class=\'action\'>
				' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
				<button class="button link delete" name="supprimer_lien&#91;auteur-' .
	$Pile[$SP]['id_auteur'] .
	'-' .
	interdire_scripts(@$Pile[0]['objet']) .
	'-' .
	@$Pile[0]['id_objet'] .
	'&#93;" value="X">' .
	$l2 .
	' ' .
	interdire_scripts(filtre_balise_img_dist(chemin_image('supprimer-12.png'),'X')) .
	'</button>
				')) :
		'') .
'
			</td>
		</tr>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_aut @ ../prive/objets/liste/auteurs_lies.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../prive/objets/liste/auteurs_lies.html
// Temps de compilation total: 14.043 ms
//

function html_fc3be345a7465728ddeaa6e8807a47f0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('statut' => '1', 'multi nom' => '1', 'site' => '1', 'compteur_articles' => '-1
'))))!=='' ?
		($t1 . '
') :
		'') .
'
' .
vide($Pile['vars'][$_zzz=(string)'selection'] = interdire_scripts(lister_objets_lies(entites_html(table_valeur(@$Pile[0], (string)'objet_source', null),true),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'_objet_lien', null),true))))) .
vide($Pile['vars'][$_zzz=(string)'debut'] = interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'debutautl', null), interdire_scripts(eval('return '.'_request("debutautl");'.';'))),true))) .
'<input type="hidden" name="debutautl" value="' .
table_valeur($Pile["vars"], (string)'debut', null) .
'" />
' .
(($t1 = BOUCLE_liste_authtml_fc3be345a7465728ddeaa6e8807a47f0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'

' .
		vide($Pile['vars'][$_zzz=(string)'debut'] = interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'debutautl', null), interdire_scripts(eval('return '.'_request("debutautl");'.';'))),true))) .
		vide($Pile['vars'][$_zzz=(string)'afficher_lettres'] = interdire_scripts(((((($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'') == 'multi nom')) ?' ' :''))) .
		filtre_pagination_dist($Numrows["_liste_aut"]["grand_total"],
 		'autl',
		isset($Pile[0]['debutautl'])?$Pile[0]['debutautl']:intval(_request('debutautl')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets liste-objets-lies auteurs">
<table class=\'spip liste\'>
' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_aut']['grand_total'])
			? $Numrows['_liste_aut']['grand_total'] : $Numrows['_liste_aut']['total']),'info_1_auteur','info_nb_auteurs')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . (	' ' .
			interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artauteurs','../prive/objets/liste/auteurs_lies.html', $Pile[0]):'')) .
			'</strong></caption>')) :
				'') .
		'
	<thead>
		' .
		vide($Pile['vars'][$_zzz=(string)'p'] = '') .
		(($t3 = BOUCLE_lettrehtml_fc3be345a7465728ddeaa6e8807a47f0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				($t3 . (($t5 = strval(vide($Pile['vars'][$_zzz=(string)'p'] = concat(table_valeur($Pile["vars"], (string)'p', null),afficher_initiale('','',$Numrows['_lettre']['total'],table_valeur($Pile["vars"], (string)'debut', null),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))))))!=='' ?
						('
		' . $t5) :
						'')) :
				'') .
		'
		' .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'p', null)))!=='' ?
				('<tr><td colspan="5"><p class=\'pagination\'>' . $t3 . '</p></td></tr>') :
				'') .
		'
	
		<tr class=\'first_row\'>
			<th class=\'statut\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('statut',array('>','<')))?'sens':'tri').'_liste_aut',$s?(strpos('< >','statut')-1):'statut'),interdire_scripts(filtre_balise_img_dist(chemin_image('auteur-0minirezo-16.png'),attribut_html(_T('public|spip|ecrire:lien_trier_statut')))),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_aut']))?$Pile[0]['sens'.'_liste_aut']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','statut')-1)):((($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')=='statut'),'ajax') .
		'</th>
			<th class=\'nom\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('multi nom',array('>','<')))?'sens':'tri').'_liste_aut',$s?(strpos('< >','multi nom')-1):'multi nom'),_T('public|spip|ecrire:info_nom'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_aut']))?$Pile[0]['sens'.'_liste_aut']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','multi nom')-1)):((($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')=='multi nom'),'ajax') .
		'</th>
			<th class=\'email\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('email',array('>','<')))?'sens':'tri').'_liste_aut',$s?(strpos('< >','email')-1):'email'),_T('public|spip|ecrire:email'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_aut']))?$Pile[0]['sens'.'_liste_aut']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','email')-1)):((($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')=='email'),'ajax') .
		'</th>
			<th class=\'nombre\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('compteur_articles',array('>','<')))?'sens':'tri').'_liste_aut',$s?(strpos('< >','compteur_articles')-1):'compteur_articles'),_T('public|spip|ecrire:info_articles'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_aut']))?$Pile[0]['sens'.'_liste_aut']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','compteur_articles')-1)):((($t=(isset($Pile[0]['tri'.'_liste_aut']))?$Pile[0]['tri'.'_liste_aut']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'multi nom'),true)))?tri_protege_champ($t):'')=='compteur_articles'),'ajax') .
		'</th>
			<th class=\'action\' scope=\'col\'>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	') . $t1 . (	'
	</tbody>
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_aut"]["grand_total"],
 		'autl',
		isset($Pile[0]['debutautl'])?$Pile[0]['debutautl']:intval(_request('debutautl')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
' .
		(($t3 = strval(((((isset($Numrows['_liste_aut']['grand_total'])
			? $Numrows['_liste_aut']['grand_total'] : $Numrows['_liste_aut']['total']) > '3')) ?' ' :'')))!=='' ?
				($t3 . (	'<div class="action"><button class="button link" name="supprimer_lien' .
			interdire_scripts(eval('return '.'chr(91)'.';')) .
			'auteur-*-' .
			interdire_scripts(@$Pile[0]['objet']) .
			'-' .
			@$Pile[0]['id_objet'] .
			interdire_scripts(eval('return '.'chr(93)'.';')) .
			'" value="X">' .
			_T('public|spip|ecrire:lien_retirer_tous_auteurs') .
			' ' .
			interdire_scripts(filtre_balise_img_dist(chemin_image('supprimer-8.png'),'X')) .
			'</button></div>')) :
				'') .
		'
</div>
')) :
		((	'
<div class="liste-objets liste-objets-lies auteurs caption-wrap">
<strong class="caption">' .
	(($t2 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), _T('public|spip|ecrire:info_aucun_auteur')))))!=='' ?
			($t2 . ' ') :
			'') .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artauteurs','../prive/objets/liste/auteurs_lies.html', $Pile[0]):'')) .
	'</strong>
</div>
'))) .
'
');

	return analyse_resultat_skel('html_fc3be345a7465728ddeaa6e8807a47f0', $Cache, $page, '../prive/objets/liste/auteurs_lies.html');
}
?>