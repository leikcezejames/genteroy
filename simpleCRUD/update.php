<?php
// update.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products SET name = ?, description = ?, price = ?, quantity = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $price, $quantity, $id]);

    header("Location: index.php");
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$product = $stmt->fetch();
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
    Name: <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>
    Description: <textarea name="description"><?php echo htmlspecialchars($product['description']); ?></textarea><br>
    Price: <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br>
    Quantity: <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required><br>
    <button type="submit">Update Product</button>
</form>