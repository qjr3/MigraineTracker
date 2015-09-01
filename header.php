<?php

// Handle Session data
session_start();

// Setup hacker blocking
define($IN_TRACKER);

require_once('init.php'); 

// Handle Cookies
if(isset($_POST['action']))
{
    // action will be the form name for the type of action, mostly likely a hidden input
    $action = htmlspecialchars($_POST['action']);
}

// Handle Form data

// Setup DB data, pull user info or other info based on form selection
$user = new user($db);

// Setup UI elements

// Pass JS data (if needed)

// Present UI

?>
<html>
<head>
    <link rel='stylesheet' type='text/css' href="<?php echo $stylepath; ?>/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo $siteroot; ?>"></script>
    <title><?php echo $title; ?></title>
</head>
<body>