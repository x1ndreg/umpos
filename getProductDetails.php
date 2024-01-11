<?php

include "config.php";

// Check if the productId parameter is set
if (isset($_GET['productId'])) {
    // Assume this is a placeholder for fetching product details from your database
    $productId = $_GET['productId'];

    // Fetch product details from the database
    $stmt = $pdo->prepare("SELECT * FROM products WHERE productId = ?");
    $stmt->execute([$productId]);
    $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a product was found
    if ($productDetails) {
        // Send the product details as JSON
        header('Content-Type: application/json');
        echo json_encode($productDetails);
    } else {
        // If no product is found, return an error message
        echo json_encode(array('error' => 'Product not found.'));
    }
} else {
    // If productId is not set, return an error message
    echo json_encode(array('error' => 'ProductId is not set.'));
}
