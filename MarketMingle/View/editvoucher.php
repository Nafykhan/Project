<?php
include "db.php";

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
        echo "<script>alert('Voucher updated successfully!'); window.location='sellerdashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating voucher.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Voucher</title>
    <link rel="stylesheet" href="editvoucher.css"> 
</head>
<body>
    <div class="card">
        <h1>Edit Voucher</h1>
        <form method="POST">
            <label>Voucher Code:</label>
            <input type="text" name="code" value="<?php echo htmlspecialchars($voucher['code']); ?>" required>

            <label>Discount (%):</label>
            <input type="number" name="discount" value="<?php echo htmlspecialchars($voucher['discount']); ?>" required>

            <label>Expiry Date:</label>
            <input type="date" name="expiry_date" value="<?php echo htmlspecialchars($voucher['expiry_date']); ?>" required>

            <button type="submit">Update Voucher</button>
        </form>
        <a href="sellerdashboard.php"> Back to Dashboard</a>
    </div>
</body>
</html>
