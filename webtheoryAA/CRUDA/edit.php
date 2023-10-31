<?php
session_start();
if(!isset($_SESSION['ID'])){
   header("Location: ../selectform.php");
}
    $id = $_GET['ID'];
    if(!isset($id)){
        header("location: ./Select.php");
    }

    define('dbhostname','localhost');
    define('dbusername','root');
    define('dbpassword','');
    define('dbname','webformStudent');
    $con=new mysqli(dbhostname,dbusername,dbpassword,dbname);
    if($con->connect_error){
        die("Connect Error ".$con->connect_error);
    }
    $qry = "SELECT * FROM Student_for WHERE id='".$id."'";

    $result = $con->query($qry);
    $row = $result->fetch_assoc();
    if(!isset($row)){
        header("location:./Select.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="./update.php" method="post">
        <div class="div_margin">
        <input type="hidden" name="id" value="<?php echo isset($row['id'])?$row['id']:'' ?>">
            <label for="sname">Name:</label>
            <input type="text" name="sname" id="sname" value="<?php echo isset($row['SName'])?$row['SName']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="sroll_no">Roll-No:</label>
            <input type="number" name="sroll_no" id="sroll_no" value="<?php echo isset($row['Roll_No'])?$row['Roll_No']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="smail">Email:</label>
            <input type="email" name="smail" id="smail" value="<?php echo isset($row['Email'])?$row['Email']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="sphone">Phone No:</label>
            <input type="tel" name="sphone" id="sphone" value="<?php echo isset($row['Phone_No'])?$row['Phone_No']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="saddress">Address:</label>
            <input type="text" name="saddress" id="saddress" value="<?php echo isset($row['SAddress'])?$row['SAddress']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="sdepartment">Department:</label>
            <input type="text" name="sdepartment" id="sdepartment" value="<?php echo isset($row['Department'])?$row['Department']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="ssemester">Semester:</label>
            <input type="number" name="ssemester" id="ssemester" value="<?php echo isset($row['Semester'])?$row['Semester']:'' ?>">
        </div>
        <div class="div_margin">
            <label for="ssection">Section:</label>
            <input type="text" name="ssection" id="ssection" value="<?php echo isset($row['Section'])?$row['Section']:'' ?>">
        </div>
        <div class="div_margin">
            <input  class="desi" type="submit" name="submit" id="submit" value="Save">
        </div>
    </form>
</body>
</html>
