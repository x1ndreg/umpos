<!-- <?php
include "config.php"; // Include your database connection code here.

// try {
//     // Fetch all users from the 'users' table
//     $stmt = $pdo->query("SELECT * FROM users");
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Set the cost factor
//     $costFactor = 8;

//     // Loop through the users and update passwords
//     foreach ($users as $user) {
//         // Check if the password is not already hashed
//         if (!password_verify($user['password'], $user['password'])) {
//             // Update the user's record with the hashed password and cost factor
//             $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT, ['cost' => $costFactor]);

//             // Update the user's record with the hashed password
//             $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
//             $updateStmt->execute([$hashed_password, $user['id']]);
//         }
//     }

//     echo "Passwords hashed successfully.";
// } catch (PDOException $e) {
//     die("Error updating passwords: " . $e->getMessage());
// }


include "config.php"; // Include your database connection code here.

try {
    // Fetch all users from the 'users' table
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set the cost factor
    $costFactor = 8;

    // Loop through the users and update passwords
    foreach ($users as $user) {
        // Check if the password needs rehashing
        if (password_needs_rehash($user['password'], PASSWORD_BCRYPT, ['cost' => $costFactor])) {
            // Update the user's record with the hashed password and cost factor
            $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT, ['cost' => $costFactor]);

            // Update the user's record with the hashed password
            $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $updateStmt->execute([$hashed_password, $user['id']]);
        }
    }

    echo "Passwords checked and updated successfully.";
} catch (PDOException $e) {
    die("Error updating passwords: " . $e->getMessage());
}
?>

?> -->
