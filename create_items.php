<?php
//Mark Goncalves, 4/5/2024, IT202002, Phase4, mag@njit.edu
// get the product data
require_once('database_njit.php');
$db = getDatabase();

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

<script>
// Function to validate the Code field
function validateCode() {
    var code = document.getElementById('SipAndSavorCode').value;
    var errorSpan = document.getElementById('SipAndSavorCode-error');
    if (code.length < 4 || code.length > 10) {
        errorSpan.textContent = 'Code must be between 4 and 10 characters.';
        return false;
    } else {
        errorSpan.textContent = '';
        return true;
    }
}

// Function to validate the Name field
function validateName() {
    var name = document.getElementById('SipAndSavorName').value;
    var errorSpan = document.getElementById('SipAndSavorName-error');
    if (name.length < 10 || name.length > 100) {
        errorSpan.textContent = 'Name must be between 10 and 100 characters.';
        return false;
    } else {
        errorSpan.textContent = '';
        return true;
    }
}

// Function to validate the Description field
function validateDescription() {
    var description = document.getElementById('description').value;
    var errorSpan = document.getElementById('SipAndSavor-description-error');
    if (description.length < 10 || description.length > 255) {
        errorSpan.textContent = 'Description must be between 10 and 255 characters.';
        return false;
    } else {
        errorSpan.textContent = '';
        return true;
    }
}

// Function to validate the Price field
function validatePrice() {
    var price = document.getElementById('price').value;
    var errorSpan = document.getElementById('SipAndSavor-price-error');
    var priceVal = parseFloat(price);
    if (isNaN(priceVal) || priceVal <= 0 || priceVal > 100000) {
        errorSpan.textContent = 'Price must be a positive number less than or equal to $100,000.';
        return false;
    } else {
        errorSpan.textContent = '';
        return true;
    }
}

// Function to validate the entire form on submission
function validateForm(event) {
    var isValid = true;
    
    isValid &= validateCode();
    isValid &= validateName();
    isValid &= validateDescription();
    isValid &= validatePrice();
    
    if (!isValid) {
        event.preventDefault(); // Prevent form submission if any field is invalid
    }
}

// Add event listeners to form fields for real-time validation
document.getElementById('SipAndSavorCode').addEventListener('input', validateCode);
document.getElementById('SipAndSavorName').addEventListener('input', validateName);
document.getElementById('description').addEventListener('input', validateDescription);
document.getElementById('price').addEventListener('input', validatePrice);

// Add form submission event listener for final validation
document.getElementById('create-form').addEventListener('submit', validateForm);
</script>



