<?php
// get_product_details_by_bc.php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productBc = $_POST['productBc'];

    // Check if the productBc exists in the 'products' table
    $sql = "SELECT * FROM products WHERE productBc = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productBc]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Send a response with product details
        header('Content-Type: application/json');
        echo json_encode($product);
        exit();
    } else {
        // Send a response if product not found
        echo json_encode(['error' => 'Product not found']);
        exit();
    }
} else {
    // Send a response for invalid requests
    echo json_encode(['error' => 'Invalid request']);
    exit();
}
?>
