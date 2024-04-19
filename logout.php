<?php
//Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu
  session_start();
  $_SESSION = [];  // Clear all session data from memory
  session_destroy();     // Clean up the session ID
  $login_message = 'You have been logged out.';
  include('login.php');
?>