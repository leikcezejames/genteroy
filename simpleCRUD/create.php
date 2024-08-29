<?php
// create.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (name, description, price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $price, $quantity]);

    header("Location: index.php");
}
?>

<form method="post">
    Name: <input type="text" name="name" required><br>
    Description: <textarea name="description"></textarea><br>
    Price: <input type="text" name="price" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    <button type="submit">Add Product</button>
</form>