<?php
//Database connection
$conn = new mysqli("localhost", "root", "", "choboi_db");

if( $conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
}

//fetch products
$products_id =$_GET['id'];

// chect if the product is already in the cart
$result = $conn->query(SELECT * FROM cart WHERE product_id = $products_id);

if($result->num_rows > 0){
     //update quantity
    $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE product_id = $products_id");
} else {
    $conn->query("INSERT INTO cart (product_id, quantity) VALUES ($products_id, 1)" );
}

header("Location: cart.php");
?>

