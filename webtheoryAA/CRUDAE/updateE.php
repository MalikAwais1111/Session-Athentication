<?php
 $id = $_POST['id']; // Correctly retrieves the "id" parameter from the URL
 if (!isset($id)) {
     header("location: ./index.html");
 }
$id = $_POST['id'];
$Ename = $_POST['ename'];
$EID = $_POST['eid'];
$Ecnic = $_POST['ecnic'];
$Eemail = $_POST['eemail'];
$Ephone = $_POST['ephone'];
$Eaddress = $_POST['eaddress'];
$Estatus = $_POST['estatus'];
$Ework_loc = $_POST['ework_location'];

define('dbHostname', 'localhost');
define('dbUserName','root');
define('dbPassword','');
define('dbName','webformemployes');
$con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
if ($con->connect_error) {
    die("Connection Error: " .$con->connect_error);
}
$qry = "UPDATE employeeform SET
Name = '".$Ename."',
Employee_ID = '".$EID."',
CNIC_NO = '".$Ecnic."',
Email = '".$Eemail."',
Phone_No= '".$Ephone."',
Address = '".$Eaddress."',
Status = '".$Estatus."',
Work_location= '".$Ework_loc."'
WHERE ID = '" . $id . "'"; // Corrected the field name in the WHERE clause
$result = $con->query($qry);
if($result)
{
    header("Location:http://localhost/Athentication/webtheoryAA/recordsE.php");
}
else{
    echo "Data not updated";
}
?>