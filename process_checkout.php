<?php
include_once 'config.php'; // Include your database connection logic

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Define a mapping between category IDs and category names
        $categoryMapping = [
            1 => 'Rice',
            2 => 'Drink',
            3 => 'Bread',
            4 => 'Desserts',
            5 => 'Viand',
            6 => 'Chips',
            7 => 'Biscuits',
        ];

        // Get unique category IDs from temp_prod
        $categoriesQuery = "SELECT DISTINCT Category FROM temp_prod";
        $stmtCategories = $pdo->prepare($categoriesQuery);
        $stmtCategories->execute();
        $categoryIds = $stmtCategories->fetchAll(PDO::FETCH_COLUMN);

        // Assign the current date to a variable
        $currentDate = date('Y-m-d');

        // Initialize an array to store the category totals
        $categoryTotals = [];

        // Iterate through category IDs and sum the totalQprice for each category
        foreach ($categoryIds as $categoryId) {
            // Check if the category ID exists in the mapping
            if (isset($categoryMapping[$categoryId])) {
                $categoryName = $categoryMapping[$categoryId];

                // Calculate totalQprice for the current category
                $totalQpriceQuery = "SELECT COALESCE(SUM(totalQprice), 0) FROM temp_prod WHERE Category = :categoryId";
                $stmtTotalQprice = $pdo->prepare($totalQpriceQuery);
                $stmtTotalQprice->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
                $stmtTotalQprice->execute();
                $totalQprice = $stmtTotalQprice->fetchColumn();

                // Store the totalQprice in the categoryTotals array
                $categoryTotals[$categoryName] = $totalQprice;
            }
        }

        // Get payment method and payment method type from the POST data
        $paymentMethod = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
        $paymentMethodType = isset($_POST['payment_method_type']) ? $_POST['payment_method_type'] : '';

        // Build the column names and values for the INSERT query
        $columns = implode(', ', array_keys($categoryTotals));
        $values = implode(', ', array_values($categoryTotals));

        // Add payment method and payment method type to the column names and values
        $columns .= ', Payment, Role';
        $values .= ", '$paymentMethod', '$paymentMethodType'";

        // Build the INSERT query
        $insertSreportQuery = "INSERT INTO sreport (date, $columns, Total) VALUES (:currentDate, $values, :totalSum)";

        // Prepare and execute the INSERT query
        $stmtInsertSreport = $pdo->prepare($insertSreportQuery);
        $stmtInsertSreport->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
        $stmtInsertSreport->bindParam(':totalSum', array_sum($categoryTotals), PDO::PARAM_INT);
        $stmtInsertSreport->execute();

        // Return success response
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Sreport updated successfully']);
    } catch (Exception $e) {
        // Handle any exceptions or errors
        error_log('Error updating sreport: ' . $e->getMessage());

        // Return detailed error response
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error updating sreport: ' . $e->getMessage()]);
    }
} else {
    // Return error response for invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
}
?>
