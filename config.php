<?php

// Prevent direct access :)
if (!defined($IN_TRACKER)) {
    die();
}

$serverroot = $_SERVER["DOCUMENT_ROOT"];
$siteroot = $serverroot . '/MigraineTracker';

$includepath = $siteroot . '/include';
$stylepath = $siteroot . '/styles';
$dbpath = $siteroot . '/db';

$siteurl = "http://" . $domain . "/" . $siteroot;
$includeurl = "http://" . $domain . "/" . $includepath;
$styleurl = "http://" . $domain . "/" . $stylepath;

$usercookie = 'un_a'; // name of cookie that stores user hash code

$title = "Welcome to Migraine Tracker"; // Default title
?>