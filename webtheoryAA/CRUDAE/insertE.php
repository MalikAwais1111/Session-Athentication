<?php
$Ename = $_POST['ename'];
$Eid = $_POST['eid'];
$Ecnic = $_POST['ecnic'];
$Email = $_POST['eemail'];
$Ephone = $_POST['ephone'];
$Eaddress = $_POST['eaddress'];
$Estatus = $_POST['estatus'];
$Elocation = $_POST['ework_location'];

define('dbHostname', 'localhost');
define('dbUserName','root');
define('dbPassword','');
define('dbName','webformemployes');
$con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
if ($con->connect_error) {
    die("Connection Error: " . $con->connect_error);
}
$qry = "INSERT INTO employeeform (`Name`, `Employee_ID`, `CNIC_No`, `Email`, `Phone_No`, `Address`, `Status`, `Work_location`) VALUES ('$Ename', '$Eid', '$Ecnic', '$Email', '$Ephone', '$Eaddress', '$Estatus', '$Elocation')";
$result = $con->query($qry);
if($result){
    header("Location:./selectE.php");
}
else {
    echo "Data Not Inserted";
}
$con->close();
?>