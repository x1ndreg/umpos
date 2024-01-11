<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['Quant']; // Assuming the form field is named 'Quant'
    $role = $_POST['roleId'];
    $category = $_POST['categoryId'];

    // Handle file upload
    $uploadDir = 'assets/img/product/';
    $uploadFile = $uploadDir . basename($_FILES['productImage']['name']);

    if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile)) {
        try {
            $sql = "INSERT INTO products (product_name, product_price, product_quantity, role_id, cat_id, product_image) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            $roleStmt = $pdo->prepare("SELECT id FROM roles WHERE name = ?");
            $roleStmt->execute([$role]);
            $roleID = $roleStmt->fetchColumn();

            $categoryStmt = $pdo->prepare("SELECT id FROM categories WHERE category_name = ?");
            $categoryStmt->execute([$category]);
            $categoryID = $categoryStmt->fetchColumn();

            // Execute the insertion query
            $stmt->execute([$productName, $productPrice, $productQuantity, $roleID, $categoryID, $uploadFile]);

            // Redirect to a success page with a query parameter for displaying a success message
            header("Location: success.php?success=1");
            exit();
        } catch (PDOException $e) {
            // Display an error message on the same page
            $error_message = "Error: " . $e->getMessage();
        }
    } else {
        // Display an error message if there's an issue with file upload
        $error_message = "Error uploading file.";
    }
}
?>

<!-- Your HTML Form -->

<?php
// Display the error message if it exists
if (isset($error_message)) {
    echo '<div class="alert alert-danger">' . $error_message . '</div>';
}
?>
