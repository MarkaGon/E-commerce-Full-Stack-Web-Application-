<?php
require_once('database_njit.php');

// Get category ID
$category_id = filter_input(INPUT_GET, 'SipAndSavorCategoryID', FILTER_VALIDATE_INT);
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
      <link rel="stylesheet" href="home.css"/>
  </head>
  <body>
    <h1>Inventory List</h1>
    
  </body>

</html>