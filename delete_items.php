<?php
// Include database connection file
//Mark Goncalves, 4/5/2024, IT202002, Phase4, mag@njit.edu
require_once('database_njit.php');
$db = getDatabase();

// Get product ID from POST data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

// Check if product ID is valid
if ($product_id !== false) {
    // Prepare DELETE query
    $query = 'DELETE FROM SipAndSavor WHERE SipAndSavorID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    
    // Execute query
    $success = $statement->execute();
    $statement->closeCursor();
    
    // Check if deletion was successful and provide appropriate feedback
    if ($success) {
        echo "<p>Product deleted successfully.</p>";
        include('sasList.php');
    } else {
        echo "<p>Failed to delete product.</p>";
        include('sasList.php');
    }
} else {
    // Invalid product ID
    echo "<p>Invalid product ID.</p>";
    include('sasList.php');
}
?>
