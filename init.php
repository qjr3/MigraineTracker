<?php

// Prevent direct access :)
if (!defined($IN_TRACKER)) {
    die();
}

// Use associatve array for config options....later

if(!@include_once('config.php'))
{
    // No config file yet....create one?
        
}

if(!@include_once('db.php'))
{
    // No db setup yet.....
}

// Makes loading classes as easy as $var = new ClassName();
function __autoload($name)
{
    include( $siteroot . '/' . $name . '.php' );
}

?>
