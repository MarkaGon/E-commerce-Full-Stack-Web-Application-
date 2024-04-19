<?php 
//Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu
if (!isset($login_message)) {
  $login_message = 'You must login to view this page.';
}
?>
<!DOCTYPE html>
<html>
 <head>
        <title>SipAndSavor Login page</title>
        <link rel="icon" href="logo2.png"  type="image/png"/>
        <link rel="stylesheet" href="home.css"/>
        <?php include ('header.php'); ?>
        <?php include('footer.php'); ?>
 </head>
 <body>
   <h1>SipAndSavor Manager Login</h1>
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
</html>
