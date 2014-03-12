<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/actions');
include_spip('inc/editer');


function formulaires_editer_crowdfunding_don_charger_dist($id_crowdfunding_don='new', $id_rubrique=0, $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden='',$id_crowdfunding){
	$valeurs = formulaires_editer_objet_charger('crowdfunding_don',$id_crowdfunding_don,$id_rubrique,$lier_trad,$retour,$config_fonc,$row,$hidden);
	$valeurs['id_crowdfunding']= _request('id_crowdfunding');
	return $valeurs;
}

/**
 * Identifier le formulaire en faisant abstraction des parametres qui ne representent pas l'objet edite
 */
function formulaires_editer_crowdfunding_don_identifier_dist($id_crowdfunding_don='new', $id_rubrique=0, $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return serialize(array(intval($id_crowdfunding_don)));
}

function formulaires_editer_crowdfunding_don_verifier_dist($id_crowdfunding_don='new', $id_rubrique=0, $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return formulaires_editer_objet_verifier('crowdfunding_don', $id_crowdfunding_don);
}

function formulaires_editer_crowdfunding_don_traiter_dist($id_crowdfunding_don='new', $id_rubrique=0, $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return formulaires_editer_objet_traiter('crowdfunding_don',$id_crowdfunding_don,$id_rubrique,$lier_trad,$retour,$config_fonc,$row,$hidden);
}


?>
