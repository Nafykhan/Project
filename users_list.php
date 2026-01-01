<?php
// Include the database connection
include('db.php');
?>

<head>
    <!-- Link to the users list CSS -->
    <link rel="stylesheet" href="users_list.css">  <!-- Correct path to the CSS file -->
</head>

<section id="users-list">
    <h2>Manage Users</h2>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch users from the database
            $stmt = $pdo->query("SELECT * FROM users");
            while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Ensure safe output using htmlspecialchars() to avoid XSS attacks
                $username = htmlspecialchars($user['username']);
                $email = htmlspecialchars($user['email']);
                $role = htmlspecialchars($user['role']);
                $id = htmlspecialchars($user['id']); // for the edit and delete links

                echo "<tr>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$role</td>
                        <td>
                            <a href='edit_user.php?id=$id'>Edit</a> | 
                            <a href='delete_user.php?id=$id'>Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include('includes/footer.php'); ?>
