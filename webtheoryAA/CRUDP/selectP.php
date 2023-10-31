<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="CRUDP/index.html">Add New Data</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Product-ID</th>
            <th>Catagory</th>
            <th>Price</th>
            <th>Material</th>
            <th>Weight</th>
            <th>Color</th>
            <th>Ratings</th>
            <th>Picture-path</th>
        </tr>
        <?php
        define('dbHostname', 'localhost');
        define('dbUserName','root');
        define('dbPassword','');
        define('dbName','webproductform');
        $con = new mysqli(dbHostname, dbUserName, dbPassword, dbName);
        if ($con->connect_error) {
            die("Connection Error: " . $con->connect_error);
        }
        $qry = "SELECT * FROM productform2";
        $result = $con->query($qry);

        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>".$row['ID']." </td>
            <td>".$row['Name']." </td>
            <td>".$row['Product_ID']." </td>
            <td>".$row['Category']." </td>
            <td>".$row['Price']." </td>
            <td>".$row['Material']." </td>
            <td>".$row['Weight']." </td>
            <td>".$row['Color']." </td>
            <td>".$row['Ratings']." </td>
            <td>".$row['picture_path']." </td>
            <td>
            <a href='./editP.php?ID=".$row['ID']."'>Edit</a>
        </td>
        <td>
        <a href='./deletep.php?ID=".$row['ID']."'>Delete</a>
    </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
