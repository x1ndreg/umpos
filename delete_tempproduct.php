<?php
include "config.php";
// Check if the productId is provided in the POST request
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Perform the deletion in the database
    // Adjust the SQL query based on your actual table structure
    $sql = "DELETE FROM temp_prod WHERE productId = :productId";

    try {
        // Use prepared statements to prevent SQL injection
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();

        // Assume a successful deletion for demonstration purposes
        $response = array('status' => 'success', 'message' => 'Product deleted successfully');
    } catch (PDOException $e) {
        $response = array('status' => 'error', 'message' => 'Error deleting product: ' . $e->getMessage());
    }
} else {
    $response = array('status' => 'error', 'message' => 'Product ID not provided');
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
