<?php
// index.php
require 'db.php';

$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll();
?>
<a href="create.php">Add New Product</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['id']); ?></td>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
            <td>
                <a href="update.php?id=<?php echo $product['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
            <td><?php echo htmlspecialchars($product['created_at']); ?></td>
            <td><?php echo htmlspecialchars($product['updated_at']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>