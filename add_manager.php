<?php  //Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu
require_once("database_njit.php");

// Function to add a new manager
function addSipAndSavormanager($email, $password, $firstName, $lastName) {
    // Get database connection
    $db = getDatabase();
    
    // Hash the password
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    // INSERT query
    $query = 'INSERT INTO SipAndSavorManagers (emailAddress, password, firstName, lastName, dateCreated)
              VALUES (:email, :password, :firstName, :lastName, now())';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

// Manager 1 details
$email1 = "alice@example.com";
$password1 = "alice123";
$firstName1 = "Alice";
$lastName1 = "Wonderland";

// Manager 2 details
$email2 = "bob@example.com";
$password2 = "bob456";
$firstName2 = "Bob";
$lastName2 = "Marley";

// Manager 3 details
$email3 = "charlie@example.com";
$password3 = "charlie789";
$firstName3 = "Charlie";
$lastName3 = "Chaplin";

// Manager 4 details
$email4 = "diana@example.com";
$password4 = "diana987";
$firstName4 = "Diana";
$lastName4 = "Ross";

// Add manager 1
addSipAndSavormanager($email1, $password1, $firstName1, $lastName1);

// Add manager 2
addSipAndSavormanager($email2, $password2, $firstName2, $lastName2);

// Add manager 3
addSipAndSavormanager($email3, $password3, $firstName3, $lastName3);

// Add manager 4
addSipAndSavormanager($email4, $password4, $firstName4, $lastName4);

?>
