<?php

/*
 * Squelette : ../plugins/auto/agenda_3_5/prive/objets/contenu/article-evenements.html
 * Date :      Fri, 04 Oct 2013 08:05:13 GMT
 * Compile :   Fri, 04 Oct 2013 12:32:19 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/agenda_3_5/prive/objets/contenu/article-evenements.html
// Temps de compilation total: 18.001 ms
//

function html_9c4531f6e6941f4874f5ab7ecd9617b9($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<div id="agenda">
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/objets/liste/evenements-post') . ', array_merge('.var_export($Pile[0],1).',array(\'nb\' => ' . argumenter_squelette('5') . ',
	\'sinon\' => ' . argumenter_squelette(_T('agenda:info_aucun_evenement')) . ',
	\'statut\' => ' . argumenter_squelette(array('publie', 'prop')) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins/auto/agenda_3_5/prive/objets/contenu/article-evenements.html\',\'html_9c4531f6e6941f4874f5ab7ecd9617b9\',\'\',3,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .
(($t1 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('creerevenementdans', 'article', invalideur_session($Cache, @$Pile[0]['id_article']))?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	filtre_icone_horizontale_dist(parametre_url(parametre_url(generer_url_ecrire('evenement_edit','id_evenement=new'),'id_article',@$Pile[0]['id_article']),'redirect',self()),_T('agenda:creer_evenement'),'evenement-24.png','new','creer_evenement') .
	'
')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_9c4531f6e6941f4874f5ab7ecd9617b9', $Cache, $page, '../plugins/auto/agenda_3_5/prive/objets/contenu/article-evenements.html');
}
?>