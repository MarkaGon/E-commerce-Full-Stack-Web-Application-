<?php

// get the product data
$SipAndSavorCategoryID = filter_input(INPUT_POST, 'SipAndSavorCategoryID', FILTER_VALIDATE_INT);
$SipAndSavorCode = filter_input(INPUT_POST, 'SipAndSavorCode');
$SipAndSavorName = filter_input(INPUT_POST, 'SipAndSavorName');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$max = 100000;

//VALIDATE INPUT
if ($SipAndSavorCategoryID == NULL || $SipAndSavorCategoryID == FALSE || $SipAndSavorCode == NULL ||
    $SipAndSavorName == NULL || $description == NULL || $price == NULL || $price == FALSE || $price > $max) {
    $error = "Try again. Invalid product data. Make sure all fields are filled in, SipAndSavor code is unique, and price is less than $100,000.";
    echo "<center>$error<br></center>";
    include('add_SipAndSavor_form.php');
} else {
    require_once('database_njit.php');
    $query = 'INSERT IGNORE INTO SipAndSavor (SipAndSavorCategoryID, SipAndSavorCode, SipAndSavorName, description, price, dateCreated)
    VALUES 
    (:SipAndSavorCategoryID, :SipAndSavorCode, :SipAndSavorName, :description, :price, NOW())';

    // add products to database
    $statement = $db->prepare($query);
    $statement->bindValue(':SipAndSavorCategoryID', $SipAndSavorCategoryID);
    $statement->bindValue(':SipAndSavorCode', $SipAndSavorCode);
    $statement->bindValue(':SipAndSavorName', $SipAndSavorName);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>Your insert statement status is $success</p>";
    
    // Display the Product List page
    include('sasList.php');
}
?>
