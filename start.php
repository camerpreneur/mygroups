<?php

elgg_register_event_handler('init', 'system', 'mygroups_init');

function mygroups_init(){
    
    $action_base = __DIR__ . '/actions/mygroups';
    elgg_register_action("mygroups/save", "$action_base/save.php");
    
    elgg_register_page_handler('mygroups', 'mygroups_page_handler');
    
    elgg_register_plugin_hook_handler('entity:url', 'group', 'mygroups_set_url');
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