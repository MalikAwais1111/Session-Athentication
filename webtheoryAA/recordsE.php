<?php
    session_start();
    if(!isset($_SESSION['ID'])){
       // header("Location: ./checka.php");
       echo '<br><a href="./Elogout.php">Logout</a>';
       echo '<br>';
       
    }
//header("Location: CRUDA/Select.php");
echo '<br><a href="./index.html">Sign-up</a>';
       echo '<br>';
 
?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
</head>
<body>
    <br>
    <?php
    if(isset($_SESSION['ID'])){
      echo"  <a href=' CRUDAE/index.html'>Add New Data</a>";  
    }
    ?>
        <table border>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Employee ID</th>
            <th>CNIC-No</th>
            <th>Email</th>
            <th>Phone-No</th>
            <th>Address</th>
            <th>Status</th>
            <th>Work-location</th>
        </tr>
        <?php
        define('dbHostname', 'localhost');
        define('dbUserName','root');
        define('dbPassword','');
        define('dbName','webformemployes');
        $con=  new mysqli(dbHostname, dbUserName, dbPassword, dbName);
        if ($con->connect_error) {
            die("Connection Error: " . $con->connect_error);
        }
        $qry = "SELECT * FROM employeeform";
        $result = $con->query($qry);

        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>".$row['ID']." </td>
            <td>".$row['Name']." </td>
            <td>".$row['Employee_ID']." </td>
            <td>".$row['CNIC_NO']." </td>
            <td>".$row['Email']." </td>
            <td>".$row['Phone_No']." </td>
            <td>".$row['Address']." </td>
            <td>".$row['Status']." </td>
            <td>".$row['Work_location']." </td>";
            if(isset($_SESSION['ID'])){
            
                echo "<td>
                <a href='CRUDAE/Eedit.php?id=".$row['ID']."'>Edit</a>
            </td>
            <td>
            <a href='CRUDAE/deleteE.php?ID=".$row['ID']."'>Delete</a>
        </td>
                </tr>";
                }
          
        }
        $con->close();

        ?>
    </table>
</body>
</html>
