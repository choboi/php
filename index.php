<?php
//Database connection
$conn = new mysqli("localhost", "root", "", "choboi_db");

if( $conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
}

//fetch products
$result = $conn->query("SELECT * FROM products");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE SYSTEM</title>
</head>
<body>
    <center>
    <h1 style="font-size: 30; ">Product list</h1>
    </center>

<div>
     <?php while ($row = $result->fetch_assoc()) { ?>

    <div>
        <img src="" width="" hight="" alt="">
        <h2><?php echo $row ['name']; ?></h2>
        <p><?php echo $row ['descriptions']; ?></p>
        <p><?php echo $row ['price']; ?></p>
    </div>
    <?php } ?>
    </div>
</body>
</html>