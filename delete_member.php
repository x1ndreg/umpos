<?php
include 'config3.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $memberId = $_GET['id'];

    // Your SQL query for deleting the member
    $sql = "DELETE FROM members WHERE id = :id";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':id', $memberId, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the user list page after deletion
    header("Location: _userlist_member.php");
    exit();
} else {
    // Handle invalid requests or direct access to this script
    echo "Invalid request!";
}
?>
