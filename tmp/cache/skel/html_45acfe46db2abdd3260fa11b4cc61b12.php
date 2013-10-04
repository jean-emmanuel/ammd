<?php

/*
 * Squelette : ../plugins/auto/formidable_1_0/prive/style_prive_plugin_formidable.html
 * Date :      Fri, 04 Oct 2013 08:06:34 GMT
 * Compile :   Fri, 04 Oct 2013 12:31:42 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/formidable_1_0/prive/style_prive_plugin_formidable.html
// Temps de compilation total: 24.002 ms
//

function html_45acfe46db2abdd3260fa11b4cc61b12($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars'][(string)'claire'] = interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'couleur_claire', null), 'edf3fe'),true))) .
vide($Pile['vars'][(string)'foncee'] = interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'couleur_foncee', null), '3874b0'),true))) .
'body .formidable_analyse .progress-bar span {
	background-color: #' .
table_valeur($Pile["vars"], (string)'claire', null) .
';
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#' .
table_valeur($Pile["vars"], (string)'claire', null) .
'), to(#' .
table_valeur($Pile["vars"], (string)'foncee', null) .
'));
	  background-image: -webkit-linear-gradient(top, #' .
table_valeur($Pile["vars"], (string)'claire', null) .
', #' .
table_valeur($Pile["vars"], (string)'foncee', null) .
');
	  background-image: -moz-linear-gradient(top, #' .
table_valeur($Pile["vars"], (string)'claire', null) .
', #' .
table_valeur($Pile["vars"], (string)'foncee', null) .
');
	  background-image: -ms-linear-gradient(top, #' .
table_valeur($Pile["vars"], (string)'claire', null) .
', #' .
table_valeur($Pile["vars"], (string)'foncee', null) .
');
	  background-image: -o-linear-gradient(top, #' .
table_valeur($Pile["vars"], (string)'claire', null) .
', #' .
table_valeur($Pile["vars"], (string)'foncee', null) .
');
	  background-image: linear-gradient(top, #' .
table_valeur($Pile["vars"], (string)'claire', null) .
', #' .
table_valeur($Pile["vars"], (string)'foncee', null) .
'); 
}

#navigation .navigation_resultats {
	margin-top:1em;
	padding-top:1em;
	border-top:1px solid #eee;
}

#contenu .box.traitements ul.spip {margin-bottom:0;}

#contenu .liste-objets.formulaires_reponses tr > .date {width:auto;}
#contenu .liste-objets.formulaires_reponses tr > .auteur {width:auto;}

.formulaires_reponse #contenu #wysiwyg {margin-top:1em;}
.formulaires_reponse #contenu #wysiwyg .label {
	width:140px; float:left; display:block;
}
.formulaires_reponse #contenu .fiche_objet .reponses .inner { border:none; }
.formulaires_reponse #contenu .fiche_objet .reponses .hd {
    padding-bottom: 3px; margin-bottom:10px; border-bottom:1px solid #ccc;
}
');

	return analyse_resultat_skel('html_45acfe46db2abdd3260fa11b4cc61b12', $Cache, $page, '../plugins/auto/formidable_1_0/prive/style_prive_plugin_formidable.html');
}
?>