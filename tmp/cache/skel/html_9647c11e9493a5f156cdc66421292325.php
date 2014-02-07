<?php

/*
 * Squelette : skeleton/inc/foot.html
 * Date :      Thu, 06 Feb 2014 18:38:22 GMT
 * Compile :   Fri, 07 Feb 2014 11:37:20 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette skeleton/inc/foot.html
// Temps de compilation total: 0.504 ms
//

function html_9647c11e9493a5f156cdc66421292325($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'		<div class="clear"></div>
	</div>
</div>

<div class="footer">
	<div class="wrapper">
		<a href="https://twitter.com/AMMDCoorp" title="Twitter"><i class="fa fa-twitter-square fa-fw fa-fh"></i></a>
		<a href="https://github.com/AMMD" title="GitHub"><i class="fa fa-github fa-fw fa-fh"></i></a>
		<a href="http://ammd.bandcamp.com/" title="Bandcamp"><i class="fa fa-stop bandcamp fa-fw fa-fh"></i></a>
	
		<div class="float-right">
		<a href="' .
vider_url(urlencode_1738(generer_url_entite('84', 'article', '', '', true))) .
'" title="Mentions Légales" class="' .
(((@$Pile[0]['id_article'] == '84'))  ?
		(' ' . ' ' . 'on') :
		'') .
'"><i class="fa fa-legal fa-fw fa-fh"></i></a>
		</div>
	</div>
</div>
</body>
</html>
');

	return analyse_resultat_skel('html_9647c11e9493a5f156cdc66421292325', $Cache, $page, 'skeleton/inc/foot.html');
}
?>