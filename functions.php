<?php 

function restrictions__for_site_owner(){

	if(!get_option('wpc_roles_created')){
		$site_owner_caps = get_role('administrator')->capabilities;
		$owner_restrictions = [
		// 'switch_themes' => 1,
		'activate_plugins'=>1,
		'install_plugins'=>1,
		'update_plugins'=>1,
		'delete_plugins'=>1,
		];

		$site_owner_caps = array_diff_key($site_owner_caps, $owner_restrictions);
		add_role('site_owner', 'Site Owner', $site_owner_caps);
		update_option('wpc_roles_created', true);
	}
	
};
add_action('after_setup_theme','restrictions__for_site_owner');