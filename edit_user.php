<?php
include('db.php');

// Check if the ID is provided for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update the user in the database
    try {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
        $stmt->execute([$username, $email, $role, $id]);

        echo "<script>alert('User updated successfully!'); window.location.href='users_list.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Market Mingle</title>
    
    <!-- Link to the edit user CSS -->
    <link rel="stylesheet" href="edit_user.css"> <!-- Correct the path to your CSS file -->
</head>
<body>
    <?php include('includes/header.php'); ?>

    <!-- Edit User Form Section -->
    <div id="edit-user-section">
        <h2>Edit User</h2>
        <form action="edit_user.php?id=<?php echo $id; ?>" method="POST" class="edit-user-form">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="role">Role:</label>
            <select name="role">
                <option value="customer" <?php if($user['role'] == 'customer') echo 'selected'; ?>>Customer</option>
                <option value="seller" <?php if($user['role'] == 'seller') echo 'selected'; ?>>Seller</option>
                <option value="admin" <?php if($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select>

            <button type="submit">Update User</button>
        </form>

        <!-- Cancel Link -->
        <p><a href="users_list.php">Back to User List</a></p>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
