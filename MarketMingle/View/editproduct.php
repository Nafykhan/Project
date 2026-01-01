<?php
include ('../Model/editproduct.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="editproduct.css">
</head>
<body>

    <!-- Edit Product Section -->
    <a href="logout.php" class="logout-btn">Logout</a>

    <section id="admin-dashboard">
        <div class="dashboard-container">
            <aside id="sidebar">
                <h3>Admin Dashboard</h3>
                <nav class="sidebar-nav">
                    <ul>
                        <li><a href="admin_dashboard.php">Dashboard</a></li>
                        <li><a href="manageproduct.php">Manage Products</a></li>
                        <li><a href="orders_list.php">Manage Orders</a></li> <!-- Link to Orders -->
                        <li><a href="manage_users.php">Manage Users</a></li>
                        <li><a href="manage_payments.php">Manage Payments</a></li> <!-- Added Manage Payments -->
                        <li><a href="settings.php">Settings</a></li>
                    </ul>
                </nav>
            </aside>

    <section id="edit-product">
        <h1>Edit Product</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Product Title" value="<?= $product['title'] ?>" required>
            <input type="text" name="category" placeholder="Product Category" value="<?= $product['category'] ?>" required>
            <input type="number" step="0.01" name="price" placeholder="Price (BDT)" value="<?= $product['price'] ?>" required>
            <input type="number" name="stock" placeholder="Stock Quantity" value="<?= $product['stock'] ?>" required>
            <textarea name="description" placeholder="Description" required><?= $product['description'] ?></textarea>

            <!-- Show existing product image -->
            <div>
                <p>Current Image:</p>
                <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="<?= $product['title'] ?>" width="100" height="100">
            </div>

            <!-- Upload New Image -->
            <input type="file" name="image" accept="image/*">

            <button type="submit">Update Product</button>
        </form>
    </section>

</body>
</html>
