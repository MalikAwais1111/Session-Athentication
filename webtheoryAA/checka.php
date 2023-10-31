<?php
session_start();
    if(isset($_SESSION['ID'])){
        header("Location: ./records.php");
    }
?>

<?php
    if(isset($_POST['Usubmit'])){
        $Uname = $_POST['uname'];
        $Apassword = $_POST['Upassword'];
        require_once("./db.config.php");
        $qry = "SELECT * FROM ar WHERE 	UserName='".$Uname."' AND APassword='".$Apassword."'";
        $result = $con->query($qry);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
            // session_start();
            $_SESSION['ID']=$row['ID'];
            $_SESSION['UserName'] = $row['UserName'];
            header("Location: ./selectform.php");
        } else {
            header("Location: ./index.html");
        }
        $con->close();
    } 
?>