<?php
// Include your database connection code
include "config.php";

// Check if the productId is set in the POST request
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    try {
        // Prepare and execute the SQL query to delete the product
        $sql = "DELETE FROM products WHERE productId = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productId]);

        echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
        exit();
    } catch (PDOException $e) {

        error_log("Error: " . $e->getMessage());

        echo json_encode(['success' => false, 'message' => 'Error deleting product. Please try again.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request. ProductId is missing.']);
    exit();
}
?>
