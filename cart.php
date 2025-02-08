<?php
//Database connection
$conn = new mysqli("localhost", "root", "", "choboi_db");

if( $conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
}

//fetch products
$result = $conn->query("SELECT * FROM products");
?>