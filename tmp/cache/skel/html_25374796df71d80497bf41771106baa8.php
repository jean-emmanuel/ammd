<?php

/*
 * Squelette : ../prive/squelettes/inclure/admin_vider_images.html
 * Date :      Sun, 19 Jan 2014 17:32:59 GMT
 * Compile :   Fri, 07 Feb 2014 13:17:39 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/inclure/admin_vider_images.html
// Temps de compilation total: 2.334 ms
//

function html_25374796df71d80497bf41771106baa8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('configurer', '_admin_vider')?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'

' .
	boite_ouvrir(interdire_scripts(wrap(concat(filtre_balise_img_dist(chemin_image('image-24.png'),'','cadre-icone'),_T('info_images_auto')),'<h3>')), 'simple', 'titrem') .
	'<div id="placehoder_taille_cache_images"><p>&nbsp;<br />&nbsp;<br />&nbsp;<br /></p></div>
	<script type="text/javascript">
		jQuery(function(){jQuery(\'#placehoder_taille_cache_images\').animateLoading().load(\'' .
	invalideur_session($Cache, replace(generer_action_auteur('calculer_taille_cache','images'),'&amp;','&')) .
	'\');});
	</script>
	<noscript>
		<iframe src="' .
	invalideur_session($Cache, generer_action_auteur('calculer_taille_cache','images')) .
	'" style="width: 100%;height: 3em;overflow: hidden;"></iframe>
	</noscript>

' .
	boite_pied() .
	'
	' .
	bouton_action(_T('public|spip|ecrire:bouton_vider_cache'),invalideur_session($Cache, generer_action_auteur('purger','vignettes',invalideur_session($Cache, self()))),'ajax') .
	'
' .
	boite_fermer() .
	'
')) :
		'');

	return analyse_resultat_skel('html_25374796df71d80497bf41771106baa8', $Cache, $page, '../prive/squelettes/inclure/admin_vider_images.html');
}
?>