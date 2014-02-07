<?php

/*
 * Squelette : ../plugins/auto/mailshot-v1/prive/style_prive_plugin_mailshot.html
 * Date :      Wed, 09 Jan 2013 15:00:12 GMT
 * Compile :   Fri, 07 Feb 2014 10:26:58 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/mailshot-v1/prive/style_prive_plugin_mailshot.html
// Temps de compilation total: 0.337 ms
//

function html_067f1bb75df4b052b0f59b37aad4a8f7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

.formulaire_newsletter_send fieldset,
.formulaire_newsletter_send ul {margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0}
.formulaire_newsletter_send legend {font-weight: bold}

.formulaire_newsletter_send .editer_email_test .text {width: 20em;}
.formulaire_newsletter_send .editer_email_test .submit {float: ' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'right', null),true)) .
'}

.formulaire_newsletter_send legend {font-weight: bold}
.formulaire_newsletter_send .editer_liste .select {width: 20em;}
.formulaire_newsletter_send .editer_liste .submit {float: ' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'right', null),true)) .
'}

.formulaire_newsletter_send .mailshots .sujet {display: none;}

.mailshot #wysiwyg {margin-bottom: 2.0775em;padding:0;}
.mailshot #wysiwyg .label {display: inline;}
.mailshot #wysiwyg .contenu_avancement,
.mailshot #wysiwyg .contenu_html,
.mailshot #wysiwyg .contenu_texte {margin-bottom: 3em;}
.mailshot #wysiwyg .contenu_html .label,
.mailshot #wysiwyg .contenu_texte .label {display: block}
.mailshot #wysiwyg .html iframe,
.mailshot #wysiwyg .texte iframe {width:100%;height:400px;overflow:auto;border:1px solid #ddd;}


.mailshot .infos .actions {text-align: right;}
.mailshot .mailshots_destinataires .id_mailshot {display: none;}
.mailshot .mailshots_destinataires .date {width: 180px}
.mailshot .dest_todo .mailshots_destinataires .statut,
.mailshot .dest_todo .mailshots_destinataires .date,
.mailshot .dest_fail .mailshots_destinataires .statut {display: none;}

.mailshot_ended .mailshots .action {display: none}');

	return analyse_resultat_skel('html_067f1bb75df4b052b0f59b37aad4a8f7', $Cache, $page, '../plugins/auto/mailshot-v1/prive/style_prive_plugin_mailshot.html');
}
?>