<?php
//Mark Goncalves, 3/22/2024, IT202002, Phase3, mag@njit.edu
require_once('database_njit.php');

$db = getDatabase();

//query for categories
$query = 'SELECT * FROM SipAndSavorCategories ORDER BY SipAndSavorCategoryID';

$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

//making sure they are a manager 
session_start();
    // Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // redirect them if not logged ins
    header("Location:login.php");
    exit();
  }
?>



<html>
    <head>
        <title>Create </title>
        <link rel="stylesheet" href="home.css"/>
    </head>
    <body>
        <?php include ('header.php'); ?>
        <main>
            <h2>Create</h2>
            <form id="create-form" method="post" action="create_items.php">
                <div>
                    <label class="label">Category:</label>
                    <select name="SipAndSavorCategoryID" class="select">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['SipAndSavorCategoryID']; ?>">
                                <?php echo $category['SipAndSavorCategoryName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="SipAndSavorCode">Code:</label>
                    <input type="text" class="form-control" id="SipAndSavorCode" name="SipAndSavorCode">
                    <span id="SipAndSavorCode-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="SipAndSavorName">Name:</label>
                    <input type="text" class="form-control" id="SipAndSavorName" name="SipAndSavorName">
                    <span id="SipAndSavorName-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                    <span id="SipAndSavor-description-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="SipAndSavorSize">Size:</label>
                    <input type="text" class="form-control" id="SipAndSavorSize" name="SipAndSavorSize">
                    <span id="SipAndSavorSize-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price">
                    <span id="SipAndSavor-price-error" class="text-danger"></span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>