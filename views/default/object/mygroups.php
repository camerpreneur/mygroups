<?php

$full = elgg_extract("full_view", $vars, FALSE);


if($full_view){
    echo elgg_view('output/plaintext', ['value' => $vars['entity']->description]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->progress]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->sectorindustry]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->activity]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->markettype]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->typemark]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->offertype]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->turnover]);
    echo elgg_view('output/dropdown', ['text' => $vars['entity']->currency]);
    echo elgg_view('output/tags', ['tags' => $vars['entity']->location]);
    echo elgg_view('output/url', ['href' => $vars['entity']->projectwebsite]);
    echo elgg_view('output/url', ['href' => $vars['entity']->projectblog]);
    echo elgg_view('output/url', ['href' => $vars['entity']->projectpitch]);
      
}else {
    
    echo elgg_view_title(
        elgg_view('output/url', array(
            'href' => $vars['entity']->getURL(),
            'text' => $vars['entity']->name,
            'is_trusted' => true
    )));  
}




