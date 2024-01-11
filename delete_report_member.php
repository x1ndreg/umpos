<?php
include 'config3.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['repid'])) {
    $repid = $_POST['repid'];

    // Your SQL query for deleting the report
    $sql = "DELETE FROM sreport WHERE repid = :repid";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':repid', $repid, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the sales report page after deletion
    header("Location: _salesreport_member.php");
    exit();
} else {
    // Handle invalid requests or direct access to this script
    echo "Invalid request!";
}
?>
