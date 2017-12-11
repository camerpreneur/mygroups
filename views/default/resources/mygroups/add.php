<?php

gatekeeper();

$title = "Create a new groups";

$content = elgg_view_title($title);

$content .= elgg_view_form("mygroups/save");

$sidebar = "";

$body = elgg_view_layout("one_sidebar", [
    'content' => $content,
    'sidebar' => $sidebar,
]);

echo elgg_view_page($title, $body);
