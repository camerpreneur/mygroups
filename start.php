<?php

require_once __DIR__ . '/lib/functions.php';

elgg_register_event_handler('init', 'system', 'mygroups_init');

elgg_register_event_handler('init', 'system', 'mygroups_fields_setup', 10000);

function mygroups_init(){
    
    $action_base = __DIR__ . '/actions/mygroups';
    elgg_register_action("mygroups/save", "$action_base/save.php");
    
    elgg_register_page_handler('mygroups', 'mygroups_page_handler');
    
    elgg_register_plugin_hook_handler('entity:url', 'group', 'mygroups_set_url');
}

function mygroups_fields_setup() {

	$profile_defaults = [
		'description' => 'longtext',
		'progress' => 'text',
		'activity' => 'text',
		'markettype' => 'text',
		'typemark' => 'text',
		'offertype' => 'text',
		'turnover' => 'text',
		'currency' => 'text',
		'location' => 'location',
		'projectwebsite' => 'url',
		'projectblog' => 'url',
		'projectpitch' => 'url',
	];

	$profile_defaults = elgg_trigger_plugin_hook('profile:fields', 'mygroups', NULL, $profile_defaults);

	elgg_set_config('mygroups', $profile_defaults);

	// register any tag metadata names
	foreach ($profile_defaults as $name => $type) {
		if ($type == 'tags') {
			elgg_register_tag_metadata_name($name);

			// only shows up in search but why not just set this in en.php as doing it here
			// means you cannot override it in a plugin
			add_translation(get_current_language(), array("tag_names:$name" => elgg_echo("groups:$name")));
		}
	}
}


function mygroups_set_url($hook,$type,$url,$params){
    
    $entity = $params['entity'];
    
    if(elgg_instanceof($entity, 'group', 'mygroups')){
        
        return "mygroups/view/{$entity->guid}";
    }
}


function mygroups_page_handler($segments) {
    switch ($segments[0]) {
        case 'add':
           echo elgg_view_resource('mygroups/add');
           break;

        case 'view':
            $resource_vars['guid'] = elgg_extract(1, $segments);
            echo elgg_view_resource('mygroups/view', $resource_vars);
            break;

        case 'all':
        default:
           echo elgg_view_resource('mygroups/all');
           break;
    }

    return true;
}