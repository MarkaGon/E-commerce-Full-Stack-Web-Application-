<?php
require_once('database_njit.php');
require_once('admin_db.php');
//Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu

session_start();
$db = getDatabase();

// Get email and password from POST data
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// Check if account exists and retrieve account details
$queryAccessories = 'SELECT * FROM SipAndSavorManagers WHERE emailAddress = :email';
$statement3 = $db->prepare($queryAccessories);
$statement3->bindValue(':email', $email);
$statement3->execute();
$account = $statement3->fetch();
$statement3->closeCursor();

// If account exists, retrieve first and last name
if ($account) {
    $firstName = $account['firstName'];
    $lastName = $account['lastName'];
} else {
    echo "Not found, try again "; // Notify if account not found
}

// Check if login is valid
if (is_valid_admin_login($email, $password)) {
    // Valid login
    $_SESSION['is_valid_admin'] = true;
    $_SESSION['name'] = $firstName . " " . $lastName . " (" . $email . ")";
    include("Home.php"); // Redirect to home page
    exit();
    echo "<p>You have successfully logged in</p>"; // This line will never execute as exit() is called before
} else {
    // Invalid login
    if ($email == NULL && $password == NULL) {
        $login_message = 'You must login to view this page.';
    } else {
        $login_message = 'Invalid credentials.';
    }
    include('login.php'); // Redirect to login page
}
?>