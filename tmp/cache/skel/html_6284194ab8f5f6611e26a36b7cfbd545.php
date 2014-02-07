<?php

/*
 * Squelette : skeleton/modeles/carousel.html
 * Date :      Thu, 06 Feb 2014 11:59:57 GMT
 * Compile :   Fri, 07 Feb 2014 11:37:19 GMT
 * Boucles :   _carousel
 */ 

function BOUCLE_carouselhtml_6284194ab8f5f6611e26a36b7cfbd545(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'articles.id_rubrique', "7"));
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
		array('skeleton/modeles/carousel.html','html_6284194ab8f5f6611e26a36b7cfbd545','_carousel',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'

			<div class="swiper-slide" style="background-size:cover;background-image:url(' .
extraire_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'600','0')),'src') .
')">
				<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">
				<span class="swiper-caption"><h2 class="nomargin">' .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_carousel @ skeleton/modeles/carousel.html","profiler");
	return $t0;
}

//
// Fonction principale du squelette skeleton/modeles/carousel.html
// Temps de compilation total: 2.055 ms
//

function html_6284194ab8f5f6611e26a36b7cfbd545($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_carouselhtml_6284194ab8f5f6611e26a36b7cfbd545($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div class="blocklink" id="carousel">
	<div class="swiper-container">
		<div class="swiper-wrapper">

			' . $t1 . '

		</div>
		<div class="pagination"></div>
	</div>
	<a class="carousel-left" href="#" onclick="mySwiper.swipePrev();mySwiper.stopAutoplay();return false;"><i class="fa fa-chevron-circle-left fa-fw"></i></a>
	<a class="carousel-right" href="#" onclick="mySwiper.swipeNext();mySwiper.stopAutoplay();return false;"><i class="fa fa-chevron-circle-right fa-fw"></i></a>
</div>
<script>$(document).ready(function(){mySwiper = new Swiper(\'.swiper-container\',{mode:\'horizontal\',loop: true,pagination: \'.pagination\',autoplay:6000,paginationClickable:true});});</script>
') :
		'') .
'
');

	return analyse_resultat_skel('html_6284194ab8f5f6611e26a36b7cfbd545', $Cache, $page, 'skeleton/modeles/carousel.html');
}
?>