<?php
$sname = $_POST['sname'];
$srollno = $_POST['sroll_no'];
$semail = $_POST['smail'];
$sphone = $_POST['sphone'];
$saddress = $_POST['saddress'];
$sdepartment = $_POST['sdepartment'];
$ssemester = $_POST['ssemester'];
$ssection = $_POST['ssection'];

define('dbHostname', 'localhost');
define('dbUserName','root');
define('dbPassword','');
define('dbName','webformStudent');
$con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
if ($con->connect_error) {
    die("Connection Error: " . $con->connect_error);
}
$qry = "INSERT INTO Student_for (`SName`, `Roll_No`, `Email`, `Phone_No`, `SAddress`, `Department`, `Semester`, `Section`) VALUES ('$sname', '$srollno', '$semail', '$sphone', '$saddress', '$sdepartment', '$ssemester', '$ssection')";
$result = $con->query($qry);
if($result){
   header("Location:./Select.php");
}
else {
    echo "Data Not Inserted";
}
$con->close();
?>