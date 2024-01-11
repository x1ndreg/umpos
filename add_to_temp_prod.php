<?php
// add_to_temp_prod.php

include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming your temp_prod table has the same column names
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $Quant = $_POST['Quant'];
    $productImage = $_POST['productImage'];
    $productBc = $_POST['productBc'];

    // Add the product to the temp_prod table
    try {
        $query = "INSERT INTO temp_prod (productId, productName, productPrice, Quant, productImage, productBc) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$productId, $productName, $productPrice, $Quant, $productImage, $productBc]);

        // Return success response
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Product added to temp_prod.']);
    } catch (PDOException $e) {
        // Handle any exceptions or errors
        error_log('Error adding to temp_prod: ' . $e->getMessage());

        // Return error response
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error adding to temp_prod.']);
    }
} else {
    // Return error response for invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
}
?>
