<html>
  <head>
    <title>Login/Logout Menu</title>
  </head>
  <body>
    <?php 
    //Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu
    session_start();
    if (isset($_SESSION['is_valid_admin'])) { 
    ?>
      <p>
        <a href="logout.php">Logout</a>
      </p>
    <?php } else { ?>
      <p>
        <a href="login.php">Login</a>
      </p>
    <?php } ?>
  </body>
</html>