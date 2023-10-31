<?php
 $id = $_POST['id']; // Correctly retrieves the "id" parameter from the URL
 if (!isset($id)) {
     header("location: ./index.html");
 }
$id = $_POST['id'];
$sname = $_POST['sname'];
$srollno = $_POST['sroll_no'];
$email = $_POST['smail'];
$sphone = $_POST['sphone'];
$saddress = $_POST['saddress'];
$sdepartment = $_POST['sdepartment'];
$semester = $_POST['ssemester'];
$section = $_POST['ssection'];
define('dbHostname', 'localhost');
define('dbUserName','root');
define('dbPassword','');
define('dbName','webformStudent');
$con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
if ($con->connect_error) {
    die("Connection Error: " .$con->connect_error);
}
$qry = "UPDATE student_for SET
SName = '".$sname."',
Roll_No = '".$srollno."',
Email = '".$email."',
Phone_No = '".$sphone."',
SAddress= '".$saddress."',
Department= '".$sdepartment."',
Semester	= '".$semester."',
Section= '".$section."'
WHERE id = '" . $id . "'"; // Corrected the field name in the WHERE clause
$result = $con->query($qry);
if($result)
{
    header("Location:http://localhost/Athentication/webtheoryAA/recordsS.php");
}
else{
    echo "Data not updated";
}
?>