<?php
$Pname = $_POST['pname'];
$PID = $_POST['pid'];
$Pcatagory = $_POST['pcategory'];
$Price = $_POST['pprice'];
$Material = $_POST['pmaterial'];
$Weight = $_POST['pweight'];
$color = $_POST['pcolor'];
$ratings = $_POST['pratings'];

// Check if 'picture' is set in the form
if (isset($_FILES["picture"])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        // File uploaded successfully
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Picture not provided in the form.";
}

define('dbHostname', 'localhost');
define('dbUserName','root');
define('dbPassword','');
define('dbName','webproductform');
$con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
if ($con->connect_error) {
    die("Connection Error: " . $con->connect_error);
}
// Fix the SQL query, remove single quotes around 'picture_path'
$qry = "INSERT INTO productform2 (`Name`, `Product_ID`, `Category`, `Price`, `Material`, `Weight`, `Color`, `Ratings`, `picture_path`) VALUES ('$Pname', '$PID', '$Pcatagory', '$Price', '$Material', '$Weight', '$color', '$ratings', '$target_file')";
$result = $con->query($qry);
if ($result) {
   header("Location: ./selectP.php");
} else {
    echo "Data Not Inserted: " . $con->error;
}
$con->close();
?>
