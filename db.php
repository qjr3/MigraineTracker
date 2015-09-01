<?php

// Prevent direct access :)
if (!defined($IN_TRACKER)) {
    die();
}

$usertable = "users";

$dbserver = "sql5.freemysqlhosting.net";
$dbuser = "sql588679";
$dbpass = "bZ2*qX2%";
$dbname = "sql588679";

// Access phpMyAdmin here : http://www.phpmyadmin.co/ and use the same info to connect to DB

try{
    $dbh = new PDO('mysql:host='.$dbserver.';dbname='.$dbname, $ebuser, $dbpass);
} catch(PDOException $e) {
    print "Failed to connect to Database. Please try again.";
    session_abort(); // No DB, clear the session and run like hell....
    die();
}

$sql = "SELECT uid, name, password "
        . "FROM " . $usertable
        . "WHERE name = :user_name AND password = PASSWORD( :password )";

$getuser = $dbh->prepare($sql);

$sql = "INSERT INTO " . $usertable
        . "(username, userpassword) "
        . "( :username, PASSWORD( :password ))";

$adduser = $dbh->prepare($sql);
        
?>