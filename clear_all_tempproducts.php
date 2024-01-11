<?php
// Include your database connection logic here
include_once 'config.php';

// Assuming you have a function to clear all temp products
$success = clearAllTempProducts($pdo);

// Return a JSON response
header('Content-Type: application/json');
echo json_encode(['success' => $success]);

// Function to clear all temp products
function clearAllTempProducts($pdo) {
    try {
        // Your SQL query to delete all temp products
        $query = "DELETE FROM temp_prod";

        // Prepare and execute the query
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return true; // Return true if clearing is successful
    } catch (Exception $e) {
        // Handle any exceptions or errors
        error_log('Error clearing all products: ' . $e->getMessage());
        return false; // Return false if an error occurs
    }
}
?>
