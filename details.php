<?php
require_once('database_njit.php');

$db = getDatabase();
session_start();

if (isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']) {
    echo "<p>Welcome, " . $_SESSION['name'] . "</p>";
}
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
    <?php if (!$product): ?>
        <h2>Product not found.</h2>
    <?php else: ?>
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
    <?php endif; ?>
</body>
</html>

