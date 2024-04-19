<?php
//Mark Goncalves, 4/19/2024, IT202002, Phase5, mag@njit.edu

require_once('database_njit.php');
session_start();
$db = getDatabase();
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
                <!--Reset button -->
                <button type="button" onclick="resetForm()" class="btn btn-secondary">Reset</button>
            </form>
        </main>
        <?php include('footer.php'); ?>

        <!--Reset button JS -->
        <script> 
        function resetForm() {
            // Clear all form fields
            document.getElementById('create-form').reset();

            // Clear all error messages
            var errorMessages = document.querySelectorAll(".text-danger");
            errorMessages.forEach(function(errorMessage) {
                errorMessage.innerHTML = '';
            });
        }

        </script>

        <!-- js page field validation and reset button  -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to validate the Code field
                function validateCode() {
                    var code = document.getElementById('SipAndSavorCode').value;
                    var errorSpan = document.getElementById('SipAndSavorCode-error');
                    if (code === '' || code.length < 4 || code.length > 10) {
                        errorSpan.textContent = 'Field must be 4-10 characters long and not blank.';
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
                    if (name === '' || name.length < 10 || name.length > 100) {
                        errorSpan.textContent = 'Field must be 10-100 characters long and not blank.';
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
                    if (description === '' || description.length < 10 || description.length > 255) {
                        errorSpan.textContent = 'Field must be 10-255 characters long and not blank.';
                        return false;
                    } else {
                        errorSpan.textContent = '';
                        return true;
                    }
                }

                // Function to validate the SipAndSavorSize field
                function validateSize() {
                    var size = document.getElementById('SipAndSavorSize').value;
                    var errorSpan = document.getElementById('SipAndSavorSize-error');
                    var validSizes = ['Small', 'Medium', 'Large'];
                    if (size === '' || !validSizes.includes(size)) {
                        errorSpan.textContent = 'Field must be either Small, Medium, or Large.';
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
                    if (price === '' || price <= 0 || price > 100000) {
                        errorSpan.textContent = 'Field must be between $1 and $100,000.';
                        return false;
                    } else {
                        errorSpan.textContent = '';
                        return true;
                    }
                }

                // Attach event listeners to the input fields
                document.getElementById('SipAndSavorCode').addEventListener('input', validateCode);
                document.getElementById('SipAndSavorName').addEventListener('input', validateName);
                document.getElementById('description').addEventListener('input', validateDescription);
                document.getElementById('SipAndSavorSize').addEventListener('input', validateSize);
                document.getElementById('price').addEventListener('input', validatePrice);

                // Attach event listener to the form submit event
                document.getElementById('create-form').addEventListener('submit', function(event) {
                    if (!validateCode() || !validateName() || !validateDescription() || !validatePrice() || !validateSize()) {
                        event.preventDefault(); // Prevent form submission if validation fails
                    }
                });
            });
        </script>

    </body>
</html>
