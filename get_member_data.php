<?php
include 'config3.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $memberId = $_GET['id'];

    // Retrieve member data for editing
    $sql = "SELECT * FROM members WHERE id = :id";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':id', $memberId, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the member data
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($member);
} else {
    // Handle invalid requests or direct access to this script
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
