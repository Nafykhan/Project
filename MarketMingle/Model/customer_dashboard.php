<?php
session_start();  // Start session for user authentication

// Include database connection
include('db.php');

$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

// Fetch all products from the database
$stmt = $pdo->prepare("SELECT * FROM products WHERE title LIKE ? OR description LIKE ?");
$stmt->execute(['%' . $searchQuery . '%', '%' . $searchQuery . '%']);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
