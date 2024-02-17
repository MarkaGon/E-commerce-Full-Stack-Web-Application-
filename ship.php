<?php
if(!isset($first_name)) { $first_name = ''; }
if(!isset($last_name)) { $last_name = ''; }
if(!isset($address)) { $address = ''; }
if(!isset($city)) { $city = ''; }
if(!isset($state)) { $state = ''; }
if(!isset($zipcode)) { $zipcode = ''; }
if(!isset($order_number)) { $order_number = ''; }
if(!isset($length)) { $length = ''; }
if(!isset($width)) { $width = ''; }
if(!isset($height)) { $height = ''; }
if(!isset($declared_value)) { $declared_value = ''; }

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
        <input type ="text" name = "first_name" value = "<?php echo htmlspecialchars($first_name); ?>"/><br>
        <label>Last Name:</label>
        <input type ="text" name = "last_name" value = "<?php echo htmlspecialchars($last_name); ?>"/> <br>
        <label>Address:</label>
        <input type ="text" name = "address" value = "<?php echo htmlspecialchars($address); ?>"/> <br>
        <label>City:</label>
        <input type ="text" name = "city" value = "<?php echo htmlspecialchars($city); ?>"/><br>
        <label>State:</label>
        <input type ="text" name = "state" value = "<?php echo htmlspecialchars($state); ?>"/> <br>
        <label>Zipcode:</label>
        <input type ="number" name = "zipcode" value = "<?php echo htmlspecialchars($zipcode); ?>"/> <br>
        <h3>Package Details</h3>
        <label>Order Number:</label>
        <input type ="number" name = "order_number" value = "<?php echo htmlspecialchars($order_number); ?>"/><br>
        <label>Dimensions: Length</label>
        <input type ="number" name = "length" value = "<?php echo htmlspecialchars($length); ?>"/> 
        <label>Width</label>
        <input type ="number" name = "width" value = "<?php echo htmlspecialchars($width); ?>"/> 
        <label>Height</label>
        <input type ="number" name = "height" value = "<?php echo htmlspecialchars($height); ?>"/> <br>
        <label>Declared Value:</label>
        <input type ="number" name = "declared_value" value = "<?php echo htmlspecialchars($declared_value); ?>"/><br>
        <label>Ship Date:</label>
        <input type ="date" name = "ship_date" value = "<?php echo htmlspecialchars($ship_date); ?>"/><br>

        <input type="submit" value="Submit">
    </main>
</body>
</html>