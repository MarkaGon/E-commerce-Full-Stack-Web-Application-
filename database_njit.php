<!--Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu -->
<?php
  // Slide 24 (sort of)
  function getDatabase(){
    $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=mag';
    $username = 'mag';
    $password = 'Hy8pe9Sql!!';

  try {
    $db = new PDO($dsn, $username, $password);
  } catch(Exception $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
  }
  return $db;
  }
?>