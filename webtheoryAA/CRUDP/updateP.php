<?php
$id = $_POST['id']; // Corrected to retrieve the ID from the form
if (!isset($id)) {
    header("location: ./index.html");
}
$id = $_POST['id'];
$Pname = $_POST['pname'];
$PID = $_POST['pid'];
$Pcatagory = $_POST['pcategory'];
$Price = $_POST['pprice'];
$Material = $_POST['pmaterial'];
$Weight = $_POST['pweight'];
$color = $_POST['pcolor'];
$ratings = $_POST['pratings'];

define('dbHostname', 'localhost');
define('dbUserName', 'root');
define('dbPassword', '');
define('dbName', 'webproductform');
$con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
if ($con->connect_error) {
    die("Connection Error: " . $con->connect_error);
}
$qry = "UPDATE productform2 SET
    Name = '" . $Pname . "',
    Product_ID = '" . $PID . "',
    Category = '" . $Pcatagory . "',
    Price = '" . $Price . "',
    Material = '" . $Material . "',
    Weight = '" . $Weight . "',
    Color = '" . $color . "',
    Ratings = '" . $ratings . "'
    WHERE ID = '" . $id . "'"; 
$result = $con->query($qry);
if ($result) {
    header("Location: http://localhost/Athentication/webtheoryAA/records.php");
} else {
 echo "Error : " . $con->error;
}
$con->close();
?>