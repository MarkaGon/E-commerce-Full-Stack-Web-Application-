<?php
if (!isset($first_name)) { $first_name = ''; }
if (!isset($last_name)) { $last_name = ''; }
if (!isset($street_address)) { $street_address = ''; }
if (!isset($city)) { $city = ''; }
if (!isset($state)) { $state = ''; }
if (!isset($zip_code)) { $zip_code = ''; }
if (!isset($order_number)) { $order_number = ''; }
if (!isset($dimensions)) { $dimensions = ''; }
if (!isset($declared_value)) { $declared_value = ''; }
?>

<html>
<head>
    <title>Shipping Page</title>
    <link rel="stylesheet" href="home.css"/>
</head>
<body>
    <?php include ('header.php'); ?>
    <main>
        <h2>Shipping Information</h2>
        <?php if (!empty($error_message)) { ?>
        <p><?php echo htmlspecialchars($error_message); ?></p>
        <?php } ?>
        <label>First Name:</label>
        <input type="text" name="first_name" pattern="[A-Za-z]+" title="Only letters are allowed" required value="<?php echo htmlspecialchars($first_name); ?>"><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" pattern="[A-Za-z]+" title="Only letters are allowed" required value="<?php echo htmlspecialchars($last_name); ?>"><br>
        <label>Street Address:</label>
        <input type="text" name="street_address" required value="<?php echo htmlspecialchars($street_address); ?>"><br>
        <label>City:</label>
        <input type="text" name="city" pattern="[A-Za-z ]+" title="Only letters and spaces are allowed" required value="<?php echo htmlspecialchars($city); ?>"><br>
        <label>State:</label>
        <input type="text" name="state" pattern="[A-Za-z]+" title="Only letters are allowed" required value="<?php echo htmlspecialchars($state); ?>"><br>
        <label>Zip Code:</label>
        <input type="text" name="zip_code" pattern="[0-9]+" title="Only numbers are allowed" required value="<?php echo htmlspecialchars($zip_code); ?>"><br>

        <h3>Package Details</h3>
        <label>Order Number:</label>
        <input type="text" name="order_number" pattern="[0-9]+" title="Only numbers are allowed" required value="<?php echo htmlspecialchars($order_number); ?>"><br>
        <label>Dimensions (L x W x H):</label>
        <input type="text" name="dimensions" pattern="[^*<>{}]+" title="No special characters are allowed except *{}<>" required value="<?php echo htmlspecialchars($dimensions); ?>"><br>
        <label>Declared Value:</label>
        <input type="text" name="declared_value" pattern="[0-9]+" title="Only numbers are allowed" required value="<?php echo htmlspecialchars($declared_value); ?>"><br>
        <label>Ship Date:</label>
        <input type="date" name="ship_date" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
