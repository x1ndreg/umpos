<?php
// Include your database connection code or configuration file
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product IDs and quantities from the request
    $productIds = $_POST['productIds'];
    $quantities = $_POST['quantities'];

    // Loop through the products and update the database
    for ($i = 0; $i < count($productIds); $i++) {
        $productId = $productIds[$i];
        $quantity = $quantities[$i];

        // Perform database update (replace this with your actual database update logic)
        // Example: Update the product quantity by deducting the purchased quantity
        // $sql = "UPDATE products SET quantity = quantity - $quantity WHERE id = $productId";
        // $result = mysqli_query($conn, $sql);

        // For demonstration purposes, let's assume the update was successful
        $result = true;
    }

    // Check the result and send a response
    if ($result) {
        $response = ['success' => true, 'message' => 'Checkout successful'];
    } else {
        $response = ['success' => false, 'message' => 'Checkout failed'];
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
