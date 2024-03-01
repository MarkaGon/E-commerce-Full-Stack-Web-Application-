<?php
  // Slide 24 (sort of)
  $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=mag';
  $username = 'mag';
  $password = 'Hy8pe9Sql!!';

  try {
    $db = new PDO($dsn, $username, $password);
    echo '<p>Your are connected to the NJIT database!</p>';
  } catch(Exception $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
  }
?>