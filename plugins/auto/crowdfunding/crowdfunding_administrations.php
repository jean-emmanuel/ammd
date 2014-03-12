<?php
if (!defined('_ECRIRE_INC_VERSION')) return;

  function crowdfunding_upgrade($nom_meta_base_version, $version_cible){
   
  $maj = array();
  $maj['create'] = array(
  array('maj_tables', array('spip_crowdfundings','spip_crowdfundings_dons')),
  );
   
  include_spip('base/upgrade');
  maj_plugin($nom_meta_base_version, $version_cible, $maj);
  }
   
  function crowdfunding_vider_tables($nom_meta_base_version) {
  sql_drop_table("spip_crowdfundings");
	sql_drop_table("spip_crowdfundings_dons");

  effacer_meta($nom_meta_base_version);
  }
?>
