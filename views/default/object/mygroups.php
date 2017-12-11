<?php

$full = elgg_extract("full_view", $vars, FALSE);
$mygroups = elgg_extract('entity', $vars, FALSE);

if($full){
    echo elgg_view('output/plaintext', ['value' => $mygroups->description]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->progress]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->sectorindustry]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->activity]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->markettype]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->typemark]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->offertype]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->turnover]);
    echo elgg_view('output/dropdown', ['text' => $mygroups->currency]);
    echo elgg_view('output/tags', ['tags' => $mygroups->location]);
    echo elgg_view('output/url', ['href' => $mygroups->projectwebsite]);
    echo elgg_view('output/url', ['href' => $mygroups->projectblog]);
    echo elgg_view('output/url', ['href' => $mygroups->projectpitch]);
      
}else {
    
    echo elgg_view_title(
        elgg_view('output/url', array(
            'href' => $mygroups->getURL(),
            'text' => $mygroups->name,
            'is_trusted' => true
    )));  
}




