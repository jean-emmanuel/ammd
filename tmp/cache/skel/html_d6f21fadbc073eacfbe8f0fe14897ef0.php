<?php

/*
 * Squelette : ../plugins-dist/mots/prive/objets/liste/mots_lies.html
 * Date :      Sun, 19 Jan 2014 17:56:36 GMT
 * Compile :   Fri, 07 Feb 2014 11:39:46 GMT
 * Boucles :   _liste_mot
 */ 

function BOUCLE_liste_mothtml_d6f21fadbc073eacfbe8f0fe14897ef0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (table_valeur($Pile["vars"], (string)'selection', null)))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_groupe']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'type'),true)))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'type'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debutmotl']) ? $Pile[0]['debutmotl'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_liste_mot';
		$command['from'] = array('mots' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("".tri_champ_select($tri)."",
		"".sql_multi('mots.titre', $GLOBALS['spip_lang'])."",
		"mots.id_mot",
		"mots.id_groupe",
		"mots.titre AS titre_rang",
		"mots.titre",
		"mots.type");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri, 'multi');
	$command['where'] = 
			array(sql_in('mots.id_mot',sql_quote($in)), (!(is_array(@$Pile[0]['id_groupe'])?count(@$Pile[0]['id_groupe']):strlen(@$Pile[0]['id_groupe'])) ? '' : ((is_array(@$Pile[0]['id_groupe'])) ? sql_in('mots.id_groupe',sql_quote($in1)) : 
			array('=', 'mots.id_groupe', sql_quote(@$Pile[0]['id_groupe'],'','bigint(21) DEFAULT 0 NOT NULL')))), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/mots/prive/objets/liste/mots_lies.html','html_d6f21fadbc073eacfbe8f0fe14897ef0','_liste_mot',11,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_mot']['compteur_boucle'] = 0;
	$Numrows['_liste_mot']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debutmotl']) ? $Pile[0]['debutmotl'] : _request('debutmotl');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debutmotl'] = quete_debut_pagination('id_mot',$Pile[0]['@id_mot'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_mot']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10))));
	$fin_boucle = min(($tout ? $Numrows['_liste_mot']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10) - 1), $Numrows['_liste_mot']['total'] - 1);
	$Numrows['_liste_mot']['grand_total'] = $Numrows['_liste_mot']['total'];
	$Numrows['_liste_mot']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_mot']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_mot']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public|spip|ecrire:info_numero_abbreviation');
	$l2 = _T('mots:info_retirer_mot');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_mot']['compteur_boucle']++;
		if ($Numrows['_liste_mot']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_mot']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
		<tr class="' .
alterner($Numrows['_liste_mot']['compteur_boucle'],'row_odd','row_even') .
((($Pile[$SP]['id_mot'] == interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_lien_ajoute', null),true))))  ?
		(' ' . 'append') :
		'') .
'">
			<td class=\'picto\'>' .
filtre_puce_statut_dist('','mot',$Pile[$SP]['id_mot'],$Pile[$SP]['id_groupe']) .
'</td>
			<td class=\'titre principale\'>' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_mot', 'ON', $Pile[$SP]['id_mot'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'20','20')) .
'<a href="' .
generer_url_entite($Pile[$SP]['id_mot'],'mot') .
'"
																																						title="' .
attribut_html($l1) .
' ' .
$Pile[$SP]['id_mot'] .
'">' .
(($t1 = strval(recuperer_numero($Pile[$SP]['titre_rang'])))!=='' ?
		($t1 . '. ') :
		'') .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a></td>
			<td class=\'type secondaire\'>' .
interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0])) .
'</td>
			<td class=\'action\'><button class="button link delete" name="supprimer_lien[mot-' .
$Pile[$SP]['id_mot'] .
'-' .
interdire_scripts(@$Pile[0]['objet']) .
'-' .
@$Pile[0]['id_objet'] .
']" value="X">' .
$l2 .
' ' .
interdire_scripts(filtre_balise_img_dist(chemin_image('supprimer-12.png'),'X')) .
'</button></td>
		</tr>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_mot @ ../plugins-dist/mots/prive/objets/liste/mots_lies.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/mots/prive/objets/liste/mots_lies.html
// Temps de compilation total: 7.081 ms
//

function html_d6f21fadbc073eacfbe8f0fe14897ef0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('type' => '1', 'num titre' => '1', 'titre' => '1', 'id_mot' => '1', 'points' => '-1
'))))!=='' ?
		($t1 . '
') :
		'') .
'
' .
vide($Pile['vars'][$_zzz=(string)'selection'] = interdire_scripts(lister_objets_lies(entites_html(table_valeur(@$Pile[0], (string)'objet_source', null),true),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'_objet_lien', null),true))))) .
'<input type="hidden" name="debutmotl" value=\'' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'debutmotl', null), interdire_scripts(eval('return '.'_request("debutmotl");'.';'))),true)) .
'\' />
' .
(($t1 = BOUCLE_liste_mothtml_d6f21fadbc073eacfbe8f0fe14897ef0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_mot"]["grand_total"],
 		'motl',
		isset($Pile[0]['debutmotl'])?$Pile[0]['debutmotl']:intval(_request('debutmotl')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets liste-objets-lies mots">
<table class=\'spip liste\'>
' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_mot']['grand_total'])
			? $Numrows['_liste_mot']['grand_total'] : $Numrows['_liste_mot']['total']),'info_1_mot_cle','info_nb_mots_cles')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . (	' ' .
			interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artmots','../plugins-dist/mots/prive/objets/liste/mots_lies.html', $Pile[0]):'')) .
			'</strong></caption>')) :
				'') .
		'
	<thead>
		<tr class=\'first_row\'>
			<th class=\'picto\' scope=\'col\'></th>
			<th class=\'titre\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('titre',array('>','<')))?'sens':'tri').'_liste_mot',$s?(strpos('< >','titre')-1):'titre'),_T('public|spip|ecrire:info_titre'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'type'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','titre')-1)):((($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'type'),true)))?tri_protege_champ($t):'')=='titre'),'ajax') .
		'</th>
			<th class=\'type\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(self(),(($s=in_array('type',array('>','<')))?'sens':'tri').'_liste_mot',$s?(strpos('< >','type')-1):'type'),_T('mots:info_dans_groupe'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'type'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','type')-1)):((($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'type'),true)))?tri_protege_champ($t):'')=='type'),'ajax') .
		'</th>
			<th class=\'action\' scope=\'col\'>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	') . $t1 . (	'
	</tbody>
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_mot"]["grand_total"],
 		'motl',
		isset($Pile[0]['debutmotl'])?$Pile[0]['debutmotl']:intval(_request('debutmotl')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
' .
		(($t3 = strval(((((isset($Numrows['_liste_mot']['grand_total'])
			? $Numrows['_liste_mot']['grand_total'] : $Numrows['_liste_mot']['total']) > '3')) ?' ' :'')))!=='' ?
				($t3 . (	'<div class="action"><button class="button link" name="supprimer_lien' .
			interdire_scripts(eval('return '.'chr(91)'.';')) .
			'mot-*-' .
			interdire_scripts(@$Pile[0]['objet']) .
			'-' .
			@$Pile[0]['id_objet'] .
			interdire_scripts(eval('return '.'chr(93)'.';')) .
			'" value="X">' .
			_T('mots:info_retirer_mots') .
			' ' .
			interdire_scripts(filtre_balise_img_dist(chemin_image('supprimer-12.png'),'X')) .
			'</button></div>')) :
				'') .
		'
</div>
')) :
		((	'
<div class="liste-objets liste-objets-lies mots caption-wrap">
<strong class="caption">' .
	(($t2 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), _T('mots:info_aucun_mot_cle')))))!=='' ?
			($t2 . ' ') :
			'') .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artmots','../plugins-dist/mots/prive/objets/liste/mots_lies.html', $Pile[0]):'')) .
	'</strong>
</div>
'))) .
'
');

	return analyse_resultat_skel('html_d6f21fadbc073eacfbe8f0fe14897ef0', $Cache, $page, '../plugins-dist/mots/prive/objets/liste/mots_lies.html');
}
?>