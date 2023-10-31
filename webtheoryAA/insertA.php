<?php
$uname = $_POST['Uname'];
$Upassword = $_POST['Upassword'];
define('dbHostnamae', 'localhost');
    define('dbUserName','root');
    define('dbPassword','');
    define('dbName','RegisterF');
    $con = new mysqli(dbHostnamae,dbUserName,dbPassword,dbName);
    if($con->connect_error){
        die("Connect Error: ".$con->connect_error);
    }
    $qry = 'INSERT INTO ar(UserName,APassword) VALUES ("'.$uname.'","'.$Upassword.'")';
    $result = $con->query($qry);
    if($result){
        echo "Data has been saved successfully.";
    } else {
        echo "Data didn't save";
    }
    $con->close();
?>