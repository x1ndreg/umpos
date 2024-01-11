<?php
// Include your database connection logic here
include_once 'config.php';

// Check if the product ID is provided in the POST request
if (isset($_POST['productId'])) {
    // Retrieve the product ID from the POST data
    $productId = $_POST['productId'];

    try {
        // Get the database connection
        $conn = getPDO(); // Assuming getPDO() is defined in config.php

        // Prepare and execute the query to fetch product details
        $query = "SELECT * FROM products WHERE productId = :productId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch product details as an associative array
        $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return product details as JSON response
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'productDetails' => $productDetails]);
        exit(); // Make sure to exit after sending the response
    } catch (Exception $e) {
        // Handle any exceptions or errors
        error_log('Error fetching product details: ' . $e->getMessage());

        // Return an error response
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Error fetching product details']);
        exit(); // Make sure to exit after sending the response
    }
} else {
    // Return an error response if product ID is not provided
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Product ID not provided']);
    exit(); // Make sure to exit after sending the response
}
?>
