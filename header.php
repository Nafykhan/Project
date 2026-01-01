<!-- includes/header.php -->
<head>
    <link rel="stylesheet" href="header.css"> <!-- Link to header CSS -->
</head>

<header>
    <div id="logo">
        <a href="index.php">Market Mingle</a>
    </div>

    <!-- Search bar in center -->
    <div class="search-bar">
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="Search for products...">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Nav links on right -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
</header>
