<?php
    define('dbHostnamae', 'localhost');
    define('dbUserName','root');
    define('dbPassword','');
    define('dbName','RegisterF');
    $con = new mysqli(dbHostnamae,dbUserName,dbPassword,dbName);
    if($con->connect_error){
        die("Connect Error: ".$con->connect_error);
    }
?>