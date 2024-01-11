<?php

// Include your database connection code
include 'config4.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent in the POST request
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];

    try {
        // Establish a connection to the database (assuming your connection code is in config.php)
        $pdo = getPDO(); // Adjust this function name based on your actual function

        // Prepare the update query
        $sql = "UPDATE products SET Quant = ?, productName = ?, productPrice = ? WHERE productId = ?";
        $stmt = $pdo->prepare($sql);

        // Execute the update query
        $stmt->execute([$quantity, $productName, $price, $productId]);

        // Send a success response
        echo json_encode(['status' => 'success', 'message' => 'Changes saved successfully']);
    } catch (PDOException $e) {
        // Log the error for debugging
        error_log("Error: " . $e->getMessage());

        // Send an error response
        echo json_encode(['status' => 'error', 'message' => 'An error occurred while saving changes. Please try again.']);
    }
} else {
    // Send an error response for non-POST requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
