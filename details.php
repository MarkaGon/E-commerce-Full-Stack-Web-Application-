<?php
require_once('database_njit.php');

$db = getDatabase();
session_start();

include ('header.php');
include('footer.php');
// Get product ID from URL
$product_code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);

// Check if the product code is provided
if (!$product_code) {
    echo "Product code is missing.";
    exit;
}

// Query to get the product details
$queryProduct = 'SELECT * FROM SipAndSavor WHERE SipAndSavorCode = :product_code';
$statement = $db->prepare($queryProduct);
$statement->bindValue(':product_code', $product_code);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

// Check if the product exists
if (!$product) {
    echo "Product not found.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="home.css"/>    
    <title>Product Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="rollover.js"></script>
</head>
<body>
    <h2><?php echo $product['SipAndSavorName']; ?></h2>
    <p>Code: <?php echo $product['SipAndSavorCode']?></p>
    <p>Description: <?php echo $product['description']; ?></p>
    <p>Size: <?php echo $product['SipAndSavorSize']; ?></p>
    <p>Price: <?php echo $product['price']; ?></p>
    <!-- Display product image if available -->
    <div id="image_rollovers">
        <img src="images/<?php echo $product['SipAndSavorCode']; ?>.jpeg" alt="<?php echo $product['SipAndSavorName']; ?>"
         width="305" height="305" style="display: block; margin: 0 auto; padding: 10px;">
    </div>
</body>
</html>
