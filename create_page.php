<?php

require_once('database_njit.php');

//query for categories
$query = 'SELECT * FROM SipAndSavorCategories ORDER BY SipAndSavorCategoryID';

$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
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
            <form id="create-form" method="post" action="create_page.php">
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
                    <label for="SipAndSavorCode">SipAndSavor Code:</label>
                    <input type="text" class="form-control" id="SipAndSavorCode" name="SipAndSavorCode">
                    <span id="SipAndSavorCode-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="SipAndSavorName">SipAndSavor Name:</label>
                    <input type="text" class="form-control" id="SipAndSavorName" name="SipAndSavorName">
                    <span id="SipAndSavorName-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="description">SipAndSavor Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                    <span id="SipAndSavor-description-error" class="text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="price">SipAndSavor Price:</label>
                    <input type="text" class="form-control" id="price" name="price">
                    <span id="SipAndSavor-price-error" class="text-danger"></span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>