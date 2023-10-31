<?php
session_start();
if(!isset($_SESSION['ID'])){
   header("Location: ../selectform.php");
}
$id = $_GET['id']; 
if (!isset($id)) {
    header("location: ./selectE.php");
}
    define('dbhostname','localhost');
    define('dbusername','root');
    define('dbpassword','');
    define('dbname','webformemployes');
    $con=new mysqli(dbhostname,dbusername,dbpassword,dbname);
    if($con->connect_error){
        die("Connect Error ".$con->connect_error);
    }
    $qry = "SELECT * FROM employeeform WHERE ID='".$id."'";

    $result = $con->query($qry);
    $row = $result->fetch_assoc();
    if(!isset($row)){
        header("location:./selectE.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <form action="./updateE.php" method="post">
                <div class="div_margin">
                <input type="hidden" name="id" value="<?php echo isset($row['ID'])?$row['ID']:'' ?>">
                    <label for="ename">Name:</label>
                    <input type="text" name="ename" id="ename" value="<?php echo isset($row['Name'])?$row['Name']:'' ?>">
                </div>
                <div class="div_margin">	Name
                    <label for="eid">Employee ID:</label>
                    <input type="number" name="eid" id="eid" value="<?php echo isset($row['Employee_ID'])?$row['Employee_ID']:'' ?>">
                </div>
                <div class="div_margin">
                    <label for="ecnic">CNIC No:</label>
                    <input type="number" name="ecnic" id="ecnic" value="<?php echo isset($row['CNIC_NO'])?$row['CNIC_NO']:'' ?>">
                </div>CNIC_NO
                <div class="div_margin">
                    <label for="eemail">Email:</label>
                    <input type="email" name="eemail" id="eemail" value="<?php echo isset($row['Email'])?$row['Email']:'' ?>">
                </div>
                <div class="div_margin">
                    <label for="ephone">Phone No:</label>Employee_ID
                    <input type="tel" name="ephone" id="ephone" value="<?php echo isset($row['Phone_No'])?$row['Phone_No']:'' ?>">
                </div>
                <div class="div_margin">
                    <label for="eaddress">Address:</label>
                    <input type="text" name="eaddress" id="eaddress" value="<?php echo isset($row['Address'])?$row['Address']:'' ?>">
                </div>
                <div class="div_margin">
                    <label for="estatus">Employee Status:</label>
                    <input placeholder="Part-time/Full-time" type="text" name="estatus" id="estatus" value="<?php echo isset($row['Status'])?$row['Status']:'' ?>">
                </div>
                <div class="div_margin">
                    <label for="ework_location">Work loccation:</label>
                    <input type="text" name="ework_location" id="ework_location" value="<?php echo isset($row['Work_location'])?$row['Work_location']:'' ?>">
                </div>      
                <div class="div_margin">
                    <input class="desi" type="submit" name="submit" id="submit" value="Save" >
                </div>     
    </form>
</body>
</html>
