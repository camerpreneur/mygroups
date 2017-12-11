<?php

$title = get_input("title");
$description = get_input("description");
$progress = get_input("progress");
$sectorindustry = get_input("sectorindustry");
$activity = get_input("activity");
$markettype = get_input("markettype");
$typemark = get_input("typemark");
$offertype = get_input("offertype");
$turnover  = get_input("turnover");
$currency = get_input("currency");
$location = get_input("location");
$projectwebsite = get_input("projectwebsite");
$projectblog = get_input("projectblog");
$projectpitch = get_input("projectpitch");


$mygroups = new ElggGroup();


$mygroups->name = $title;
$mygroups->description = $description;
$mygroups->progress = $progress;
$mygroups->sectorindustry = $sectorindustry;
$mygroups->activity = $activity;
$mygroups->markettype = $markettype;
$mygroups->typemark = $typemark;
$mygroups->offertype = $offertype;
$mygroups->turnover = $turnover;
$mygroups->currency = $currency;
$mygroups->tags = $location;
$mygroups->projectwebsite = $projectwebsite;
$mygroups->projectblog = $projectblog;
$mygroups->projectpitch = $projectpitch;

$mygroups->subtype = "mygroups";

$mygroups->access_id = ACCESS_PUBLIC;

$mygroups->owner_guid = elgg_get_logged_in_user_guid();

$mygroups_guid = $mygroups->save();


if($mygroups_guid){
    
    system_message("Your new  groups was save");
    
    forward($mygroups->getURL());
}else{
    
    register_error("New groups could not be saved");
    forward(REFERER);
}





