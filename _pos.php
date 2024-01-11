<!DOCTYPE html>
<html lang="en">

<?php
// Include your database connection code
include "config.php";


// Start the session to access the username if the user is logged in
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If the username is not set in the session, redirect to the login page
    header('Location: _signin.php');
    exit();
}




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['Quant'];
    $productBc = $_POST['productBc'];
    $Category = $_POST['Category'];

    // Check if a file is selected
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0) {
        $fileTmpPath = $_FILES['productImage']['tmp_name'];
        $fileName = $_FILES['productImage']['name'];
        $fileSize = $_FILES['productImage']['size'];
        $fileType = $_FILES['productImage']['type'];

        $uploadDirectory = 'umpos/uploaded/';

        // Set the destination path with a unique file name (e.g., timestamp + original file name)
        $destPath = $uploadDirectory . time() . '_' . $fileName;

        // Ensure the directory exists
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true); // Create the directory with proper permissions
        }

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // File uploaded successfully, now insert the data into the 'products' table
            try {
                $sql = "INSERT INTO products (productBc, productName, productPrice, Quant, productImage, Category) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);

                // Execute the insertion query
                $stmt->execute([$productBc, $productName, $productPrice, $productQuantity, $destPath, $Category]);

                // Optionally, you can set a success message
                $_SESSION['successMessage'] = "Product added successfully!";

                // Redirect to the same page to avoid form resubmission
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            } catch (PDOException $e) {
                // Log the error for debugging
                error_log("Error: " . $e->getMessage());

                // Set an error message for the user
                $_SESSION['errorMessage'] = "An error occurred while adding the product. Please try again.";

                // Redirect to the same page to show the error message
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }
        } else {
            $_SESSION['errorMessage'] = "Error moving the uploaded file to the destination directory. Check directory permissions.";
        }
    } else {
        $_SESSION['errorMessage'] = "No file uploaded or an error occurred during upload.";
    }
}



function fetchProductsFromDatabase()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '1'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}

function fetchProductsFromDatabase2()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '2'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}

function fetchProductsFromDatabase3()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '3'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}

function fetchProductsFromDatabase4()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '4'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}

function fetchProductsFromDatabase5()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '5'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}
function fetchProductsFromDatabase6()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '6'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}
function fetchProductsFromDatabase7()
{
    global $pdo;

    try {
        // Assuming you have a 'products' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM products WHERE Category = '7'";
        $stmt = $pdo->query($sql);

        // Fetch the products as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching products: " . $e->getMessage());
    }
}




function fetchTempProductsFromDatabase()
{
    global $pdo;

    try {
        // Assuming you have a 'temp_prod' table in your database
        $sql = "SELECT productId, productName, productPrice, Quant, productImage FROM temp_prod";
        $stmt = $pdo->query($sql);

        // Fetch the temp products as an associative array
        $tempProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tempProducts;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching temp products: " . $e->getMessage());
    }
}

function getProductDetails($productId)
{
    global $pdo; // Assuming $pdo is your database connection variable

    try {
        // Replace this with your actual database query
        $sql = "SELECT productName, productPrice, Quant, productImage FROM products WHERE productId = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productId]);

        // Fetch the result
        $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return $productDetails;
    } catch (PDOException $e) {
        // Log the error for debugging
        error_log("Error: " . $e->getMessage());

        // Return an empty array or handle the error as needed
        return array();
    }
}


function getTotalProductPrice()
{
    global $pdo;

    try {
        // Fetch the sum of productPrice from the temp_prod table
        $sql = "SELECT SUM(productPrice) as total FROM temp_prod";
        $stmt = $pdo->query($sql);

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return the total product price
        return $result['total'] ?: 0;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching total product price: " . $e->getMessage());
    }
}

// Get the total product price
$totalProductPrice = getTotalProductPrice();

// Check if $totalProductPrice is not empty
$formattedTotal = !empty($totalProductPrice) ? number_format($totalProductPrice, 2) : '0.00';

// Calculate the total item count
$totalItemCount = getTotalItemCount();

function getTotalItemCount()
{
    global $pdo;

    try {
        // Fetch the count of items from the temp_prod table
        $sql = "SELECT COUNT(*) as itemCount FROM temp_prod";
        $stmt = $pdo->query($sql);

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return the total item count
        return $result['itemCount'] ?: 0;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching total item count: " . $e->getMessage());
    }
}


$totalItemCount = getTotalItemCount();

function getTotalOfAllProductPrices()
{
    global $pdo;

    try {
        // Fetch all product prices from the temp_prod table
        $sql = "SELECT productPrice FROM temp_prod";
        $stmt = $pdo->query($sql);

        // Fetch all prices as an array
        $prices = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Calculate the total of all product prices
        $totalProductPrices = array_sum($prices);

        // Return the total of all product prices
        return $totalProductPrices ?: 0;
    } catch (PDOException $e) {
        // Handle the error (e.g., log, display an error message)
        die("Error fetching total product prices: " . $e->getMessage());
    }
}



?>

<head>
    <meta charset="utf-8">
    <title>UMDEM PCCO</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/umdemlogoround.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <!-- Include Toastr CSS and JS files -->
    <link rel="stylesheet" href="path/to/toastr.css">
    <script src="path/to/toastr.js"></script>



</head>


<body>


    <div class="main-wrappers">


        <?php

        include "_navbar.php";
        ?>

        <div class="page-wrapper ms-0">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 tabs_wrapper">
                        <div class="page-header">
                            <div class="page-title">
                                <h4>Categories</h4>
                                <h6>Manage your purchases</h6>
                            </div>
                        </div>

                        <!-- category for each food products  -->
                        <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                            <li class="active" id="rice">
                                <div class="product-details ">
                                    <img src="assets/img/rice.png" alt="img">
                                    <h6>Rice</h6>
                                </div>
                            </li>
                            <li class="drinks" id="drinks">
                                <a class="product-details">
                                    <img src="assets/img/soft-drink.png" alt="img">
                                    <h6>Drinks/Beverage</h6>
                                </a>
                            </li>
                            <li class="active" id="bread">
                                <div class="product-details ">
                                    <img src="assets/img/bread.png" alt="img">
                                    <h6>Bread</h6>
                                </div>
                            </li>
                            <li class="active" id="desserts">
                                <div class="product-details ">
                                    <img src="assets/img/sweets.png" alt="img">
                                    <h6>Dessert</h6>
                                </div>
                            </li>
                            <li class="active" id="viand">
                                <div class="product-details">
                                    <img src="assets/img/meal.png" alt="img">
                                    <h6>Viand</h6>
                                </div>
                            </li>
                            <li class="active" id="chips">
                                <div class="product-details">
                                    <img src="assets/img/chips.png" alt="img">
                                    <h6>Chips</h6>
                                </div>
                            </li>
                            <li class="active" id="biscuit">
                                <div class="product-details ">
                                    <img src="assets/img/biscuit.png" alt="img">
                                    <h6>Biscuits</h6>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="rice">
                                    <div class="row">
                                        <?php
                                        // Fetch products from the database (replace this with your actual function)
                                        $products = fetchProductsFromDatabase();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="drinks">

                                    <div class="row">
                                        <?php

                                        $products = fetchProductsFromDatabase2();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="bread">

                                    <div class="row">
                                        <?php
                                        // Fetch products from the database (replace this with your actual function)
                                        $products = fetchProductsFromDatabase3();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="desserts">
                                    <div class="row">
                                        <?php
                                        // Fetch products from the database (replace this with your actual function)
                                        $products = fetchProductsFromDatabase4();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="viand">
                                    <div class="row">
                                        <?php
                                        // Fetch products from the database (replace this with your actual function)
                                        $products = fetchProductsFromDatabase5();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="chips">
                                    <div class="row">
                                        <?php
                                        // Fetch products from the database (replace this with your actual function)
                                        $products = fetchProductsFromDatabase6();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="biscuit">
                                    <div class="row">
                                        <?php
                                        // Fetch products from the database (replace this with your actual function)
                                        $products = fetchProductsFromDatabase7();

                                        // Loop through the products and echo HTML content
                                        foreach ($products as $product) { ?>
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <!-- <div class="row"> -->
                                                <div class="productset flex-fill" data-bs-toggle="modal" data-bs-target="#editProductDetails" onclick="loadProductDetails(<?= $product['productId'] ?>)">
                                                    <div class="productsetimg">
                                                        <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                        <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h4><?= $product['productName'] ?></h4>
                                                        <h6><span>₱<?= $product['productPrice'] ?></span></h6>
                                                    </div>
                                                    <script>
                                                        function loadProductDetails(productId) {
                                                            // You can use AJAX to fetch data based on the productId
                                                            // Here's a simple example using fetch API
                                                            fetch('getProductDetails.php?productId=' + productId)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    // Update the content in the modal body
                                                                    document.getElementById('productDetailsContainer').innerHTML = data.productDetails;
                                                                    // Update the modal title with the productId
                                                                    document.getElementById('editProductDetailsTitle').innerHTML = productId + ' Product Details';
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal fade" id="productModal<?= $product['productId'] ?>" tabindex="-1" aria-labelledby="productModalLabel<?= $product['productId'] ?>" aria-hidden="true">
                                                <!-- Replace 'productId' with the actual key of your product -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel<?= $product['productId'] ?>">Product Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add content for the modal here -->
                                                            <img src="<?= isset($product['productImage']) ? $product['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="Product Image">
                                                            <h6>Qty: <?= $product['Quant'] ?> </h6>
                                                            <h4><?= $product['productName'] ?></h4>
                                                            <h6><?= $product['productPrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal for when card is clicked -->
                    <div class="modal fade" id="editProductDetails" tabindex="-1" aria-labelledby="editProductDetails" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductDetailsTitle">Product Details</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- modal dynamic for each cards  -->
                                <div class="modal-body">
                                    <form id="productDetailsForm">
                                        <div class="row">
                                            <!-- left side -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <!-- Hidden input field to store the product ID -->
                                                    <div class="mb-3">
                                                        <div class="dropdowncateg">
                                                            <label for="productCategory" class="form-label">Product Category</label>
                                                            <input type="text" id="productCategory" name="Category" placeholder="Enter product category" readonly style="border: none; background-color: transparent;">
                                                        </div>
                                                    </div>
                                                    <h5 class="modal-title" id="editProductDetailsTitleID"></h5>
                                                    <input type="hidden" id="productIdInput" name="productIdInput">
                                                </div>
                                                <div class="mb-3" id="productImageContainer"></div>
                                            </div>

                                            <!-- right side -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="productNameInput" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" id="productNameInput" name="productNameInput">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="priceInput" class="form-label">Price</label>
                                                    <input type="text" class="form-control" id="priceInput" name="priceInput">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="quantityInput" class="form-label1">Product Quantity Instock </label>
                                                    <input type="text" class="form-control" id="quantityInput" name="quantityInput" readonly>
                                                    <label for="userEnteredQuantity" class="form-label">Quantity</label>
                                                    <input type="text" class="form-control" id="userEnteredQuantity" name="userEnteredQuantity">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productBcInput" class="form-label">Product Barcode</label>
                                                    <input type="text" class="form-control" id="productBcInput" name="productBcInput">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                                        <span class="button-spacer">&nbsp; &nbsp;</span>
                                        <button type="button" class="btn btn-primary1 addToCartBtn" onclick="handleQuantityChange(); addToCart(); saveChanges()">
                                            <img src="assets/your-image-path.jpg" alt="img" class="me-2" data-feather="shopping-cart"> Add to cart
                                        </button>

                                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">
                                            <img class="deletesvg" src="assets/img/icons/delete-2.svg" alt="img" data-bs-toggle="tooltip" title="Delete Product">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        function loadProductDetails(productId) {
                            fetch('getProductDetails.php?productId=' + productId)
                                .then(response => response.json())
                                .then(data => {
                                    document.getElementById('editProductDetailsTitleID').innerText = 'Product ID: ' + productId;
                                    document.getElementById('productIdInput').value = productId;
                                    document.getElementById('quantityInput').value = data.Quant;
                                    document.getElementById('productNameInput').value = data.productName;
                                    document.getElementById('priceInput').value = data.productPrice;
                                    document.getElementById('productBcInput').value = data.productBc;
                                    document.getElementById('productCategory').value = data.Category;

                                    // Load the image dynamically
                                    var imgElement = document.createElement('img');
                                    imgElement.src = data.productImage;
                                    imgElement.alt = 'Product Image';
                                    imgElement.classList.add('img-fluid'); // Add any additional classes for styling

                                    // Replace the existing image container with the dynamically loaded image
                                    var imageContainer = document.getElementById('productImageContainer');
                                    imageContainer.innerHTML = ''; // Clear the container
                                    imageContainer.appendChild(imgElement);

                                    // Update the modal title with the productId
                                    document.getElementById('editProductDetailsTitleID').innerHTML = 'Product ID: ' + productId;
                                })
                                .catch(error => console.error('Error:', error));
                        }


                        // Function to save changes
                        function saveChanges() {
                            try {
                                var productId = document.getElementById('productIdInput').value;
                                var quantity = document.getElementById('quantityInput').value;
                                var productName = document.getElementById('productNameInput').value;
                                var price = document.getElementById('priceInput').value;
                                var productBc = document.getElementById('productBcInput').value;

                                // Make an AJAX request to save changes
                                $.ajax({
                                    type: 'POST', // Use POST method to send data
                                    url: 'save_changes.php', // Replace with the actual URL to handle the save changes logic on the server
                                    data: {
                                        productId: productId,
                                        quantity: quantity,
                                        productName: productName,
                                        price: price,
                                        productBc: productBc
                                    },
                                    dataType: 'json', // Specify that you expect JSON data in the response
                                    success: function(response) {
                                        // Handle the success response
                                        console.log('Changes saved successfully:', response);

                                        // Close the modal after successful save
                                        $('#editProductDetails').modal('hide');

                                        // Refresh the page
                                        location.reload();
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle the error response
                                        console.error('Error saving changes:', error);

                                        // You can show an error message or take appropriate action
                                    }
                                });
                            } catch (error) {
                                console.error('Error:', error);
                            }
                        }
                    </script>

                    <script>
                        $(document).ready(function() {
                            // Add event listener for modal showing event
                            $('#editProductDetails').on('show.bs.modal', function(event) {
                                var modal = $(this);
                                // Extract the product ID from the modal's ID
                                var productId = modal.attr('id').replace('productModal', '');
                                console.log('Product ID:', productId); // Log product ID for debugging

                                // Set the modal title
                                // $('#editProductDetailsTitle').text('Product Details - ' + productId);

                                // Make an AJAX request to fetch product details
                                $.ajax({
                                    type: 'GET',
                                    url: 'get_product_details.php', // Replace with the actual URL to fetch product details
                                    data: {
                                        productId: productId
                                    },
                                    dataType: 'json', // Specify that you expect JSON data
                                    success: function(data) {
                                        console.log('AJAX Response:', data); // Log AJAX response for debugging

                                        // Update the content inside the modal
                                        if (data.hasOwnProperty('productName')) {
                                            // Assuming 'productName', 'productPrice', 'Quant', and 'productImage' are the keys in your data
                                            $('#productDetailsContainer').html(`
                                                <img src="${data.productImage}" alt="Product Image">
                                                <h6>Qty: ${data.Quant}</h6>
                                                <div class="check-product">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <h4>${data.productName}</h4>
                                                <h6>₱${data.productPrice}</h6>
                                                `);
                                        } else {
                                            // Handle the case where data is not as expected
                                            console.error('Invalid data format');
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('AJAX Error:', error); // Log AJAX error for debugging
                                    }
                                });
                            });
                        });
                    </script>

                    <script>
                        function deleteProduct() {
                            var productId = document.getElementById('productIdInput').value;

                            // Make an AJAX request to delete the product
                            $.ajax({
                                type: 'POST', // Use POST method to send data
                                url: 'delete_product.php',
                                data: {
                                    productId: productId
                                },
                                dataType: 'json', // Specify that you expect JSON data in the response
                                success: function(response) {
                                    // Handle the success response
                                    console.log('Product deleted successfully:', response);

                                    // Close the modal after successful delete
                                    $('#editProductDetails').modal('hide');

                                    // Refresh the page
                                    location.reload();
                                },
                                error: function(xhr, status, error) {
                                    // Handle the error response
                                    console.error('Error deleting product:', error);

                                    // You can show an error message or take appropriate action
                                }
                            });
                        }
                    </script>

                    </script>

                    <script>
                        var originalQuantity; // Variable to store the original quantity
                        var timeoutId; // Variable to store the timeout ID

                        function handleQuantityChange() {
                            try {
                                // Check if originalQuantity is not yet set
                                if (originalQuantity === undefined) {
                                    originalQuantity = parseInt(document.getElementById('quantityInput').value);
                                }

                                var userEnteredQuantity = document.getElementById('userEnteredQuantity').value.trim();

                                // Clear any existing timeout
                                clearTimeout(timeoutId);

                                // Check if the user-entered quantity is not empty
                                if (userEnteredQuantity !== '') {
                                    var parsedUserEnteredQuantity = parseInt(userEnteredQuantity);

                                    // Check if the parsed user-entered quantity is a valid number
                                    if (!isNaN(parsedUserEnteredQuantity)) {
                                        // Set a timeout to execute the quantity subtraction after 2 seconds
                                        timeoutId = setTimeout(function() {
                                            // Calculate the new quantity
                                            var newQuantity = Math.max(originalQuantity - parsedUserEnteredQuantity, 0);

                                            // Update the original "Product Quantity Left" field
                                            document.getElementById('quantityInput').value = newQuantity;

                                            // Optional: You can perform additional checks or validation here
                                        }, 500);
                                        return;
                                    } else {
                                        // Handle the case where the user-entered quantity is not a valid number
                                        console.error('Invalid quantity entered:', userEnteredQuantity);
                                        // (Optional: You can display a message or take appropriate action)
                                    }
                                }

                                // If the user-entered quantity is empty or not a valid number, revert back to the original quantity
                                document.getElementById('quantityInput').value = originalQuantity;

                                // Log the values for debugging
                                console.log('Original Quantity:', originalQuantity);
                                console.log('User Entered Quantity:', userEnteredQuantity);
                            } catch (error) {
                                console.error('Error:', error);
                            }
                        }

                        // Attach the input event listener to the "Quantity" input field
                        document.getElementById('userEnteredQuantity').addEventListener('input', handleQuantityChange);
                    </script>

                    <script>
                        function addToCart() {
                            // Get product details from the modal or wherever they are available
                            var productId = $('#productIdInput').val();
                            var productName = $('#productNameInput').val();
                            var productPrice = $('#priceInput').val();
                            var Quant = $('#userEnteredQuantity').val();

                            // Get dynamically generated productImagePath
                            var productImagePath = $('#productImageInput').val();

                            // Assuming you have the productBc somewhere; replace it with the actual source
                            var productBc = $('#productBcInput').val();
                            var productCategory = $('#productCategory').val()

                            // Make an AJAX request to add the product to temp_prod
                            $.ajax({
                                type: 'POST',
                                url: 'add_to_cart.php', // Replace with the actual URL
                                data: {
                                    productId: productId,
                                    productName: productName,
                                    productPrice: productPrice,
                                    Quant: Quant,
                                    productImage: productImagePath,
                                    productBc: productBc,
                                    Category: productCategory
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // Handle the response
                                    console.log('Product added to cart:', response);

                                    // You can show a success message or take other actions

                                    // Optionally, close the modal or do other things
                                    // $('#editProductDetails').modal('hide');

                                    // Reload the page
                                    location.reload();
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error adding to cart:', error);
                                    console.log(xhr.responseText); // Log the detailed error message
                                    // Handle the error
                                }

                            });
                        }
                    </script>

                    <div class="col-lg-4 col-sm-12">
                        <div class="card card-order"></div>
                        <div class="order-list">
                            <div class="orderid">
                                <h4>Order List</h4>

                                <!-- auto increment here  -->

                                <h5>Transaction id : #</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-end">
                                <a id="generateBarcodeButton" class="btn btn-scanner-set" data-bs-toggle="modal" data-bs-target="#customAddProductModal">
                                    <img src="assets/img/icons/scanner1.svg" alt="img" class="me-2" />Generate Barcode
                                </a>
                                <!-- <a id="enableBC" class="btn btn-scanner-set" data-bs-toggle="modal" data-bs-target="#customAddProductModal">
                                    <img src="assets/img/icons/scanner1.svg" alt="img" class="me-2" />Enable Barcode
                                </a> -->
                                <input type="text" class="form-control5" id="ScanBC" name="ScanBC" placeholder="Scan Barcode/Enter Barcode" autofocus>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Get the input element
                                        var scanBCInput = document.getElementById('ScanBC');

                                        // Event listener for card modal hide event
                                        $('#editProductDetails').on('hidden.bs.modal', function() {
                                            // Set focus to the input if no other modal is open
                                            if (!$('#customAddProductModal').hasClass('show')) {
                                                scanBCInput.focus();
                                            }
                                        });

                                        // Event listener for add product modal hide event
                                        $('#customAddProductModal').on('hidden.bs.modal', function() {
                                            // Set focus to the input if no other modal is open
                                            if (!$('#editProductDetails').hasClass('show')) {
                                                scanBCInput.focus();
                                            }
                                        });

                                        // Event listener for clicking outside of any modal
                                        $(document).on('click', function(e) {
                                            if (!$(e.target).closest('.modal').length) {
                                                // No modal is clicked, set focus to the input if no modal is open
                                                if (!$('#editProductDetails').hasClass('show') && !$('#customAddProductModal').hasClass('show')) {
                                                    scanBCInput.focus();
                                                }
                                            }
                                        });

                                        // Event listener for preventing dropdown from closing and page scroll
                                        $('.setvaluecash select').on('click', function(e) {
                                            e.stopPropagation();
                                        });

                                        // Event listener for selecting an item from the list within a modal
                                        $('.modal').on('click', '.list-item', function() {
                                            // Set focus to the input when an item is selected
                                            scanBCInput.focus();
                                        });
                                    });
                                </script>

                                <script>
                                    document.getElementById('ScanBC').addEventListener('input', function() {
                                        var input = this.value.trim();
                                        if (input.length === 12) {
                                            // Call a function to check the database and show the modal
                                            checkAndShowProductModal(input);
                                        }
                                    });

                                    // Function to check and show the product modal
                                    function checkAndShowProductModal(productBc) {
                                        // Make an AJAX request to check the product and get details
                                        $.ajax({
                                            type: 'POST',
                                            url: 'get_product_details_by_bc.php',
                                            data: {
                                                productBc: productBc
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                // Handle the response
                                                console.log('AJAX Response:', response);

                                                // Check if the product exists
                                                if (response.hasOwnProperty('productName')) {
                                                    // Product found, load details into the modal
                                                    loadProductDetails(response.productId);

                                                    // Show the modal
                                                    $('#editProductDetails').modal('show');

                                                    // Clear the barcode input field
                                                    document.getElementById('ScanBC').value = '';
                                                } else {
                                                    // Product not found, you can show an error message or take other actions
                                                    console.log('Product not found');
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Error:', error);
                                                // Handle the error
                                            }
                                        });
                                    }
                                </script>


                                <script>
                                    document.addEventListener('keydown', function(event) {
                                        // Check if Ctrl+b is pressed
                                        if (event.ctrlKey && event.key === 'b') {
                                            // Trigger a click on the button
                                            document.getElementById('generateBarcodeButton').click();
                                        }
                                    });
                                </script>

                                <!-- modal for generating barcode  -->
                                <!-- diri nako gi insert  -->
                                <div class="modal fade" id="customAddProductModal" tabindex="-1" aria-labelledby="customAddProductModalLabel" aria-hidden="true" <?= isset($product['productId']) ? 'data-product-id="' . $product['productId'] . '"' : '' ?>>
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="customAddProductModalLabel">Generate Product Code</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="_pos.php" method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <script type="text/javascript" src="assets/js/jsBarcode.all.min.js"></script>
                                                        <script type="text/javascript">
                                                            function printBarcode() {
                                                                // Get the barcode SVG element
                                                                var barcodeSVG = document.getElementById('barcode');

                                                                // Create a new window for printing
                                                                var printWindow = window.open('', '_blank');

                                                                // Set the print window's content to the barcode SVG element
                                                                printWindow.document.body.innerHTML = barcodeSVG.outerHTML;

                                                                // Focus the new window and trigger printing
                                                                printWindow.focus();
                                                                printWindow.print();
                                                            }

                                                            document.getElementById('btn_gen').addEventListener('click', function(event) {
                                                                event.preventDefault(); // Prevent form submission

                                                                // Generate the barcode
                                                                JsBarcode('#barcode', randomNumber);

                                                                // Trigger printing
                                                                printBarcode();
                                                            });
                                                        </script>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- barcode image generated  -->
                                                                <input type="text" class="form-control" id="productBc" name="productBc" value="<?= isset($product['productBc']) ? $product['productBc'] : ''; ?>">
                                                                <!-- <input type="text" name="productBc" id="productBc"> -->
                                                                <button class="genbar" id="btn_gen">Generate Barcode</button>
                                                                <div class="row">
                                                                    <div id="imagePreview" alt="img" data-bs-toggle="tooltip" title="Image Preview"></div>
                                                                    <svg id="barcode" class="barcode-container" data-bs-toggle="tooltip" title="Barcode Image"></svg>
                                                                </div>

                                                                <script>
                                                                    function previewImage() {
                                                                        var fileInput = document.getElementById('productImage');
                                                                        var imagePreview = document.getElementById('imagePreview');

                                                                        // Clear any previous preview
                                                                        imagePreview.innerHTML = '';

                                                                        // Check if a file is selected
                                                                        if (fileInput.files && fileInput.files[0]) {
                                                                            var reader = new FileReader();

                                                                            reader.onload = function(e) {
                                                                                // Create an image element
                                                                                var img = document.createElement('img');
                                                                                img.src = e.target.result;
                                                                                img.alt = 'Image Preview';

                                                                                // Append the image to the preview div
                                                                                imagePreview.appendChild(img);
                                                                            };

                                                                            // Read the selected file as Data URL
                                                                            reader.readAsDataURL(fileInput.files[0]);
                                                                        }
                                                                    }
                                                                </script>
                                                                <!-- print svg for the barcode  -->
                                                                <li>
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print barcode" onclick="printBarcode()">
                                                                        <img src="assets/img/icons/printer.svg" alt="img">
                                                                    </a>
                                                                </li>
                                                                <!-- print function for barcode image generated  -->
                                                                <script type="text/javascript">
                                                                    document.getElementById("btn_gen").addEventListener('click', function(event) {
                                                                        event.preventDefault(); // Prevent form submission

                                                                        // Generate 12 randomized numbers on the client side
                                                                        var randomNumber = Math.floor(100000000000 + Math.random() * 900000000000).toString();

                                                                        // Set the value for the productBc input field
                                                                        document.getElementById("productBc").value = randomNumber;

                                                                        // Generate the barcode
                                                                        JsBarcode("#barcode", randomNumber);
                                                                    });
                                                                </script>
                                                            </div>

                                                            <!-- Your form inputs -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <div class="dropdowncateg">
                                                                        <label for="productCategory" class="form-label">Product Category</label>
                                                                        <select id="productCategory" name="Category">
                                                                            <option value="1">Rice</option>
                                                                            <option value="2">Drink</option>
                                                                            <option value="3">Bread</option>
                                                                            <option value="4">Dessert</option>
                                                                            <option value="5">Viand</option>
                                                                            <option value="6">Chips</option>
                                                                            <option value="7">Biscuits</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="productImage" class="form-label">Product Image</label>
                                                                    <input type="file" class="form-control" id="productImage" name="productImage" onchange="previewImage()">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="productName" class="form-label">Product Name</label>
                                                                    <input type="text" class="form-control" id="productName" name="productName" value="<?= isset($product['productName']) ? $product['productName'] : ''; ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="productPrice" class="form-label">Product Price</label>
                                                                    <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?= isset($product['productPrice']) ? $product['productPrice'] : ''; ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="Quant" class="form-label">Product Quantity</label>
                                                                    <input type="number" class="form-control" id="Quant" name="Quant" value="<?= isset($product['productPrice']) ? $product['productPrice'] : ''; ?>">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="split-card">
                    </div>
                    <div class="card-body pt-0">
                        <div class="totalitem">


                            <!-- increment here for total products  -->

                            <h4>Total items: <?= $totalItemCount ?></h4>

                            <button type="button" class="clear-all-btn" onclick="clearAllTempProducts()">Clear all</button>
                            <script>
                                // Attach a click event handler to the "Clear all" button
                                $(document).on('click', '.clear-all-btn', function() {
                                    // Call a function to clear all temp products
                                    clearAllTempProducts();
                                });

                                // Function to clear all temp products
                                function clearAllTempProducts() {
                                    // Make an AJAX request to clear all temp products
                                    $.ajax({
                                        type: 'POST',
                                        url: 'clear_all_tempproducts.php', // Replace with the actual URL to handle the clearing logic on the server
                                        dataType: 'json',
                                        success: function(response) {
                                            // Handle the success response
                                            console.log('All products cleared successfully:', response);

                                            // Reload the page or update the UI as needed
                                            location.reload();
                                        },
                                        error: function(xhr, status, error) {
                                            // Handle the error response
                                            console.error('Error clearing all products:', error);

                                            // You can show an error message or take appropriate action
                                        }
                                    });
                                }
                            </script>

                        </div>

                        <div class="product-table">
                            <?php
                            // Fetch products from the database (replace this with your actual function)
                            $tempProducts = fetchTempProductsFromDatabase();

                            // Loop through the temp products and echo HTML content
                            foreach ($tempProducts as $tempProduct) { ?>
                                <ul class="product-lists">
                                    <li>
                                        <div class="productimg">
                                            <div class="productimgs">
                                                <img src="<?= isset($tempProduct['productImage']) ? $tempProduct['productImage'] : 'assets/img/product/product54.jpg'; ?>" alt="img">
                                            </div>
                                            <div class="productcontet">
                                                <h6>
                                                    <!-- <?php
                                                            // Retrieve product ID here
                                                            $productId = isset($tempProduct['productId']) ? $tempProduct['productId'] : 'ProductId Placeholder';
                                                            echo $productId;
                                                            ?>
                                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit">
                                                        <img src="assets/img/icons/scan.svg" alt="img">
                                                    </a> -->
                                                </h6>
                                                </h6>
                                                <h6><?= isset($tempProduct['productName']) ? $tempProduct['productName'] : 'Product Name Placeholder'; ?></h6>
                                                <h6>₱ <?= isset($tempProduct['productPrice']) ? $tempProduct['productPrice'] : 'Price Placeholder'; ?></h6>
                                                <h6>Qty: <?= isset($tempProduct['Quant']) ? $tempProduct['Quant'] : 'Quantity Placeholder'; ?>

                                                    <a class="me-3" href="javascript:void(0);" onclick="openEditModal(<?= $tempProduct['productId']; ?>)">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    // Check if both product price and quantity are set
                                    if (isset($tempProduct['productPrice'], $tempProduct['Quant'])) {
                                        // Calculate the total quantity price for the current product
                                        $totalQprice = $tempProduct['productPrice'] * $tempProduct['Quant'];
                                    ?>
                                        <li class="total-valeachprod">
                                            <h5>₱<?= number_format($totalQprice, 2) ?></h5>
                                        </li>
                                    <?php } ?>
                                    <button type="button" class="delete-product-btn delete-temp-product-btn" data-product-id="<?= $tempProduct['productId']; ?>" onclick="deleteTempProductButtonAction(<?= $tempProduct['productId']; ?>)">
                                        <img src="assets/img/icons/delete-2.svg" alt="img">
                                    </button>
                                </ul>
                                <?php  ?>
                                </li>
                                </ul>
                                <script>
                                    // Attach a click event handler to all elements with the class "delete-temp-product-btn"
                                    $(document).on('click', '.delete-temp-product-btn', function() {
                                        // Retrieve the product ID from the data-product-id attribute
                                        var productId = $(this).data('product-id');

                                        // Call a function specific to this button
                                        deleteTempProductButtonAction(productId);
                                    });

                                    // Function specific to the delete-temp-product-btn button
                                    function deleteTempProductButtonAction(productId) {
                                        // Add your specific logic here
                                        console.log('Button with product ID ' + productId + ' clicked.');

                                        // You can add more logic or call another function if needed

                                        // Call the common function to delete the product
                                        deleteTempProduct(productId);
                                    }

                                    // Function to delete the temporary product
                                    function deleteTempProduct(productId) {
                                        // Make an AJAX request to delete the product
                                        $.ajax({
                                            type: 'POST',
                                            url: 'delete_tempproduct.php', // Replace with the actual URL to handle the delete logic on the server
                                            data: {
                                                productId: productId
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                // Handle the success response
                                                console.log('Product deleted successfully:', response);

                                                // Reload the page
                                                location.reload(true);
                                            },
                                            error: function(xhr, status, error) {
                                                // Handle the error response
                                                console.error('Error deleting product:', error);

                                                // You can show an error message or take appropriate action
                                            }
                                        });
                                    }
                                </script>

                                <?php foreach ($tempProducts as $tempProduct) { ?>
                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit<?= $tempProduct['productId']; ?>">
                                    </a>

                                    <!-- Edit Modal for each product -->
                                    <div class="modal fade" id="edit<?= $tempProduct['productId']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Quantity</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="editQuantityInput">Quantity:</label>
                                                    <!-- Input field to edit the quantity -->
                                                    <input type="number" class="form-control" id="editQuantityInput<?= $tempProduct['productId']; ?>" value="<?= $tempProduct['Quant']; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <!-- Button to update the quantity -->
                                                    <button type="button" class="btn btn-primary" onclick="updateQuantity(<?= $tempProduct['productId']; ?>)">Update Quantity</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ... Your existing HTML code ... -->

                                    <script>
                                        function openEditModal(productId) {
                                            $('#edit' + productId).modal('show');
                                        }
                                        3
                                        // Function to update the quantity
                                        function updateQuantity(productId) {
                                            // Get the updated quantity from the input field
                                            var updatedQuantity = document.getElementById('editQuantityInput' + productId).value;

                                            // You can use AJAX to send the updated quantity to your server and update the database
                                            // Example AJAX request:
                                            $.ajax({
                                                type: 'POST',
                                                url: 'update_quantity.php', // Replace with the actual URL
                                                data: {
                                                    productId: productId,
                                                    updatedQuantity: updatedQuantity
                                                },
                                                dataType: 'json',
                                                success: function(response) {
                                                    // Handle the response
                                                    console.log('Quantity updated:', response);

                                                    // Close the modal after successful update
                                                    $('#edit' + productId).modal('hide');

                                                    // Reload the page
                                                    location.reload();
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error updating quantity:', error);
                                                    console.log(xhr.responseText); // Log the detailed error message
                                                    // Handle the error
                                                }
                                            });
                                        }
                                    </script>
                                <?php } ?>
                                </li>
                                </ul>
                            <?php } ?>
                        </div>
                        <!-- waaaaaaaaaa  -->
                        <div class="split-card">

                        </div>

                        <div class="card-body pt-0 pb-2">
                            <div class="setvalue">
                                <ul>
                                    <?php
                                    // Assuming you have a function to fetch temp products from the database
                                    $tempProducts = fetchTempProductsFromDatabase();

                                    // Extract the product prices and quantities
                                    $productPrices = array_column($tempProducts, 'productPrice');
                                    $productQuantities = array_column($tempProducts, 'Quant');

                                    // Create an array with repeated product prices based on quantities
                                    $repeatedPrices = array_reduce(array_map(null, $productPrices, $productQuantities), function ($carry, $item) {
                                        $carry = array_merge($carry, array_fill(0, $item[1], $item[0]));
                                        return $carry;
                                    }, []);

                                    // Calculate the total of all product prices
                                    $totalOfAllProductPrices = array_sum($repeatedPrices);
                                    ?>

                                    <!-- Subtotal section -->
                                    <li class="total-value">
                                        <h5>SubTotal: ₱</h5>
                                    </li>
                                    <li class="total-value">
                                        <input type="text" class="form-control5" name="subtotal" value="<?= implode(' + ', $repeatedPrices) ?>" readonly>
                                    </li>
                                    <li class="total-value">
                                        <h5>Total: ₱</h5>
                                        <input type="text" class="form-control1" name="total" value="<?= number_format($totalOfAllProductPrices, 2) ?>" readonly>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="setvaluecash">
                            <ul>
                                <select name="payment_method" class="form-control4" id="payment_method">
                                    <option value="Cash">
                                        <img src="assets/img/icons/cash.svg" alt="Cash" class="me-2"> Cash
                                    </option>
                                    <option value="Gcash">
                                        <img src="assets/img/icons/gcash.svg" alt="Gcash" class="me-2"> Gcash
                                    </option>
                                    <option value="other">
                                        <img src="assets/img/icons/other.svg" alt="Other" class="me-2"> Other
                                    </option>
                                </select>

                                <select name="payment_method_type" class="form-control3" id="payment_method_type">
                                    <option value="Non-Member">
                                        <img src="assets/img/icons/cash.svg" alt="Cash" class="me-2"> Non - Member
                                    </option>
                                    <option value="Member">
                                        <img src="assets/img/icons/gcash.svg" alt="Gcash" class="me-2"> Member
                                    </option>
                                </select>
                            </ul>
                        </div>

                        <button type="button" class="btn-totallabel" id="checkout" onclick="checkoutWithDelay();">Checkout</button>

                        <script>
                            function checkoutWithDelay() {
                                // Call the checkout function
                                checkout();

                                // Schedule the clearAllTempProducts function after a 2-second delay
                                setTimeout(function() {
                                    clearAllTempProducts();
                                }, 1000);
                            }

                            function checkout() {
                                // Get selected values from the payment method and role dropdowns
                                var paymentMethod = $('#payment_method').val();
                                var paymentMethodType = $('#payment_method_type').val();

                                // Make an AJAX request to process the checkout
                                $.ajax({
                                    type: 'POST',
                                    url: 'process_checkout.php', // Replace with the actual URL
                                    dataType: 'json',
                                    data: {
                                        payment_method: paymentMethod,
                                        payment_method_type: paymentMethodType
                                    },
                                    success: function(response) {
                                        // Handle the success response
                                        console.log('Checkout response:', response);

                                        if (response.success && response.clearAll) {
                                            // Ensure the clearAllTempProducts function is globally accessible
                                            clearAllTempProducts();
                                        }

                                        // Optionally, reload the page
                                        location.reload();
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle the error response
                                        console.error('Error during checkout:', error);
                                        console.log(xhr.responseText);
                                        // You can show an error message or take appropriate action
                                    }
                                });
                            }

                            document.addEventListener('keydown', function(event) {
                                // 3 if Ctrl+c is pressed
                                if (event.ctrlKey && event.key === 'c') {
                                    // Trigger a click on the button
                                    checkoutWithDelay();
                                }
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.11.0/JsBarcode.all.min.js"></script>

    </script>

</body>

</html>