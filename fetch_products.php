<?php
// functions.php

function fetchSalesReportFromDatabase() {
    global $pdo;

    try {
        // Adjust the query based on your database schema
        $stmt = $pdo->prepare("SELECT * FROM sreport");
        $stmt->execute();

        // Fetch all rows as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        // Handle database query error
        die("Error fetching sales report: " . $e->getMessage());
    }
}
?>
