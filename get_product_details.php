<?php
// get_product_details.php

include "config.php";

function getProductDetails($productId) {
    global $pdo;

    try {
        $sql = "SELECT productName, productPrice, Quant, productImage FROM products WHERE productId = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productId]);

        $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return $productDetails;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return array();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['productId'])) {
    $productId = $_GET['productId'];

    $productDetails = getProductDetails($productId);

    // Return product details as JSON
    header('Content-Type: application/json');
    echo json_encode($productDetails);
    exit();
} else {
    http_response_code(400);
    echo 'Invalid request';
    exit();
}

?>
