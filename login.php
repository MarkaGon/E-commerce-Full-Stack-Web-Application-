<?php 
if (!isset($login_message)) {
  $login_message = 'You must login to view this page.';
}
// Start the session
session_start();

// Check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  // If the user is logged in, redirect them to the stored URL
  if (isset($_SESSION["sasList.php"])) {
    $url = $_SESSION["sasList.php"];
    unset($_SESSION["sasList.php"]);
    header("Location: " . $url);
    
  exit;
  }
}


?>
<!DOCTYPE html>
<html>
 <head>
 <head>
        <title>SipAndSavor</title>
        <link rel="icon" href="logo2.png"  type="image/png"/>
        <link rel="stylesheet" href="home.css"/>
    </head>
 </head>
 <body>
      <?php include('header.php'); ?>
 <main>
   <h1>Login</h1>
   <form action="authenticate.php" method="post">
     <label>Email:</label>
     <input type="text" name="email" value="">
     <br>
     <label>Password:</label>
     <input type="password" name="password" value="">
     <br>
     <input type="submit" value="Login">
   </form>
   <p><?php echo $login_message; ?></p>
 </main>
 </body>
    <?php include('footer.php'); ?>
</html>