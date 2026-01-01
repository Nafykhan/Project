
<link rel="stylesheet" href="settings.css">

<section id="settings">
    <h2>Admin Settings</h2>
    <form action="update_settings.php" method="POST">

        <!-- Profile Settings -->
        <h3>Profile</h3>
        <label for="admin_name">Name:</label>
        <input type="text" name="admin_name" value="Admin User">

        <label for="admin_email">Email:</label>
        <input type="email" name="admin_email" value="admin@gmail.com">

        <label for="admin_password">Password:</label>
        <input type="password" name="admin_password" placeholder="Enter new password">

        <!-- Website Settings -->
        <h3>Website</h3>
        <label for="site_name">Site Name:</label>
        <input type="text" name="site_name" value="Market Mingle">

        <label for="site_currency">Currency:</label>
        <select name="site_currency">
            <option value="BDT">BDT</option>
            <option value="USD">USD</option>
        </select>

        <!-- Security -->
        <h3>Security</h3>
        <label><input type="checkbox" name="remember_me" checked> Enable Remember Me</label>

        <button type="submit">Save Settings</button>
    </form>
</section>

<?php include('includes/footer.php'); ?>
