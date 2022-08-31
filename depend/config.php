<?php
    //Database login stuff
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mondex";

    $db = new mysqli($serverName, $username, $password, $dbname);

    //Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } else {
        //echo "Connected successfully! ";
    }
?>