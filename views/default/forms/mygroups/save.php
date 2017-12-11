<?php


$progress = project_get_progress();
$currency = project_get_currency();
$industry = project_get_industrysector();

// title
echo elgg_view_field([
    '#type' => 'text',
    '#label' => elgg_echo('camerproject:title'),
    'name' => 'title',
    'value' => elgg_extract('title', $vars),
    'required' => true,
]);

// icon
// Get post_max_size and upload_max_filesize
$post_max_size = elgg_get_ini_setting_in_bytes('post_max_size');
$upload_max_filesize = elgg_get_ini_setting_in_bytes('upload_max_filesize');

// Determine the correct value
$upload_limit = $upload_max_filesize > $post_max_size ? $post_max_size : $upload_max_filesize;
$upload_limit = elgg_format_bytes($upload_limit);

echo elgg_view_field([
  '#type' => 'file',
  '#label' => elgg_echo('camerproject:logoproject'),
  '#help' => elgg_echo('camerproject:edit:icon:limit', [$upload_limit]),
  'name' => 'icon',
  'value' => elgg_extract('icon', $vars),
 // 'required' => true,
]);
 
echo elgg_view_field([
    '#type' => 'plaintext',
    '#label' => elgg_echo('camerproject:summery'),
    'name' => 'description',
    'value' => elgg_extract('description', $vars),
    'required' => true,
]);


echo elgg_view_field([
    '#type' => 'dropdown',
    '#label' => elgg_echo('camerproject:progress'),
    'name' => 'progress',
    'options_values' => $progress,
    'value' => elgg_extract('progress', $vars),
    'required' => true,
 ]);


echo elgg_view_field([
   '#type' => 'dropdown',
   '#label' => elgg_echo('camerproject:industry'),
   'name' => 'sectorindustry',
   'options_values' => $industry,
   'value' => elgg_extract('sectorindustry', $vars),
   'required' => true,
  ]);


echo elgg_view_field([
   '#type' => 'dropdown',
   '#label' => elgg_echo('camerproject:activity'),      
   'name' => 'activity',
   'value' => elgg_extract('activity', $vars),
   'options_values' => [
       'dvpdurable' => elgg_echo('camerproject:activity:dvpdurable'),
       'ecosociale' => elgg_echo('camerproject:activity:ecosociale'),
       'ong' => elgg_echo('camerproject:activity:ong'),
       'sanspreference' => elgg_echo('camerproject:activity:sanspreference'),
   ]
 ]);

echo elgg_view_field([
    '#type' => 'dropdown',
    '#label' => elgg_echo('camerproject:markettype'),
    'name' => 'markettype',
    'value' => elgg_extract('markettype', $vars),
    'required' => true,
    'options_values' => [
        'clientsentreprise' => elgg_echo('camerproject:markettype:cliententreprise'),
        'clientparticulier' => elgg_echo('camerproject:markettype:clientparticulier'),
    ]

]);
 
echo elgg_view_field([
    '#type' => 'dropdown',
    'name' => 'typemark',
    'value' => elgg_extract('typemark', $vars),
    'required' => true,
    'options_values' => [
        'local' => elgg_echo('camerproject:typermark:local'),
        'afrique' => elgg_echo('camerproject:typermark:afrique'),
        'europe' => elgg_echo('camerproject:typermark:europe'),
        'international' => elgg_echo('camerproject:typermark:international'),
        'amerique' => elgg_echo('camerproject:typermark:amerique'),
        'asie'  => elgg_echo('camerproject:typermark:asie'),
        'moyenorient' => elgg_echo('camerproject:typermark:moyenorient'),
    ],
]);
 

echo elgg_view_field([
     '#type' => 'dropdown',
     '#label' => elgg_echo('camerproject:offertype'),
     'name' => 'offertype',
     'value' => elgg_extract('offertype', $vars),
     'options_values' => [
         'produits' => elgg_echo("camerproject:offertype:produits"),
         'services' => elgg_echo("camerproject:offertype:services"),
     ],
     'required' => true, 
 ]);

echo elgg_view_field([
     '#type' => 'dropdown',
     '#label' => elgg_echo('camerproject:turnover'),
     'name' => 'turnover',
     'value' => elgg_extract('turnover', $vars),
     'required' => true,
     'options_values' => [
         'inf2millions' => elgg_echo('camerproject:turnover:inf2millions'),
         'entre2et5millions' => elgg_echo('camerproject:turnover:entre2et5millions'),
         'audelade5millions' => elgg_echo('camerproject:turnover:audelade5millions'),
     ],
 ]);

echo elgg_view_field([
     '#type' => 'dropdown',
     'name' => 'currency',
     'options_values' => $currency,
     'value' => elgg_extract('currency', $vars),
     'required' => true,
 ]);

echo elgg_view_field([
    '#type' => 'tags',
    '#label' => elgg_echo('camerproject:location'),
    'name' => 'location',
    'value' => elgg_extract('location', $vars),
    'required' => true,
]);

echo elgg_view_field([
    '#type' => 'url',
    '#label' => elgg_echo('camerproject:projectwebsite'),
    'name' => 'projectwebsite',
    'value' => elgg_extract('projectwebsite', $vars),
  
]);

echo elgg_view_field([
    '#type' => 'url',
    '#label' => elgg_echo('camerproject:projectblog'),
    'name' => 'projectblog',
    'value' => elgg_extract('projectblog', $vars),
 
]);

echo elgg_view_field([
    '#type' => 'url',
    '#label' => elgg_echo('camerproject:projectpitch'),
    'name' => 'projectpitch',
    'value' => elgg_extract('projectpitch', $vars),
  
]);

$submit = elgg_view_field(array(
    '#type' => 'submit',
    '#class' => 'elgg-foot',
    'value' => elgg_echo('save'),
));
elgg_set_form_footer($submit);