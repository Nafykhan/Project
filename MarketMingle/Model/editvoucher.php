<?php
include "db.php";
session_start();

// Check if the voucher ID is provided
if (isset($_GET['id'])) {
    $voucher_id = intval($_GET['id']); // Sanitize input

    // Fetch the voucher details using PDO
    $sql = "SELECT * FROM vouchers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$voucher_id]);
    $voucher = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$voucher) {
        die("Voucher not found!");
    }
} else {
    die("No voucher ID provided.");
}

// Handle form submission for updating the voucher
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $expiry_date = $_POST['expiry_date'];

    // Prepare the update query
    $update_sql = "UPDATE vouchers SET code = ?, discount = ?, expiry_date = ? WHERE id = ?";
    $stmt = $pdo->prepare($update_sql);

    // Execute the update query
    if ($stmt->execute([$code, $discount, $expiry_date, $voucher_id])) {
        echo "<script>alert('Voucher updated successfully!'); window.location='../View/sellerdashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating voucher.');</script>";
    }
}
?>