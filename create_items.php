<?php
//Mark Goncalves, 3/22/2024, IT202002, Phase3, mag@njit.edu
// get the product data
$SipAndSavorCategoryID = filter_input(INPUT_POST, 'SipAndSavorCategoryID', FILTER_VALIDATE_INT);
$SipAndSavorCode = filter_input(INPUT_POST, 'SipAndSavorCode');
$SipAndSavorName = filter_input(INPUT_POST, 'SipAndSavorName');
$SipAndSavorSize = filter_input(INPUT_POST, 'SipAndSavorSize'); // New line for SipAndSavorSize
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$max = 100000;

//VALIDATE INPUT
if ($SipAndSavorCategoryID == NULL || $SipAndSavorCategoryID == FALSE || $SipAndSavorCode == NULL ||
    $SipAndSavorName == NULL || $SipAndSavorSize == NULL || $description == NULL || $price == NULL || $price == FALSE || $price > $max) { // Updated condition to include SipAndSavorSize
    $error = "Invalid product data, ensure all fields are filled in and unique, and price is less than $100,000.";
    echo "<center>$error<br></center>";
    include('create_page.php');
} else {
    require_once('database_njit.php');
    $query = 'INSERT IGNORE INTO SipAndSavor (SipAndSavorCategoryID, SipAndSavorCode, SipAndSavorName, SipAndSavorSize, description, price, dateCreated) VALUES (:SipAndSavorCategoryID, :SipAndSavorCode, :SipAndSavorName, :SipAndSavorSize, :description, :price, NOW())'; // Updated query to include SipAndSavorSize

    // add products to database
    $statement = $db->prepare($query);
    $statement->bindValue(':SipAndSavorCategoryID', $SipAndSavorCategoryID);
    $statement->bindValue(':SipAndSavorCode', $SipAndSavorCode);
    $statement->bindValue(':SipAndSavorName', $SipAndSavorName);
    $statement->bindValue(':SipAndSavorSize', $SipAndSavorSize); // New line for SipAndSavorSize
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p> ITEM HAS BEEN ADDED</p>";
    
    // Display the Product List page
    include('sasList.php');
}
?>


