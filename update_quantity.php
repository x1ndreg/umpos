<?php

// Include your database connection logic here
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID and updated quantity from the POST data
    $productId = $_POST['productId'];
    $updatedQuantity = $_POST['updatedQuantity'];

    try {
        // Update the quantity in the temp_prod table
        $query = "UPDATE temp_prod SET Quant = :updatedQuantity WHERE productId = :productId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':updatedQuantity', $updatedQuantity, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();

        // Return success response
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Quantity updated successfully.']);
    } catch (Exception $e) {
        // Handle any exceptions or errors
        error_log('Error updating quantity: ' . $e->getMessage());

        // Return detailed error response
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error updating quantity: ' . $e->getMessage()]);
    }
} else {
    // Return error response for invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
}

?>
