<?php
require_once('database_njit.php');

// Mark Goncalves, 4/5/2024, IT202002, Phase4, mag@njit.edu
// Slide 17
function is_valid_admin_login($email, $password) {
    // Get database connection
    $db = getDatabase();

    // SQL query to fetch password for given email
    $query = 'SELECT password FROM SipAndSavorManagers WHERE emailAddress = :email';

    // Prepare SQL statement
    $statement = $db->prepare($query);

    // Bind email parameter
    $statement->bindValue(':email', $email);

    // Execute SQL statement
    $statement->execute();

    // Fetch the row
    $row = $statement->fetch();

    // Close the cursor
    $statement->closeCursor();

    // Check if row exists
    if ($row === false) {
        return false; // If no matching email found, return false
    } else {
        // Get hashed password from the fetched row
        $hash = $row['password'];

        // Verify the entered password with the hashed password
        return password_verify($password, $hash);
    }
}
?>
