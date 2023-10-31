<?php
    $id = $_GET['ID'];
    if(!isset($id)){
        header("location: ./index.html");
    }

define('dbHostname','localhost');
define('dbUsername','root');
define('dbPassword','');
define('dbName','webproductform');
$con = new mysqli(dbHostname,dbUsername,dbPassword,dbName);


if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// sql to delete a record
$sql = "DELETE FROM productform2 WHERE ID='".$id."'";
if ($con->query($sql) === TRUE) {
     header("location: webtheoryAA/records.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>