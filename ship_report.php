<?php
echo '<link rel="stylesheet" href="home.css"/>';
// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$street_address = $_POST['street_address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$order_number = $_POST['order_number'];
$ship_date = $_POST['ship_date'];
$dimensions = $_POST['dimensions'];
$declared_value = $_POST['declared_value'];

// Validate the dimensions
$dimensions_array = explode('x', $dimensions);
if (count($dimensions_array) !=  3 || array_search(false, array_map('is_numeric', $dimensions_array)) !== false) {
    echo "Invalid dimension, please enter dimensions as Length x Width x Height.";
    exit;
}

// Validate the declared value
if ($declared_value >  1000) {
    echo "Declared value can not be more than $1,000.";
    exit;
}


if (!preg_match("/^\d{5}$/", $zip_code)) {
    echo "Invalid ZIP code.";
    exit;
}
if (!preg_match("/^[A-Za-z ]+$/", $state)) {
    echo "Invalid state. Please enter a valid state name without numbers or special characters.";
    exit;
}
if (!preg_match("/^[A-Za-z ]+$/", $city)) {
    echo "Invalid city. Please enter a valid city name without numbers or special characters.";
    exit;
}

// Validate package dimensions
foreach ($dimensions_array as $dimension) {
    if ($dimension >  36) {
        echo "Package dimensions cannot exceed  36 inches.";
        exit;
    }
}

// If validation passes, display the report

// Display the report
echo "<h2>Shipping Report</h2>";
echo "From Address: Coffee and Tea Ave<br>";
echo "Recipient:$first_name $last_name<br>";
echo "To Address: $street_address, $city, $state, $zip_code<br>";
echo "Package Dimensions: $dimensions<br>";
echo "Declared Value: $$declared_value<br>";
echo "Shipping Company: UPS<br>";
echo "Shipping Class: UPS Premium<br>";
echo "Tracking Number:  1111111111<br>";
echo "Order Number: $order_number<br>";
echo "Ship Date: $ship_date<br>";
?>
