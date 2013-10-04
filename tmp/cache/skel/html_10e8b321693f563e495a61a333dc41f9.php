<?php

/*
 * Squelette : theme-v1/modeles/carousel.html
 * Date :      Fri, 04 Oct 2013 12:22:50 GMT
 * Compile :   Fri, 04 Oct 2013 12:23:36 GMT
 * Boucles :   _carousel
 */ 

function BOUCLE_carouselhtml_10e8b321693f563e495a61a333dc41f9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_carousel';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_rubrique', "17"));
		$command['join'] = array();
		$command['limit'] = '0,5';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('theme-v1/modeles/carousel.html','html_10e8b321693f563e495a61a333dc41f9','_carousel',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'

<div class="swiper-slide">
' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'700','0')) .
'
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">
<span class="swiper-caption"><h2>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h2> ' .
interdire_scripts(couper(textebrut(propre($Pile[$SP]['texte'], $connect, $Pile[0])),'200','&nbsp;(...)')) .
'</span>
<span class="swiper-caption-date">' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'</span>
</a>
</div>

');
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_carousel @ theme-v1/modeles/carousel.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette theme-v1/modeles/carousel.html
// Temps de compilation total: 40.000 ms
//

function html_10e8b321693f563e495a61a333dc41f9($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_carouselhtml_10e8b321693f563e495a61a333dc41f9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div class="blocklink" id="carousel">
<div class="swiper-container">
<div class="swiper-wrapper">

' . $t1 . '

</div>
<div class="pagination"></div>
</div>
<a class="carousel-left" href="#" onclick="mySwiper.swipePrev();return false;"><div class="icon arrow-left"></div></a>
<a class="carousel-right" href="#" onclick="mySwiper.swipeNext();return false;"><div class="icon arrow-right"></div></a>
</div>
<!--[if !IE]><!--><script>window.onload = function() {mySwiper = new Swiper(\'.swiper-container\',{mode:\'horizontal\',loop: true,pagination: \'.pagination\',autoplay:6000,paginationClickable:true});}</script><!--<![endif]-->
<!--[if IE]><script>$(document).ready(function(){mySwiper = new Swiper(\'.swiper-container\',{mode:\'horizontal\',loop: true,pagination: \'.pagination\',autoplay:6000,paginationClickable:true});});</script><![endif]-->
') :
		'') .
'
');

	return analyse_resultat_skel('html_10e8b321693f563e495a61a333dc41f9', $Cache, $page, 'theme-v1/modeles/carousel.html');
}
?>