<?php

require "paypal.class.php";

$p = new paypal_class;
$p->testing=true;

if ($p->validate_ipn()) {
	if($p->ipn_data['payment_status']=='Completed')
	{
	
		//Charger SPIP (du plugin Transaction, merci à Arnault Pachot, Emmanuel Nurit !)
		if (!defined('_ECRIRE_INC_VERSION')) {
				    // recherche du loader SPIP.
				    $deep = 2;
				    $lanceur ='ecrire/inc_version.php';
				    $include = '../../'.$lanceur;
				    while (!defined('_ECRIRE_INC_VERSION') && $deep++ < 6) { 
				          // attention a pas descendre trop loin tout de meme !
				            // plugins/zone/stable/nom/version/tests/ maximum cherche
				            $include = '../' . $include;
				            if (file_exists($include)) {
				                    chdir(dirname(dirname($include)));
				                    require $lanceur;
				            }
				    }       
		}
		if (!defined('_ECRIRE_INC_VERSION')) {
				    die("<strong>Echec :</strong> SPIP ne peut pas etre demarr&eacute;.<br />
				            Vous utilisez certainement un lien symbolique dans votre r&eacute;pertoire plugins.");
		}
		include_spip('base/abstract_sql');	
		
		
		// On chope les données	
	
		$amount = $p->ipn_data['mc_gross'] - $p->ipn_data['mc_fee'];
		$id_transaction = $p->ipn_data['txn_id'];
		$email = $p->ipn_data['payer_email'];
		$prenom = $p->ipn_data['first_name'];
		$nom = $p->ipn_data['last_name'];
		$id_crowdfunding = $_GET['id_crowdfunding'];
		$date= date("Y-m-d H:i:s");
		
		
		
		// On popule !
		
		 sql_insertq('spip_crowdfundings_dons', array(
		 'id_crowdfunding' => $id_crowdfunding,
		 'montant_don' => $amount,
		 'id_transaction' => $id_transaction,
		 'email' => $email,
		 'prenom' => $prenom,
		 'nom' => $nom,
		 'date_don' => $date,
		 'date' => $nom,
		 ), 'id_transaction=' . $id_transaction);
	
	}
}
?>
