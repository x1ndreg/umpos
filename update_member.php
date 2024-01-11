<?php
// Include your database connection code here if not already included
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $memberId = $_POST['id'];

    // Retrieve updated form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $added_on = $_POST['added_on'];

    // Your SQL query to update member data
    $sql = "UPDATE members SET name = :name, phone = :phone, email = :email, added_on = :added_on WHERE id = :id";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':id', $memberId, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':added_on', $added_on, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Redirect to the user list page after data is updated
    header("Location: _userlist_member.php");
    exit();
} else {
    // Handle invalid requests or direct access to this script
    echo "Invalid request!";
}
?>
