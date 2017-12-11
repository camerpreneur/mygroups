<?php

$guid = elgg_extract("guid", $vars);

$mygroups = get_entity($guid);

$content = elgg_view_entity($mygroups, ['full_view' => true ]);

$params = [
    'title' => $mygroups->title,
    'content' => $content,
    'filter' => '',
];

$body = elgg_view_layout('content', $params);

echo elgg_view_page($mygroups->title, $body);


