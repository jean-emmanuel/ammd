<?php

/*
 * Squelette : ../prive/formulaires/editer_article.html
 * Date :      Sun, 19 Jan 2014 17:32:59 GMT
 * Compile :   Fri, 07 Feb 2014 11:38:43 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/editer_article.html
// Temps de compilation total: 12.859 ms
//

function html_29ed089f0bc45c165915000af257b859($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_editer formulaire_editer_article formulaire_editer_article-' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id_article', null), 'nouveau'),true)) .
'">
	' .
(($t1 = strval(table_valeur(@$Pile[0], (string)'message_ok', null)))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_erreur', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true))))!=='' ?
		($t1 . (	'
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'\'><div>
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div>' .
	'<input type=\'hidden\' name=\'id_article\' value=\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true)) .
	'\' />
	  <ul>
	  
	  	' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_surtitre') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'surtitre', null), ''):' '))  ?
			(' ' . (	'
	    <li class="editer editer_surtitre' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'surtitre'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="surtitre">' .
		_T('public|spip|ecrire:texte_sur_titre') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('surtitre','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'surtitre')))!=='' ?
				('
		<span class=\'erreur_message\'>' . $t3 . '</span>
		') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'surtitre\' id=\'surtitre\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' value="' .
		table_valeur(@$Pile[0], (string)'surtitre', null) .
		'" />
	    </li>')) :
			'') .
	'
	    <li class="editer editer_titre obligatoire' .
	((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'titre'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
	    	<label for="titre">' .
	_T('public|spip|ecrire:info_titre') .
	'<em class="aide">' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('titre','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
	'</em></label>' .
	(($t2 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'titre')))!=='' ?
			('
		<span class=\'erreur_message\'>' . $t2 . '</span>
		') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'titre\' id=\'titre\'' .
	(($t2 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
			(' lang=\'' . $t2 . '\'') :
			'') .
	' value="' .
	sinon(table_valeur(@$Pile[0], (string)'titre', null), '') .
	'"
				placeholder="' .
	attribut_html(_T('public|spip|ecrire:info_nouvel_article')) .
	'" />
	    </li>
	  	' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_soustitre') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'soustitre', null), ''):' '))  ?
			(' ' . (	'
	    <li class="editer editer_soustitre' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'soustitre'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="soustitre">' .
		_T('public|spip|ecrire:texte_sous_titre') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('soustitre','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'soustitre')))!=='' ?
				('
		<span class=\'erreur_message\'>' . $t3 . '</span>
		') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'soustitre\' id=\'soustitre\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' value="' .
		table_valeur(@$Pile[0], (string)'soustitre', null) .
		'" />
	    </li>')) :
			'') .
	'
		' .
	(($t2 = strval(filtre_chercher_rubrique_dist('',interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_article', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_parent', null),true)),'article',interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_secteur', null),true)),table_valeur(table_valeur(@$Pile[0], (string)'config', null),'restreint'),'0','form_simple')))!=='' ?
			((	'<li class="editer editer_parent' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'id_parent'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				<label for="id_parent">' .
		_T('public|spip|ecrire:titre_cadre_interieur_rubrique') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('id_parent','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'id_parent')))!=='' ?
				('
				<span class=\'erreur_message\'>' . $t3 . '</span>
				') :
				'') .
		'
				') . $t2 . '
	    </li>') :
			'') .
	'
		
	  	' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_descriptif') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'descriptif', null), ''):' '))  ?
			(' ' . (	'
	    <li class="editer editer_descriptif' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'descriptif'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="descriptif">' .
		_T('public|spip|ecrire:texte_descriptif_rapide') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('descriptif','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'descriptif')))!=='' ?
				('
		<span class=\'erreur_message\'>' . $t3 . '</span>
		') :
				'') .
		'<textarea name=\'descriptif\' id=\'descriptif\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' rows=\'2\' cols=\'40\'>' .
		table_valeur(@$Pile[0], (string)'descriptif', null) .
		'</textarea>
	    </li>')) :
			'') .
	'
	  	' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_chapeau') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'chapo', null), ''):' '))  ?
			(' ' . (	'
	    ' .
		((match(table_valeur(@$Pile[0], (string)'chapo', null),'^=','Uis'))  ?
				((	'<li class=\'editer_virtuel' .
			((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'virtuel'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'>') . ' ' . (	'
		<label for=\'virtuel\'>' .
			_T('public|spip|ecrire:info_redirection') .
			'<em class="aide">' .
			interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('virtuel','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
			'</em></label>' .
			(($t4 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'virtuel')))!=='' ?
					('
		<span class=\'erreur_message\'>' . $t4 . '</span>
		') :
					'') .
			'<input type=\'text\' class=\'text\' name=\'virtuel\' id=\'virtuel\' value="' .
			replace(table_valeur(@$Pile[0], (string)'chapo', null),'^=','') .
			'" />
		<input type=\'hidden\' name=\'changer_virtuel\' value=\'oui\' />
		<p class=\'explication\'>' .
			_T('public|spip|ecrire:texte_article_virtuel_reference') .
			'</p>
		</li>')) :
				'') .
		'
		' .
		(!(match(table_valeur(@$Pile[0], (string)'chapo', null),'^=','Uis'))  ?
				((	'<li class="editer editer_chapo' .
			((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'chapo'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'">') . ' ' . (	'
			<label for="chapo">' .
			_T('public|spip|ecrire:info_chapeau') .
			'<em class="aide">' .
			interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('chapo','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
			'</em></label>' .
			(($t4 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'chapo')))!=='' ?
					('
			<span class=\'erreur_message\'>' . $t4 . '</span>
			') :
					'') .
			'<textarea name=\'chapo\' id=\'chapo\'' .
			(($t4 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
					(' lang=\'' . $t4 . '\'') :
					'') .
			(($t4 = strval(table_valeur(table_valeur(@$Pile[0], (string)'config', null),'lignes')))!=='' ?
					(' rows=\'' . $t4 . '\'') :
					'') .
			' cols=\'40\'>' .
			table_valeur(@$Pile[0], (string)'chapo', null) .
			'</textarea>
		</li>')) :
				'') .
		'
			')) :
			'') .
	'

		' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_urlref') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'url_site', null), sinon(table_valeur(@$Pile[0], (string)'nom_site', null), '')):' '))  ?
			(' ' . (	'
	  	<li class="editer editer_liens_sites fieldset">
			<fieldset>
				<h3 class="legend">' .
		_T('public|spip|ecrire:entree_liens_sites') .
		'</h3>
				<ul>
				<li class="editer editer_nom_site' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'nom_site'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
					<label for="nom_site">' .
		_T('public|spip|ecrire:info_titre') .
		'</label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'nom_site')))!=='' ?
				('
					<span class=\'erreur_message\'>' . $t3 . '</span>
					') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'nom_site\' id=\'nom_site\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' value="' .
		table_valeur(@$Pile[0], (string)'nom_site', null) .
		'" />
				</li>
				<li class="editer editer_url_site' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'url_site'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
					<label for="url_site">' .
		_T('public|spip|ecrire:info_url') .
		'</label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'url_site')))!=='' ?
				('
					<span class=\'erreur_message\'>' . $t3 . '</span>
					') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'url_site\' id=\'url_site\' value="' .
		table_valeur(@$Pile[0], (string)'url_site', null) .
		'" />
				</li>
				</ul>
			</fieldset>
		</li>')) :
			'') .
	'
	    
	  	' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_texte') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'texte', null), ''):' '))  ?
			(' ' . (	'
	    <li class="editer editer_texte obligatoire' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'texte'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
			<label for="text_area">' .
		_T('public|spip|ecrire:info_texte') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('text_area','../prive/formulaires/editer_article.html', $Pile[0]):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'texte')))!=='' ?
				('
			<span class=\'erreur_message\'>' . $t3 . '</span>
			') :
				'') .
		sinon(table_valeur(@$Pile[0], (string)'_texte_trop_long', null), '') .
		'
				<textarea name=\'texte\' id=\'text_area\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' rows=\'' .
		plus(table_valeur(table_valeur(@$Pile[0], (string)'config', null),'lignes'),'2') .
		'\' cols=\'40\'>' .
		table_valeur(@$Pile[0], (string)'texte', null) .
		'</textarea>
	    </li>')) :
			'') .
	'
	  	' .
	((((table_valeur(table_valeur(@$Pile[0], (string)'config', null),'articles_ps') == 'non') ? sinon(table_valeur(@$Pile[0], (string)'ps', null), ''):' '))  ?
			(' ' . (	'
	    <li class="editer editer_ps' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'ps'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
			<label for="ps">' .
		_T('public|spip|ecrire:info_post_scriptum') .
		'</label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'ps')))!=='' ?
				('
			<span class=\'erreur_message\'>' . $t3 . '</span>
			') :
				'') .
		'<textarea name=\'ps\' id=\'ps\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' rows=\'5\' cols=\'40\'>' .
		table_valeur(@$Pile[0], (string)'ps', null) .
		'</textarea>
	    </li>')) :
			'') .
	'

	  </ul>

	  ' .
	'
	  <!--extra-->
	  <p class=\'boutons\'><input type=\'submit\' name="save" class=\'submit\' value=\'' .
	_T('public|spip|ecrire:bouton_enregistrer') .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_29ed089f0bc45c165915000af257b859', $Cache, $page, '../prive/formulaires/editer_article.html');
}
?>