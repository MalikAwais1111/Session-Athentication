<?php
session_start();
if(!isset($_SESSION['ID'])){
   header("Location: ../selectform.php");
}
 $id = $_GET['ID']; // Retrieve the "ID" parameter from the URL
 if (!isset($id)) {
     header("location: ./index.html");
 }
 
    define('dbhostname','localhost');
    define('dbusername','root');
    define('dbpassword','');
    define('dbname','webproductform');
    $con=new mysqli(dbhostname,dbusername,dbpassword,dbname);
    if($con->connect_error){
        die("Connect Error ".$con->connect_error);
    }
    $qry = "SELECT * FROM productform2 WHERE ID='".$id."'";

    $result = $con->query($qry);
    $row = $result->fetch_assoc();
    if(!isset($row)){
        header("location:./selectP.php");
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
<form action="./updateP.php" method="post">
            <div class="div_margin">
            <input type="hidden" name="id"  value="<?php echo isset($row['ID'])?$row['ID']:'' ?>">
                <label for="pname">Product Name:</label>
                <input type="text" name="pname" id="pname" value="<?php echo isset($row['Name'])?$row['Name']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pid">Product ID:</label>
                <input type="number" name="pid" id="pid" value="<?php echo isset($row['Product_ID'])?$row['Product_ID']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pcetagory">Category:</label>
                <input type="text" name="pcategory" id="pcategory" value="<?php echo isset($row['Category'])?$row['Category']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pprice">Price:</label>
                <input type="number" name="pprice" id="pprice" value="<?php echo isset($row['Price'])?$row['Price']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pmaterial">Material:</label>
                <input type="text" name="pmaterial" id="pmaterial" value="<?php echo isset($row['Material'])?$row['Material']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pweight">Weight:</label>
                <input type="number" name="pweight" id="pweight" value="<?php echo isset($row['Weight'])?$row['Weight']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pcolor">Color:</label>
                <input type="text" name="pcolor" id="pcolor" value="<?php echo isset($row['Color'])?$row['Color']:'' ?>">
            </div>
            <div class="div_margin">
                <label for="pratings">Ratings:</label>
                <input type="decimal" name="pratings" id="pratings" value="<?php echo isset($row['Ratings'])?$row['Ratings']:'' ?>">
            </div>
            <div class="div_margin">
                <input class="desi" type="submit" name="submit" id="submit" value="Save">
            </div>
        </form>
</body>
</html>
