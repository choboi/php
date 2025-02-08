<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "choboi_db";

// Create a connection
$conn = new mysqli("127.0.0.1", "root", "", "choboi_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4 (to support special characters)
$conn->set_charset("utf8mb4");

// Fetch products securely
$query = "SELECT id, name, descriptions, price, image FROM products";
$result = $conn->query($query);

// Check if query execution was successful
if (!$result) {
    die("Error fetching products: " . $conn->error);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE SYSTEM</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .product { border: 1px solid #ddd; padding: 10px; width: 250px; text-align: center; }
        .product img { width: 100%; height: auto; }
        .product h2 { font-size: 20px; }
        .product p { font-size: 16px; }
        .product a { display: block; margin-top: 10px; background: #007bff; color: white; text-decoration: none; padding: 8px; border-radius: 5px; }
        .product a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <center>
        <h1 style="font-size: 30px;">Product List</h1>
    </center>

    <div class="product-container">
        <?php
        // Sample database connection (replace with your actual DB credentials)
        $conn = new mysqli("localhost", "username", "password", "ecommerce_db");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch products from the database
        $query = "SELECT id, name, descriptions, price, image FROM products";
        $result = $conn->query($query);

        // Check if there are products
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="product">
                    <img src="<?php echo $row['image']; ?>" alt="Product Image">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p><?php echo htmlspecialchars($row['descriptions']); ?></p>
                    <p><strong>Price: $<?php echo number_format($row['price'], 2); ?></strong></p>
                    <a href="add_to_cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
                </div>
            <?php }
        } else {
            echo "<p>No products available.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
