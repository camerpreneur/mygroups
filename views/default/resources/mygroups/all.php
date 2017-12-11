<?php


$titlebar = "All site groups";

$pagetitle = "List all of Groups";

$body = elgg_list_entities([
    'type' => 'group',
    'subtype' => 'mygroups',
]);

$body = elgg_view_title($titlebar) . elgg_view_layout('one_column', ['content'=> $body]);

echo elgg_view_page($titlebar, $body);

