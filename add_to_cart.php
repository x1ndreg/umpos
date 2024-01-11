<?php
// Include your database connection logic here
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming your temp_prod table has the same column names
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $Quant = $_POST['Quant'];
    $productBc = $_POST['productBc'];
    $productCategory = $_POST['Category']; // Add this line to get the product category from the form

    // Calculate total quantity price
    $totalQprice = $productPrice * $Quant;

    // Retrieve the product image path based on the productBc
    try {
        $queryImage = "SELECT productImage FROM products WHERE productBc = :productBc";
        $stmtImage = $pdo->prepare($queryImage);
        $stmtImage->bindParam(':productBc', $productBc, PDO::PARAM_STR);
        $stmtImage->execute();
        $productImage = $stmtImage->fetchColumn();

        // Check if productImage is empty
        if (empty($productImage)) {
            throw new Exception('Product image not found for the given productBc.');
        }
    } catch (Exception $imageException) {
        // Handle the error
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => $imageException->getMessage()]);
        exit();
    }

    // Add the product to the temp_prod table
    try {
        $query = "INSERT INTO temp_prod (productName, productPrice, Quant, productImage, productBc, Category, totalQprice) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)
                  ON DUPLICATE KEY UPDATE 
                  productName = VALUES(productName), 
                  productPrice = VALUES(productPrice), 
                  Quant = VALUES(Quant), 
                  productImage = VALUES(productImage), 
                  productBc = VALUES(productBc), 
                  Category = VALUES(Category),
                  totalQprice = VALUES(totalQprice)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$productName, $productPrice, $Quant, $productImage, $productBc, $productCategory, $totalQprice]);

        // Return success response
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Product added to cart.']);
    } catch (Exception $e) {
        // Handle any exceptions or errors
        error_log('Error adding to cart: ' . $e->getMessage());

        // Return detailed error response
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error adding to cart: ' . $e->getMessage()]);
    }
} else {
    // Return error response for invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
}
?>
