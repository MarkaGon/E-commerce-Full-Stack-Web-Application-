<?php
require_once('database_njit.php');

// Get category ID
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
  $category_id = 1;
}

// Get name for selected category
$queryCategory = 'SELECT * FROM SipAndSavorCategories
          WHERE SipAndSavorCategoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['SipAndSavorCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM SipAndSavorCategories
             ORDER BY SipAndSavorCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM SipAndSavor
          WHERE SipAndSavorCategoryID = :category_id
          ORDER BY SipAndSavorID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SipAndSavor</title>
    <style>
        /* Styles for table and body */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    <link rel="stylesheet" href="home.css"/>
    <?php include ('header.php'); ?>
    <?php include('footer.php'); ?>
</head>
<body>      
<main>
    <h1>Product List</h1>
    <aside>
        <!-- Display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?category_id=<?php echo $category['SipAndSavorCategoryID']; ?>">
                            <?php echo $category['SipAndSavorCategoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>       
    </aside>

    <section>
        <!-- Display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['SipAndSavorCode']; ?></td>
                        <td><?php echo $product['SipAndSavorName']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td>
                            <form>
                                <input type="hidden" name="product_id" value="<?php echo $product['SipAndSavorID']; ?>" />
                                <input type="hidden" name="category_id" value="<?php echo $product['SipAndSavorCategoryID']; ?>" />
                                <!-- Add buttons or actions here -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>      
            </tbody>
        </table>
    </section>
</main>
</body>
</html>

