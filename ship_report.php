
<?php 
//Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu
session_start();
echo '<link rel="stylesheet" href="home.css"/>';
include ('header.php'); 
include('footer.php');

// Retrieve form data
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_VALIDATE_INT);
$ship_date = filter_input(INPUT_POST, 'ship_date');
$order_number = filter_input(INPUT_POST, 'order_number', FILTER_VALIDATE_INT);
$length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT);
$width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
$height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
$declared_value = filter_input(INPUT_POST, 'declared_value', FILTER_VALIDATE_INT);

// Validate the dimensions
if ($length > 36 || $width > 36 || $height > 36){
    $error_message = "Error, No dimension can be larger than 36 inches";
}

// Make sure the value is not larger than $1000
if ($declared_value >  1000) {
    echo "Declared value can not be more than $1,000.";
    exit;
}


// Display the report
echo "<h1>Shipping Report</h1>";
echo "From Address:  Martin St, Hoboken, NJ, 02021<br>";
echo "Recipient:  $first_name $last_name<br>";
echo "To Address: $address, $city, $state, $zipcode<br>";
echo "Package Dimensions:  $length x $width x $height <br>";
echo "Declared Value: $$declared_value<br>";
echo "Shipping Company:  UPS<br>";
echo "Shipping Class:  Next Day Air<br>";
echo "Tracking Number:   123456789<br>";
echo "Order Number:  $order_number<br>";
echo "Ship Date:  $ship_date<br>"; 
?>
<html>
    <br><br>
    <img src="images/bar.png" alt= "Barcode" width="290px" />
</html>
