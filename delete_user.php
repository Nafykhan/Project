<?php
include('db.php');

// Check if the ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);

        echo "<script>alert('User deleted successfully!'); window.location.href='users_list.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
