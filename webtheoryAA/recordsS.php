<?php
    session_start();
    if(!isset($_SESSION['ID'])){
       // header("Location: ./checka.php");
       echo '<br><a href="./Slogout.php">Logout</a>';
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
    <title>Document</title>
</head>
<body>
    <br>
    
    <?php
    if(isset($_SESSION['ID'])){
      echo"  <a href=' CRUDA/index.html'>Add New Data</a>";  
    }
    ?>
    
    <table border>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll-No</th>
            <th>Email</th>
            <th>Phone-No</th>
            <th>Address</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Section</th>
        </tr>
        <?php
        define('dbHostname', 'localhost');
        define('dbUserName','root');
        define('dbPassword','');
        define('dbName','webformStudent');
        $con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
        if ($con->connect_error) {
            die("Connection Error: " . $con->connect_error);
        }
        $qry = "SELECT id, SName, `Roll_No` as RollNo, Email, `Phone_No` as PhoneNo, SAddress, Department, Semester, Section FROM Student_for";
        $result = $con->query($qry);

        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>".$row['id']." </td>
            <td>".$row['SName']." </td>
            <td>".$row['RollNo']." </td>
            <td>".$row['Email']." </td>
            <td>".$row['PhoneNo']." </td>
            <td>".$row['SAddress']." </td>
            <td>".$row['Department']." </td>
            <td>".$row['Semester']." </td>
            <td>".$row['Section']." </td>
            <td>";
            if(isset($_SESSION['ID'])){
            
                echo  "<a href='CRUDA/edit.php?ID=".$row['id']."'>Edit</a>
                </td>
                <td>
                <a href='CRUDA/delete.php?id=".$row['id']."'>Delete</a>
            </td>
                    </tr>";
                }
         
        }
        ?>
    </table>
</body>
</html>
