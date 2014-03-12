<?php
/**
 * Plugin Crowdfunding
 * Copyleft 2014 Jean-Emmanuel Doucet
 * Licence Art Libre
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


function crowdfunding_declarer_tables_interfaces($interfaces) {
	$interfaces['table_des_tables']['crowdfundings'] = 'crowdfundings';
	$interfaces['table_des_tables']['crowdfundings_dons'] = 'crowdfundings_dons';

	return $interfaces;
}

function crowdfunding_declarer_tables_objets_sql($tables) {

	$tables['spip_crowdfundings'] = array(
		'type' => "crowdfunding",
		'principale' => "oui",
		'field'=> array(
			"id_crowdfunding"      => "bigint(21) NOT NULL",
			"titre"              => "text NOT NULL DEFAULT ''",
			"date_debut"         => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"date_echeance"      => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"montant_demande"    => "DECIMAL(18,4) NOT NULL DEFAULT ''",
			"email"							 => "text NOT NULL DEFAULT ''",
			"date_spip"          => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
		),
		'key' => array(
			"PRIMARY KEY" => "id_crowdfunding"
		),
		'titre' => "titre AS titre, '' AS lang",
		'date' => "date_spip",
		'champs_editables'  => array('titre', 'email', 'date_debut', 'date_echeance', 'montant_demande'),
		'champs_versionnes' => array(),
		'rechercher_champs' => array(),
		'tables_jointures'  => array()
	);
	
	$tables['spip_crowdfundings_dons'] = array(
		'type' => "crowdfunding_don",
		'principale' => "oui",
		'field' => array(
			"id_crowdfunding_don" => "bigint(21) NOT NULL",
			"id_crowdfunding" => "bigint(21) NOT NULL default 0",
			"id_transaction" => "bigint(21) NOT NULL default 0",
			"email"              => "text NOT NULL DEFAULT ''",
			"prenom"             => "text NOT NULL DEFAULT ''",
			"nom"                => "text NOT NULL DEFAULT ''",
			"montant_don"        => "DECIMAL(18,4) NOT NULL DEFAULT ''",
			"date_don"               => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"date"          => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'"
		),
		'key' => array(
			"PRIMARY KEY" => "id_crowdfunding_don",
			"KEY id_crowdfunding" => "id_crowdfunding"
		),
		'titre' => "montant_don AS titre, '' AS lang",
		'date' => "date",
		'champs_editables'  => array('id_crowdfunding', 'email', 'prenom', 'nom', 'montant_don', 'date_don'),
		'champs_versionnes' => array(),
		'rechercher_champs' => array(),
		'tables_jointures'  => array()
	);

	return $tables;
}



?>
