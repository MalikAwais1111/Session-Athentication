<?php
    $id = $_GET['id'];
    if(!isset($id)){
        header("location: ./index.php");
    }

define('dbHostname','localhost');
define('dbUsername','root');
define('dbPassword','');
define('dbName','webformStudent');
$con = new mysqli(dbHostname,dbUsername,dbPassword,dbName);


if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM student_for WHERE id='".$id."'";
if ($con->query($sql) === TRUE) {
    header("location: http://localhost/Athentication/webtheoryAA/recordsS.php");
  
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>