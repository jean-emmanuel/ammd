<?php

/*
 * Squelette : ../plugins-dist/urls_etendues/prive/objets/liste/urls.html
 * Date :      Sun, 19 Jan 2014 17:56:45 GMT
 * Compile :   Fri, 07 Feb 2014 10:27:01 GMT
 * Boucles :   _liste_urls
 */ 

function BOUCLE_liste_urlshtml_abbf4adf563b0dc9b9d007d3dae6ff8d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['type']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_urls']))?$Pile[0]['sens'.'_liste_urls']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debut_liste_urls']) ? $Pile[0]['debut_liste_urls'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'urls';
		$command['id'] = '_liste_urls';
		$command['from'] = array('urls' => 'spip_urls');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("".tri_champ_select($tri)."",
		"urls.date",
		"urls.perma",
		"urls.url",
		"urls.type",
		"urls.id_objet",
		"urls.id_parent");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri, 'urls.date DESC');
	$command['where'] = 
			array((!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('urls.id_objet',sql_quote($in)) : 
			array('=', 'urls.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT 0')))), (!(is_array(@$Pile[0]['type'])?count(@$Pile[0]['type']):strlen(@$Pile[0]['type'])) ? '' : ((is_array(@$Pile[0]['type'])) ? sql_in('urls.type',sql_quote($in1)) : 
			array('=', 'urls.type', sql_quote(@$Pile[0]['type'],'','varchar(15) DEFAULT \'article\' NOT NULL COLLATE NOCASE')))), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), 
			array('like', 'urls.url', sql_quote(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'recherche', null), '%'),true)))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/urls_etendues/prive/objets/liste/urls.html','html_abbf4adf563b0dc9b9d007d3dae6ff8d','_liste_urls',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_urls']['compteur_boucle'] = 0;
	$Numrows['_liste_urls']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_liste_urls']) ? $Pile[0]['debut_liste_urls'] : _request('debut_liste_urls');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_liste_urls'] = quete_debut_pagination('id_parent, url',$Pile[0]['@id_parent, url'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_urls']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10))));
	$fin_boucle = min(($tout ? $Numrows['_liste_urls']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10) - 1), $Numrows['_liste_urls']['total'] - 1);
	$Numrows['_liste_urls']['grand_total'] = $Numrows['_liste_urls']['total'];
	$Numrows['_liste_urls']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_urls']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_urls']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('urls:bouton_supprimer_url');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_urls']['compteur_boucle']++;
		if ($Numrows['_liste_urls']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_urls']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
		<tr class="' .
alterner($Numrows['_liste_urls']['compteur_boucle'],'row_odd','row_even') .
'">
			<td class=\'perma\'>' .
interdire_scripts(($Pile[$SP]['perma'] ? interdire_scripts(filtre_balise_img_dist(chemin_image('cadenas-16.png'))):'')) .
'</td>
			<td class=\'url principale\'>' .
interdire_scripts($Pile[$SP]['url']) .
'</td>
			<td class=\'objet\'>' .
interdire_scripts(_T(objet_info(typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0]),'texte_objet'))) .
'</td>
			<td class=\'id\'>' .
$Pile[$SP]['id_objet'] .
'</td>
			<td class=\'parent\'>' .
($Pile[$SP]['id_parent'] ? $Pile[$SP]['id_parent']:'') .
'</td>
			<td class=\'date secondaire\'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</td>
			<td class=\'action\'>' .
(($t1 = strval(invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', interdire_scripts(invalideur_session($Cache, typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0]))), invalideur_session($Cache, $Pile[$SP]['id_objet']))?" ":""))))!=='' ?
		($t1 . bouton_action(interdire_scripts(filtre_balise_img_dist(chemin_image('supprimer-12'),$l1)),invalideur_session($Cache, generer_action_auteur('supprimer_url',(($t4 = strval(invalideur_session($Cache, $Pile[$SP]['id_parent'])))!=='' ?
					($t4 . (	'-' .
				interdire_scripts(invalideur_session($Cache, $Pile[$SP]['url'])))) :
					''),invalideur_session($Cache, self()))),'ajax')) :
		'') .
'</td>
		</tr>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_urls @ ../plugins-dist/urls_etendues/prive/objets/liste/urls.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/urls_etendues/prive/objets/liste/urls.html
// Temps de compilation total: 11.709 ms
//

function html_abbf4adf563b0dc9b9d007d3dae6ff8d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('date' => interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'date_sens', null), '-1'),true)), 'url' => '1', 'id_objet' => '1
	type'))))!=='' ?
		($t1 . '
') :
		'') .
(($t1 = BOUCLE_liste_urlshtml_abbf4adf563b0dc9b9d007d3dae6ff8d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_urls"]["grand_total"],
 		'_liste_urls',
		isset($Pile[0]['debut_liste_urls'])?$Pile[0]['debut_liste_urls']:intval(_request('debut_liste_urls')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets urls">
<table class=\'spip liste\'>
' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_urls']['grand_total'])
			? $Numrows['_liste_urls']['grand_total'] : $Numrows['_liste_urls']['total']),'urls:info_1_url','urls:info_nb_urls')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . '</strong></caption>') :
				'') .
		'
	<thead>
		<tr class=\'first_row\'>
			<th class=\'perma\' scope=\'col\'></th>
			<th class=\'url principale\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('url',array('>','<')))?'sens':'tri').'_liste_urls',$s?(strpos('< >','url')-1):'url'),_T('urls:label_tri_url'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_urls']))?$Pile[0]['sens'.'_liste_urls']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','url')-1)):((($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')=='url'),'ajax') .
		'</th>
			<th class=\'objet\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('type',array('>','<')))?'sens':'tri').'_liste_urls',$s?(strpos('< >','type')-1):'type'),_T('urls:info_objet'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_urls']))?$Pile[0]['sens'.'_liste_urls']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','type')-1)):((($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')=='type'),'ajax') .
		'</th>
			<th class=\'id\' scope=\'col\'>' .
		_T('public|spip|ecrire:info_numero_abbreviation') .
		'</th>
			<th class=\'parent\' scope=\'col\'>' .
		_T('urls:info_id_parent') .
		'</th>
			<th class=\'date secondaire\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('date',array('>','<')))?'sens':'tri').'_liste_urls',$s?(strpos('< >','date')-1):'date'),_T('public|spip|ecrire:date'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_urls']))?$Pile[0]['sens'.'_liste_urls']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','date')-1)):((($t=(isset($Pile[0]['tri'.'_liste_urls']))?$Pile[0]['tri'.'_liste_urls']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'perma'),true)))?tri_protege_champ($t):'')=='date'),'ajax') .
		'</th>
			<th class="action"></th>
		</tr>
	</thead>
	<tbody>
	') . $t1 . (	'
	</tbody>
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_urls"]["grand_total"],
 		'_liste_urls',
		isset($Pile[0]['debut_liste_urls'])?$Pile[0]['debut_liste_urls']:intval(_request('debut_liste_urls')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
</div>
')) :
		((($t2 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'sinon', null), ''))))!=='' ?
			('
<div class="liste-objets urls caption-wrap"><strong class="caption">' . $t2 . '</strong></div>
') :
			''))) .
'
' .
((defined('_AJAX'))  ?
		(' ' . (	'
<script type="text/javascript">if (window.jQuery) jQuery(function(){jQuery(\'#url-' .
	interdire_scripts(typo(@$Pile[0]['type'], "TYPO", $connect, $Pile[0])) .
	'-' .
	@$Pile[0]['id_objet'] .
	'\').html(\'' .
	texte_script(url_absolue(generer_url_entite(@$Pile[0]['id_objet'],interdire_scripts(typo(@$Pile[0]['type'], "TYPO", $connect, $Pile[0])),'','',interdire_scripts(eval('return '.'true'.';'))))) .
	'\');})</script>
')) :
		'') .
'
');

	return analyse_resultat_skel('html_abbf4adf563b0dc9b9d007d3dae6ff8d', $Cache, $page, '../plugins-dist/urls_etendues/prive/objets/liste/urls.html');
}
?>