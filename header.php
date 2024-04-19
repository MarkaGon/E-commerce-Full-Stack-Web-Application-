<!--Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu -->
<header>
    <img src="images/logo2.png" alt="SipAndSavor Logo" width="59" />
    <h1 style="color: #e5e5e5; background-color:#58727f;">
        SipAndSavor
    </h1>
    <nav>
    <?php
            // Check if the user is a valid admin
            if (isset($_SESSION['is_valid_admin'])) { 
        ?>
            <!-- Admin links -->
            <a href="home.php">Home</a>
            <a href="ship.php">Shipping</a>
            <a href="sasList.php">Inventory</a>
            <a href="create_page.php">Create</a>
            <a href="logout.php">Logout</a>
        <?php 
            } else { 
        ?>
            <!-- Non-admin links -->
            <a href="home.php">Home</a>
            <a href="sasList.php">Inventory</a>
            <a href="login.php">Login</a>
        <?php 
            } 
        ?>
    </nav>
</header>
