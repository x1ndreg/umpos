<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pos_users';

try {
    // Connect to the MySQL database using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $name = $_POST['name']; // Update this line
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $added_on = $_POST['added_on'];

        // Your SQL query for inserting data
        $sql = "INSERT INTO members (name, phone, email, added_on) VALUES (:name, :phone, :email, :added_on)";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':added_on', $added_on, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Redirect to the user list page after data is inserted
        header("Location: _userlist_member.php");
        exit();
    }
} catch (PDOException $e) {
    die("Database operation failed: " . $e->getMessage());
}
?>
